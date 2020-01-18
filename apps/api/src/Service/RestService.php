<?php

namespace App\Service;

use App\Model\FormProcessResponse;
use App\Exception\InvalidFormException;
use Symfony\Component\Form\Form;
use App\Traits\Service\EntityManagerServiceInclude;
use App\Traits\Service\FormFactoryServiceInclude;

/**
 * Class Handler
 * @package App\Core\Handler
 */
abstract class RestService
{
    use EntityManagerServiceInclude,
        FormFactoryServiceInclude;


    /** @var string */
    protected $entityClass;


    /**
     * Add new item to database
     *
     * @param array $parameters
     * @param string $formType
     * @param string|object $entityClass
     * @param array $options
     * @return FormProcessResponse
     */
    public function addItem(array $parameters, string $formType, $entityClass = null, array $options = []) : FormProcessResponse
    {
        $form = $this->prepareForm($parameters, $formType, $entityClass, $options);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();
            $result = new FormProcessResponse($form);

            $this->entityManager->persist($item);
            $this->entityManager->flush();

            $result->setItem($item);
            return $result;
        }

        throw new InvalidFormException('Invalid form exception', $form, $parameters);
    }

    /**
     * Create submitted form
     *
     * @param array $parameters
     * @param string $formType
     * @param $entityClass
     * @param array $options
     *
     * @return Form
     */
    public function prepareForm(array $parameters, string $formType, $entityClass, array $options = []) : Form
    {
        if (!empty($entityClass) && is_string($entityClass)) {
            $this->entityClass = $entityClass;
        }

        if (is_object($entityClass)) {
            $item = $entityClass;
        } else {
            $item = new $this->entityClass();
        }

        /** @var Form $form */
        $form = $this->formFactory->create($formType, $item, $options);

        $form->submit($parameters);

        return $form;
    }
}