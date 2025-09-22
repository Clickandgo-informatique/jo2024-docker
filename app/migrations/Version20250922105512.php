<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250922105512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories_offres (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, icone VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(20) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, payee_le DATETIME DEFAULT NULL, qr_token VARCHAR(255) NOT NULL, date_scan DATETIME DEFAULT NULL, user_id INT NOT NULL, scanned_by_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_35D4282CAEA34913 (reference), UNIQUE INDEX UNIQ_35D4282C1AE26361 (qr_token), INDEX IDX_35D4282CA76ED395 (user_id), INDEX IDX_35D4282CEBBC642F (scanned_by_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE details_commandes (quantite INT NOT NULL, prix INT NOT NULL, commande_id INT NOT NULL, offres_id INT NOT NULL, INDEX IDX_4FD424F782EA2E54 (commande_id), INDEX IDX_4FD424F76C83CD9F (offres_id), PRIMARY KEY (commande_id, offres_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, offres_id INT NOT NULL, INDEX IDX_E01FBE6A6C83CD9F (offres_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE offres (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, prix INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description LONGTEXT DEFAULT NULL, code VARCHAR(8) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, nbr_adultes INT NOT NULL, nbr_enfants INT NOT NULL, is_locked TINYINT(1) NOT NULL, is_published TINYINT(1) NOT NULL, slug VARCHAR(255) DEFAULT NULL, categorie_id INT NOT NULL, INDEX IDX_C6AC3544BCF5E72D (categorie_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE offres_sports (offres_id INT NOT NULL, sports_id INT NOT NULL, INDEX IDX_88F81AA66C83CD9F (offres_id), INDEX IDX_88F81AA654BBBFB7 (sports_id), PRIMARY KEY (offres_id, sports_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE sports (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(150) NOT NULL, icone VARCHAR(100) DEFAULT NULL, background_color VARCHAR(10) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, emoji VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, pictogramme VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, ticket_key VARCHAR(64) NOT NULL, payload_hash VARCHAR(64) DEFAULT NULL, qr_code_path LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, is_used TINYINT(1) NOT NULL, user_id INT NOT NULL, commande_id INT NOT NULL, UNIQUE INDEX UNIQ_54469DF489E97085 (ticket_key), UNIQUE INDEX UNIQ_54469DF4831E8F35 (payload_hash), INDEX IDX_54469DF4A76ED395 (user_id), UNIQUE INDEX UNIQ_54469DF482EA2E54 (commande_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nickname VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, account_key VARBINARY(32) DEFAULT NULL, google2_fasecret VARCHAR(255) DEFAULT NULL, is2_faenabled TINYINT(1) NOT NULL, trusted_token VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), UNIQUE INDEX UNIQ_IDENTIFIER_NICKNAME (nickname), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CEBBC642F FOREIGN KEY (scanned_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE details_commandes ADD CONSTRAINT FK_4FD424F782EA2E54 FOREIGN KEY (commande_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE details_commandes ADD CONSTRAINT FK_4FD424F76C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A6C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC3544BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories_offres (id)');
        $this->addSql('ALTER TABLE offres_sports ADD CONSTRAINT FK_88F81AA66C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offres_sports ADD CONSTRAINT FK_88F81AA654BBBFB7 FOREIGN KEY (sports_id) REFERENCES sports (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF482EA2E54 FOREIGN KEY (commande_id) REFERENCES commandes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CA76ED395');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CEBBC642F');
        $this->addSql('ALTER TABLE details_commandes DROP FOREIGN KEY FK_4FD424F782EA2E54');
        $this->addSql('ALTER TABLE details_commandes DROP FOREIGN KEY FK_4FD424F76C83CD9F');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A6C83CD9F');
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC3544BCF5E72D');
        $this->addSql('ALTER TABLE offres_sports DROP FOREIGN KEY FK_88F81AA66C83CD9F');
        $this->addSql('ALTER TABLE offres_sports DROP FOREIGN KEY FK_88F81AA654BBBFB7');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4A76ED395');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF482EA2E54');
        $this->addSql('DROP TABLE categories_offres');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE details_commandes');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE offres');
        $this->addSql('DROP TABLE offres_sports');
        $this->addSql('DROP TABLE sports');
        $this->addSql('DROP TABLE tickets');
        $this->addSql('DROP TABLE users');
    }
}
