<?php

namespace App\Tests\Functional\Entity;

use App\Traits\TestDataCollection\OperationDataCollection;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class OperationTest
 * @package App\Tests\Functional\Entities
 */
class OperationTest extends KernelTestCase
{
    use OperationDataCollection;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->clearAll();
        $this->fillUp();
        $this->entityManager->clear();
    }
    
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function fillUp()
    {
        $this->createOperations();
    }

    /**
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function clearAll()
    {
        $this->clearDataOperation();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
    }

    /*********************************************
     * TESTS
     *********************************************/

    public function test_empty()
    {
        $this->assertTrue(true);
    }
}
