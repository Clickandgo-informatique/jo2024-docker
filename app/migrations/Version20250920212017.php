<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250920212017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD google2_fasecret VARCHAR(255) DEFAULT NULL, ADD is2_faenabled TINYINT(1) NOT NULL, ADD trusted_token VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_NICKNAME ON users (nickname)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_NICKNAME ON users');
        $this->addSql('ALTER TABLE users DROP google2_fasecret, DROP is2_faenabled, DROP trusted_token');
    }
}
