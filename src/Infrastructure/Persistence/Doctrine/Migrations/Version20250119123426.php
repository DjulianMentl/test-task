<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250119123426 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql("TRUNCATE TABLE article");
        $this->addSql("INSERT INTO article (title, slug, is_active, views, description, created_at) VALUES
            ('Команды консоли', 'console-commands', 1, 637, 'help - это одна из встроенных глобальных опций компонента Console, которые доступны для всех команд, включая те, которые вы можете создать. Чтобы узнать о них больше, вы можете прочитать этот раздел .', NOW()),
            ('Извлечение объектов из базы данных', 'extracting-objects-from-database', 1, 69842, 'Когда вы запрашиваете определенный тип объекта, вы всегда используете то, что известно как его репозиторий. Вы можете думать о репозитории как о PHP-классе, единственная задача которого - помочь вам извлечь сущности определенного класса.', NOW()),
            ('Создание маршрутов', 'create-route', 1, 1587324, 'Маршруты можно настраивать в YAML, XML, PHP или с помощью атрибутов. Все форматы предоставляют одинаковые возможности и производительность, поэтому выбирайте свой любимый. Symfony рекомендует атрибуты , поскольку удобно размещать маршрут и контроллер в одном месте.', NOW()),
            ('Создание и использование шаблонов', 'create-and-use-templates', 1, 789362564, 'Шаблон — это лучший способ организовать и отобразить HTML из вашего приложения, независимо от того, нужно ли вам отобразить HTML из контроллера или сгенерировать содержимое электронного письма . Шаблоны в Symfony создаются с помощью Twig: гибкого, быстрого и безопасного шаблонизатора. Шаблоны в Symfony создаются с помощью Twig: гибкого, быстрого и безопасного шаблонизатора.', NOW()),
            ('Язык шаблонов Twig', 'twig-templating-language', 0, 45893, 'Язык шаблонов Twig позволяет вам писать лаконичные, читабельные шаблоны, которые более дружелюбны к веб-дизайнерам и, в нескольких отношениях, более мощные, чем шаблоны PHP. Взгляните на следующий пример шаблона Twig. Даже если вы впервые видите Twig, вы, вероятно, понимаете большую его часть:', NOW())");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM article WHERE slug IN ('console-commands', 'extracting-objects-from-database', 'create-route', 'create-and-use-templates', 'twig-templating-language')");
    }
}
