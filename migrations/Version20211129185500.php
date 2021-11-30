<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211129185500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription_evenement (id INT AUTO_INCREMENT NOT NULL, validation TINYINT(1) NOT NULL, date_heure_inscription DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_trajet (id INT AUTO_INCREMENT NOT NULL, validation TINYINT(1) NOT NULL, date_heure_demande DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trajet ADD lieu_depart_id INT NOT NULL');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CC16565FC FOREIGN KEY (lieu_depart_id) REFERENCES lieu (id)');
        $this->addSql('CREATE INDEX IDX_2B5BA98CC16565FC ON trajet (lieu_depart_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE inscription_evenement');
        $this->addSql('DROP TABLE reservation_trajet');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CC16565FC');
        $this->addSql('DROP INDEX IDX_2B5BA98CC16565FC ON trajet');
        $this->addSql('ALTER TABLE trajet DROP lieu_depart_id');
    }
}
