<?php

namespace App\Repository;

use App\Entity\ExcludedWord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ExcludedWord|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExcludedWord|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExcludedWord[]    findAll()
 * @method ExcludedWord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExcludedWordRepository extends ServiceEntityRepository
{
    /**
     * ExcludedWordRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExcludedWord::class);
    }
}
