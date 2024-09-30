<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028201533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumnos ADD materia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6ABB54DBBCB FOREIGN KEY (materia_id) REFERENCES materias (id)');
        $this->addSql('CREATE INDEX IDX_5EC5A6ABB54DBBCB ON alumnos (materia_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6ABB54DBBCB');
        $this->addSql('DROP INDEX IDX_5EC5A6ABB54DBBCB ON alumnos');
        $this->addSql('ALTER TABLE alumnos DROP materia_id');
    }
}
