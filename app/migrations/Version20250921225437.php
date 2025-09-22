<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250921225437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes ADD qr_token VARCHAR(255) NOT NULL, ADD date_scan DATETIME DEFAULT NULL, ADD scanned_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CEBBC642F FOREIGN KEY (scanned_by_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_35D4282C1AE26361 ON commandes (qr_token)');
        $this->addSql('CREATE INDEX IDX_35D4282CEBBC642F ON commandes (scanned_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CEBBC642F');
        $this->addSql('DROP INDEX UNIQ_35D4282C1AE26361 ON commandes');
        $this->addSql('DROP INDEX IDX_35D4282CEBBC642F ON commandes');
        $this->addSql('ALTER TABLE commandes DROP qr_token, DROP date_scan, DROP scanned_by_id');
    }
}
