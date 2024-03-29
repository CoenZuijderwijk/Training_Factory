<?php

namespace App\Repository;

use App\Entity\Persoon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Persoon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Persoon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Persoon[]    findAll()
 * @method Persoon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersoonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Persoon::class);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getLessons($id)
    {
        $query = $this->createQueryBuilder('r')
            ->andWhere("r.persoon = :id")
            ->setParameter('id', $id)
            ->join('r.lesson', 'l')
            ->select('l.id, l.lesnaam, l.date, l.location')
            ->getQuery();
        return $query->getResult();
    }
    // /**
    //  * @return Persoon[] Returns an array of Persoon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Persoon
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
