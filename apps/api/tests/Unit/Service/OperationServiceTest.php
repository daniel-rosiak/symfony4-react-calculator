<?php

namespace App\Tests\Unit\Services;

use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;
use App\Model\FormProcessResponse;
use App\Form\OperationForm;
use App\Entity\Operation;
use App\Service\OperationService;

/**
 * Class OperationServiceTest
 * @package App\Tests\Unit\Service
 */
class OperationServiceTest extends TestCase
{
    public function test___construct()
    {
        $operationService = new OperationService();

        $this->assertInstanceOf(OperationService::class, $operationService);
    }

    public function test_postOperation()
    {
        $operation_arguments = [1,2];
        $operation_type = 'add';


        /** @var EntityManager|MockObject $entityManager */
        $entityManager = $this->getMockBuilder(EntityManager::class)
            ->setMethods([
                'getRepository',
                'persist',
                'flush'
            ])
            ->disableOriginalConstructor()
            ->getMock();

        /** @var FormFactory|MockObject $formFactory */
        $formFactory = $this->getMockBuilder(FormFactory::class)
            ->setMethods([
                'create'
            ])
            ->disableOriginalConstructor()
            ->getMock();

        $form = $this->getMockBuilder(Form::class)
            ->setMethods([
                'isSubmitted',
                'isValid',
                'all',
                'submit',
                'getData'
            ])
            ->disableOriginalConstructor()
            ->getMock();

        $formFactory->expects($this->any())
            ->method('create')
            ->willReturn($form);

        $form->expects($this->any())
            ->method('isSubmitted')
            ->willReturn(true);

        $form->expects($this->any())
            ->method('isValid')
            ->willReturn(true);

        $form->expects($this->any())
            ->method('all')
            ->willReturn([]);

        $form->expects($this->any())
            ->method('submit')
            ->willReturn($form);

        $operationObject = new Operation();
        $operationObject->setArguments($operation_arguments);
        $operationObject->setType($operation_type);

        $form->expects($this->any())
            ->method('getData')
            ->willReturn($operationObject);

        $operationService = new OperationService();
        $operationService->setFormFactory($formFactory);
        $operationService->setEntityManager($entityManager);
        $operation = $operationService->addItem(['arguments' => $operation_arguments, 'type' => $operation_type], OperationForm::class, Operation::class);

        $this->assertInstanceOf(FormProcessResponse::class, $operation);
    }


}