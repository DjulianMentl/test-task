<?php

namespace App\Application\Service;

use App\Domain\Entity\Article\Article;
use App\Infrastructure\Persistence\Doctrine\Repository\Article\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use DomainException;

class ArticleService
{
    public function __construct(
        private ArticleRepository $articleRepository,
    ) {
    }

    public function findAllActive(): array
    {
        return $this->articleRepository->findBy(['isActive' => true]);
    }

    public function findBySlug(string $slug): Article
    {
        $article = $this->articleRepository->findOneBy(['slug' => $slug]);

        if (!$article) {
            throw new DomainException('Article not found.');
        }
        return $this->articleRepository->findOneBy(['slug' => $slug]);
    }
}
