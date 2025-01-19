<?php

namespace App\Presentation\Http\App\Controller\Article;

use App\Application\Service\ArticleService;
use App\Domain\Entity\Article\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/article', name: 'app_article_')]
class ArticleController extends AbstractController
{
    #[Route(path: '', name: 'main', methods: ['GET'])]
    public function index(ArticleService $articleService): Response
    {
        /** @var  Article[] $articles */
        $articles = $articleService->findAllActive();

        return $this->render('app/page/article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route(path: '/{slug}', name: 'show', methods: ['GET'])]
    public function show(string $slug, ArticleService $articleService): Response
    {
        $article = $articleService->findBySlug($slug);

        return $this->render('app/page/article/show.html.twig', [
            'article' => $article
        ]);
    }
}
