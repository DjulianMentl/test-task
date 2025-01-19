<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250119090506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create article table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE article (id INT UNSIGNED AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT 0 NOT NULL, views INT UNSIGNED DEFAULT 0 NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_23A0E66989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE article');
    }
}
