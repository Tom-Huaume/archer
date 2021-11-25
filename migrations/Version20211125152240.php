<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125152240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arme (id INT AUTO_INCREMENT NOT NULL, sigle VARCHAR(10) DEFAULT NULL, designation VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, date_heure_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, date_heure_debut DATETIME DEFAULT NULL, duree INT DEFAULT NULL, date_heure_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, date_heure_debut DATETIME NOT NULL, duree INT DEFAULT NULL, date_heure_limite_inscription DATETIME DEFAULT NULL, nb_inscription_max INT DEFAULT NULL, etat VARCHAR(50) NOT NULL, prix INT DEFAULT NULL, concours TINYINT(1) NOT NULL, date_heure_creation DATETIME NOT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, rue VARCHAR(50) NOT NULL, rue2 VARCHAR(50) DEFAULT NULL, code_postal VARCHAR(5) NOT NULL, ville VARCHAR(50) NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, num_licence VARCHAR(10) NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, date_naissance DATE DEFAULT NULL, tel_mobile VARCHAR(15) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, lateralite VARCHAR(10) DEFAULT NULL, actif TINYINT(1) NOT NULL, photo VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trajet (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, date_heure_depart DATETIME NOT NULL, nb_places INT NOT NULL, type_voiture VARCHAR(30) DEFAULT NULL, couleur_voiture VARCHAR(50) DEFAULT NULL, date_heure_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE arme');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE photo_article');
        $this->addSql('DROP TABLE trajet');
    }
}
