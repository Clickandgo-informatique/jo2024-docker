<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250919103627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sports CHANGE intitule intitule VARCHAR(150) NOT NULL');
        $this->addSql('ALTER TABLE users ADD google2_fasecret VARCHAR(255) DEFAULT NULL, ADD is2_faenabled TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sports CHANGE intitule intitule VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE users DROP google2_fasecret, DROP is2_faenabled');
    }
}
