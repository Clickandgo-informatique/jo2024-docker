<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251014112724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favoris_offres_utilisateur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE favoris_offres_utilisateur_users (favoris_offres_utilisateur_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_8D5BC861E26811C1 (favoris_offres_utilisateur_id), INDEX IDX_8D5BC86167B3B43D (users_id), PRIMARY KEY (favoris_offres_utilisateur_id, users_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE favoris_offres_utilisateur_offres (favoris_offres_utilisateur_id INT NOT NULL, offres_id INT NOT NULL, INDEX IDX_2556E63BE26811C1 (favoris_offres_utilisateur_id), INDEX IDX_2556E63B6C83CD9F (offres_id), PRIMARY KEY (favoris_offres_utilisateur_id, offres_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE favoris_offres_utilisateur_users ADD CONSTRAINT FK_8D5BC861E26811C1 FOREIGN KEY (favoris_offres_utilisateur_id) REFERENCES favoris_offres_utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris_offres_utilisateur_users ADD CONSTRAINT FK_8D5BC86167B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris_offres_utilisateur_offres ADD CONSTRAINT FK_2556E63BE26811C1 FOREIGN KEY (favoris_offres_utilisateur_id) REFERENCES favoris_offres_utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris_offres_utilisateur_offres ADD CONSTRAINT FK_2556E63B6C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favoris_offres_utilisateur_users DROP FOREIGN KEY FK_8D5BC861E26811C1');
        $this->addSql('ALTER TABLE favoris_offres_utilisateur_users DROP FOREIGN KEY FK_8D5BC86167B3B43D');
        $this->addSql('ALTER TABLE favoris_offres_utilisateur_offres DROP FOREIGN KEY FK_2556E63BE26811C1');
        $this->addSql('ALTER TABLE favoris_offres_utilisateur_offres DROP FOREIGN KEY FK_2556E63B6C83CD9F');
        $this->addSql('DROP TABLE favoris_offres_utilisateur');
        $this->addSql('DROP TABLE favoris_offres_utilisateur_users');
        $this->addSql('DROP TABLE favoris_offres_utilisateur_offres');
    }
}
