<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028200448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6ABB54DBBCB');
        $this->addSql('DROP TABLE materia');
        $this->addSql('DROP INDEX IDX_5EC5A6ABB54DBBCB ON alumnos');
        $this->addSql('ALTER TABLE alumnos DROP materia_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materia (id INT AUTO_INCREMENT NOT NULL, profesores_id INT DEFAULT NULL, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_6DF05284DC431A97 (profesores_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE materia ADD CONSTRAINT FK_6DF05284DC431A97 FOREIGN KEY (profesores_id) REFERENCES profesores (id)');
        $this->addSql('ALTER TABLE alumnos ADD materia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6ABB54DBBCB FOREIGN KEY (materia_id) REFERENCES materia (id)');
        $this->addSql('CREATE INDEX IDX_5EC5A6ABB54DBBCB ON alumnos (materia_id)');
    }
}
