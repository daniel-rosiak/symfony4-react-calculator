<?php

namespace App\Service;

use App\Entity\Operation;
use App\Model\FormProcessResponse;
use App\Exception\InvalidFormException;
use App\Model\Operation as OperationModel;

class OperationService extends RestService
{
    protected $entityClass = Operation::class;

    /**
     * {@inheritdoc}
     */
    public function addItem(array $parameters, string $formType, $entityClass = null, array $options = []) : FormProcessResponse
    {
        $form = $this->prepareForm($parameters, $formType, $entityClass, $options);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();
 
            $item->setResult((new OperationModel())->calculate($item->getArguments(), $item->getType()));

            $result = new FormProcessResponse($form);

            $this->entityManager->persist($item);
            $this->entityManager->flush();

            $result->setItem($item);
            return $result;
        }

        throw new InvalidFormException('Invalid form exception', $form, $parameters);
    }


    /**
     * @param array $parameters
     */
    public function getReport(array $parameters = [])
    {
        if(!isset($parameters['from'])) {
            $parameters['from'] = '';
        }
        if(!isset($parameters['to'])) {
            $parameters['to'] = (new \DateTime('tomorrow'))->format('Y-m-d');
        }

        return $this->entityManager->getRepository(Operation::class)->getReport($parameters['from'], $parameters['to']);
    }
}