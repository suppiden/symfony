<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031124356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materias DROP FOREIGN KEY FK_F1B67860E52BD977');
        $this->addSql('DROP INDEX UNIQ_F1B67860E52BD977 ON materias');
        $this->addSql('ALTER TABLE materias ADD profesores INT NOT NULL, DROP profesor_id');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B6786029C62D8C FOREIGN KEY (profesores) REFERENCES profesores (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F1B6786029C62D8C ON materias (profesores)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materias DROP FOREIGN KEY FK_F1B6786029C62D8C');
        $this->addSql('DROP INDEX UNIQ_F1B6786029C62D8C ON materias');
        $this->addSql('ALTER TABLE materias ADD profesor_id INT DEFAULT NULL, DROP profesores');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B67860E52BD977 FOREIGN KEY (profesor_id) REFERENCES profesores (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F1B67860E52BD977 ON materias (profesor_id)');
    }
}
