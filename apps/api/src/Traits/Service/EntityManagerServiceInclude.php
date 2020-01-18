<?php

namespace App\Traits\Service;

use Doctrine\ORM\EntityManagerInterface;

trait EntityManagerServiceInclude
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @required
     * @param EntityManagerInterface $entityManager
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}