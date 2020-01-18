<?php

namespace App\Traits\TestDataCollection;

use App\Entity\Operation;

/**
 * Trait OperationDataCollection
 * @package App\Traits\TestDataCollection
 */
trait OperationDataCollection
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * "arguments", "type", "result"
     * @var array
     */
    protected $data_collection_operation = [
        [[0,1], "add",1]

    ];

    /**
     * @return array
     */
    public function operationDataProvider()
    {
        return $this->data_collection_operation;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function createOperations()
    {
        foreach($this->data_collection_operation as $operation)
        {
            $this->createOperation($operation[0], $operation[1], $operation[2]);
        }
    }

    /**
     * @param $arguments
     * @param $type
     * @param $result
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function createOperation($arguments, $type, $result)
    {
        $operation = new Operation();
        $operation->setArguments($arguments);
        $operation->setType($type);
        $operation->setResult($result);

        $this->entityManager->persist($operation);
        $this->entityManager->flush();
    }

    /**
     * @return mixed
     */
    protected function getRandomOperation()
    {
        $operation = $this->entityManager->getRepository(Operation::class)->randomOne();
        return $operation;
    }

    /**
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function clearDataOperation()
    {
        $operations = $this->entityManager->getRepository(Operation::class)->findAll();
        foreach ($operations as $operation) {
            $this->entityManager->remove($operation);
        }
        $this->entityManager->flush();
        $this->entityManager->clear();
        $operations = null;
    }
}