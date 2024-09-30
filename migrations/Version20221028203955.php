<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028203955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6ABB54DBBCB');
        $this->addSql('DROP TABLE materias');
        $this->addSql('DROP INDEX IDX_5EC5A6ABB54DBBCB ON alumnos');
        $this->addSql('ALTER TABLE alumnos DROP materia_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materias (id INT AUTO_INCREMENT NOT NULL, profesor_id INT DEFAULT NULL, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_F1B67860E52BD977 (profesor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B67860E52BD977 FOREIGN KEY (profesor_id) REFERENCES profesores (id)');
        $this->addSql('ALTER TABLE alumnos ADD materia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6ABB54DBBCB FOREIGN KEY (materia_id) REFERENCES materias (id)');
        $this->addSql('CREATE INDEX IDX_5EC5A6ABB54DBBCB ON alumnos (materia_id)');
    }
}
