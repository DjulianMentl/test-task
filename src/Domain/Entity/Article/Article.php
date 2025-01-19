<?php

namespace App\Domain\Entity\Article;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: 'App\Infrastructure\Persistence\Doctrine\Repository\Article\ArticleRepository')]
#[ORM\Table(name: 'article')]
class Article
{
    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true])]
    #[ORM\GeneratedValue]
    private ?int $id;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: false)]
    private string $title;

    #[ORM\Column(type: Types::STRING, length: 255, unique: true, nullable: false)]
    private string $slug;

    #[ORM\Column(type: Types::BOOLEAN, nullable: false, options: ['default' => 0])]
    private bool $isActive;

    #[ORM\Column(type: Types::INTEGER, nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $views;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false)]
    private DateTimeImmutable $createdAt;

    public function __construct(
        string $title,
        string $slug,
        ?string $description,
        bool $isActive = false,
        int $views = 0,
    ) {
        $this->id = null;
        $this->createdAt = new DateTimeImmutable();

        $this->edit(
            title: $title,
            slug: $slug,
            description: $description,
            isActive: $isActive,
            views: $views,
        );
    }

    public function edit(string $title, string $slug, ?string $description, bool $isActive, int $views): self
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->description = $description;
        $this->isActive = $isActive;
        $this->views = $views;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function getViews(): int
    {
        return $this->views;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

}
