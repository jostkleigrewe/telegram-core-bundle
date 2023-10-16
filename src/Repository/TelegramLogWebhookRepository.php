<?php

namespace Jostkleigrewe\TelegramCoreBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TelegramLogWebhook>
 *
 * @method TelegramLogWebhook|null find($id, $lockMode = null, $lockVersion = null)
 * @method TelegramLogWebhook|null findOneBy(array $criteria, array $orderBy = null)
 * @method TelegramLogWebhook[]    findAll()
 * @method TelegramLogWebhook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TelegramLogWebhookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TelegramLogWebhook::class);
    }

//    /**
//     * @return TelegramLogWebhook[] Returns an array of TelegramLogWebhook objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TelegramLogWebhook
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
