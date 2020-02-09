<?php

namespace App\Repository;

use App\Entity\ExpenseLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ExpenseLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpenseLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpenseLine[]    findAll()
 * @method ExpenseLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpenseLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseLine::class);
    }

    // /**
    //  * @return ExpenseLine[] Returns an array of ExpenseLine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExpenseLine
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
