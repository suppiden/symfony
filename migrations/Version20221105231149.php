<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221105231149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profesores ADD materia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profesores ADD CONSTRAINT FK_29C62D8CB54DBBCB FOREIGN KEY (materia_id) REFERENCES materias (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29C62D8CB54DBBCB ON profesores (materia_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profesores DROP FOREIGN KEY FK_29C62D8CB54DBBCB');
        $this->addSql('DROP INDEX UNIQ_29C62D8CB54DBBCB ON profesores');
        $this->addSql('ALTER TABLE profesores DROP materia_id');
    }
}
