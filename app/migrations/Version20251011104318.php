<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251011104318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY `FK_C6AC3544BCF5E72D`');
        $this->addSql('ALTER TABLE offres CHANGE categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC3544BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories_offres (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC3544BCF5E72D');
        $this->addSql('ALTER TABLE offres CHANGE categorie_id categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT `FK_C6AC3544BCF5E72D` FOREIGN KEY (categorie_id) REFERENCES categories_offres (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
