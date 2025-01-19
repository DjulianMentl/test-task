<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository\Article;

use App\Domain\Entity\Article\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $em;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct($registry, Article::class);
    }

    public function save(Article $article): void
    {
        $this->em->persist($article);
        $this->em->flush();
    }

    public function delete(Article $article): void
    {
        $this->em->remove($article);
        $this->em->flush();
    }
}
