<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251003110048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY `FK_54469DF4A76ED395`');
        $this->addSql('ALTER TABLE tickets ADD used_at DATETIME DEFAULT NULL, ADD validated_by_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4C69DE5E5 FOREIGN KEY (validated_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_54469DF4C69DE5E5 ON tickets (validated_by_id)');
        $this->addSql('ALTER TABLE users ADD used_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4A76ED395');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4C69DE5E5');
        $this->addSql('DROP INDEX IDX_54469DF4C69DE5E5 ON tickets');
        $this->addSql('ALTER TABLE tickets DROP used_at, DROP validated_by_id, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT `FK_54469DF4A76ED395` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users DROP used_at');
    }
}
