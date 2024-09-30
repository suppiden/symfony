<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028190525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materia DROP FOREIGN KEY FK_6DF05284FD391480');
        $this->addSql('DROP INDEX UNIQ_6DF05284FD391480 ON materia');
        $this->addSql('ALTER TABLE materia DROP id_profesor_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materia ADD id_profesor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materia ADD CONSTRAINT FK_6DF05284FD391480 FOREIGN KEY (id_profesor_id) REFERENCES profesores (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6DF05284FD391480 ON materia (id_profesor_id)');
    }
}
