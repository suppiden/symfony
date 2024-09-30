<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028201724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materias DROP FOREIGN KEY FK_F1B67860DC431A97');
        $this->addSql('DROP INDEX UNIQ_F1B67860DC431A97 ON materias');
        $this->addSql('ALTER TABLE materias CHANGE profesores_id profesor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B67860E52BD977 FOREIGN KEY (profesor_id) REFERENCES profesores (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F1B67860E52BD977 ON materias (profesor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materias DROP FOREIGN KEY FK_F1B67860E52BD977');
        $this->addSql('DROP INDEX UNIQ_F1B67860E52BD977 ON materias');
        $this->addSql('ALTER TABLE materias CHANGE profesor_id profesores_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B67860DC431A97 FOREIGN KEY (profesores_id) REFERENCES profesores (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F1B67860DC431A97 ON materias (profesores_id)');
    }
}
