<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251012110112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE details_commandes DROP FOREIGN KEY `FK_4FD424F76C83CD9F`');
        $this->addSql('ALTER TABLE details_commandes DROP FOREIGN KEY `FK_4FD424F782EA2E54`');
        $this->addSql('ALTER TABLE details_commandes CHANGE prix prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE details_commandes ADD CONSTRAINT FK_4FD424F76C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE details_commandes ADD CONSTRAINT FK_4FD424F782EA2E54 FOREIGN KEY (commande_id) REFERENCES commandes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sports CHANGE emoji emoji VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE details_commandes DROP FOREIGN KEY FK_4FD424F782EA2E54');
        $this->addSql('ALTER TABLE details_commandes DROP FOREIGN KEY FK_4FD424F76C83CD9F');
        $this->addSql('ALTER TABLE details_commandes CHANGE prix prix INT NOT NULL');
        $this->addSql('ALTER TABLE details_commandes ADD CONSTRAINT `FK_4FD424F782EA2E54` FOREIGN KEY (commande_id) REFERENCES commandes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE details_commandes ADD CONSTRAINT `FK_4FD424F76C83CD9F` FOREIGN KEY (offres_id) REFERENCES offres (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sports CHANGE emoji emoji VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
