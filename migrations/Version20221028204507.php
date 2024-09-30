<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028204507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alumnos_materias (alumnos_id INT NOT NULL, materias_id INT NOT NULL, INDEX IDX_7D041691A03F5ABF (alumnos_id), INDEX IDX_7D041691EB72EBA6 (materias_id), PRIMARY KEY(alumnos_id, materias_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materias (id INT AUTO_INCREMENT NOT NULL, profesor_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F1B67860E52BD977 (profesor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alumnos_materias ADD CONSTRAINT FK_7D041691A03F5ABF FOREIGN KEY (alumnos_id) REFERENCES alumnos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE alumnos_materias ADD CONSTRAINT FK_7D041691EB72EBA6 FOREIGN KEY (materias_id) REFERENCES materias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B67860E52BD977 FOREIGN KEY (profesor_id) REFERENCES profesores (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumnos_materias DROP FOREIGN KEY FK_7D041691EB72EBA6');
        $this->addSql('DROP TABLE alumnos_materias');
        $this->addSql('DROP TABLE materias');
    }
}
