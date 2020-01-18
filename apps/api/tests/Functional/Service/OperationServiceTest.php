<?php

namespace App\Tests\Functional\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\OperationService;
use App\Entity\Operation;
use App\Form\OperationForm;
use App\Traits\TestDataCollection\OperationDataCollection;

/**
 * Class OperationServiceTest
 * @package App\Tests\Functional\Service
 */
class OperationServiceTest extends KernelTestCase
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
        self::bootKernel();

        // returns the real and unchanged service container
        self::$kernel->getContainer();

        // gets the special container that allows fetching private services
        $container = self::$container;

        $this->entityManager = $container->get('doctrine')
            ->getManager();

        $this->clearAll();
        $this->fillUp();
        $this->entityManager->clear();
    }

    protected function fillUp()
    {
        self::$container->get(OperationService::class)->addItem(['arguments' => [1,2], 'type' => 'add'], OperationForm::class, Operation::class);;
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

    public function test_toFindNonExistingOperation()
    {
        $operation = $this->entityManager->getRepository(Operation::class)->findOneBy(['id' => 123456]);
        $this->assertNull($operation);
    }

    public function test_toFindAlreadyExistingOperation()
    {
        $operation = $this->entityManager->getRepository(Operation::class)->findBy(['type' => 'add']);
        $this->assertNotNull($operation);
    }
}
