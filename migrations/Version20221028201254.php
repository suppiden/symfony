<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028201254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materias (id INT AUTO_INCREMENT NOT NULL, profesores_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F1B67860DC431A97 (profesores_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B67860DC431A97 FOREIGN KEY (profesores_id) REFERENCES profesores (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE materias');
    }
}
