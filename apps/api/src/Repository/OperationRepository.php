<?php

namespace App\Repository;

use App\Entity\Operation;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Operation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Operation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Operation[]    findAll()
 * @method Operation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationRepository extends ServiceEntityRepository
{

    /**
     * OperationRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Operation::class);
    }

    /**
     * @param string $from
     * @param string $to
     */
    public function getReport(string $from = '', string $to = '') : array
    {
        $qb = $this->createQueryBuilder('p');
            if(!empty($from)) {
                $qb->andWhere('p.createdAt >= :from')->setParameter('from', $from);
            }
            if(!empty($to)) {
               $qb->andWhere('p.createdAt <= :to')->setParameter('to', $to);
            }

        return $qb->getQuery()->execute();
    }
}
