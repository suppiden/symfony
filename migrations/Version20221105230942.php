<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221105230942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materias DROP FOREIGN KEY FK_F1B6786048DEE07B');
        $this->addSql('DROP INDEX UNIQ_F1B6786048DEE07B ON materias');
        $this->addSql('ALTER TABLE materias DROP nombre_materia_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materias ADD nombre_materia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B6786048DEE07B FOREIGN KEY (nombre_materia_id) REFERENCES profesores (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F1B6786048DEE07B ON materias (nombre_materia_id)');
    }
}
