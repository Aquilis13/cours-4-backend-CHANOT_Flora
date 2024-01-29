<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240129144050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, rue VARCHAR(255) NOT NULL, numero_rue VARCHAR(255) NOT NULL, complement VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE batiment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, address_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, CONSTRAINT FK_F5FAB00CF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_F5FAB00CF5B7AF75 ON batiment (address_id)');
        $this->addSql('CREATE TABLE batiment_personne (batiment_id INTEGER NOT NULL, personne_id INTEGER NOT NULL, PRIMARY KEY(batiment_id, personne_id), CONSTRAINT FK_949D4401D6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_949D4401A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_949D4401D6F6891B ON batiment_personne (batiment_id)');
        $this->addSql('CREATE INDEX IDX_949D4401A21BD112 ON batiment_personne (personne_id)');
        $this->addSql('CREATE TABLE personne (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, address_id INTEGER NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, CONSTRAINT FK_FCEC9EFF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_FCEC9EFF5B7AF75 ON personne (address_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('DROP TABLE batiment_personne');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
