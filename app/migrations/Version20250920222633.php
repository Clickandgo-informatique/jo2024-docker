<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250920222633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY `FK_54469DF4A76ED395`');
        $this->addSql('ALTER TABLE tickets ADD payload_hash VARCHAR(64) DEFAULT NULL, ADD qr_code_path LONGTEXT DEFAULT NULL, CHANGE ticket_key ticket_key VARCHAR(64) NOT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_54469DF4831E8F35 ON tickets (payload_hash)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4A76ED395');
        $this->addSql('DROP INDEX UNIQ_54469DF4831E8F35 ON tickets');
        $this->addSql('ALTER TABLE tickets DROP payload_hash, DROP qr_code_path, CHANGE ticket_key ticket_key VARBINARY(32) NOT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT `FK_54469DF4A76ED395` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
