<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031124850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materias DROP FOREIGN KEY FK_F1B6786029C62D8C');
        $this->addSql('DROP INDEX UNIQ_F1B6786029C62D8C ON materias');
        $this->addSql('ALTER TABLE materias DROP profesores');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materias ADD profesores INT NOT NULL');
        $this->addSql('ALTER TABLE materias ADD CONSTRAINT FK_F1B6786029C62D8C FOREIGN KEY (profesores) REFERENCES profesores (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F1B6786029C62D8C ON materias (profesores)');
    }
}
