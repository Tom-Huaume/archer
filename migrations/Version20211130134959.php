<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130134959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE epreuve ADD evenement_id INT NOT NULL, ADD arme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE epreuve ADD CONSTRAINT FK_D6ADE47FFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE epreuve ADD CONSTRAINT FK_D6ADE47F21D9C0A FOREIGN KEY (arme_id) REFERENCES arme (id)');
        $this->addSql('CREATE INDEX IDX_D6ADE47FFD02F13 ON epreuve (evenement_id)');
        $this->addSql('CREATE INDEX IDX_D6ADE47F21D9C0A ON epreuve (arme_id)');
        $this->addSql('ALTER TABLE evenement ADD lieu_destination_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EE637792C FOREIGN KEY (lieu_destination_id) REFERENCES lieu (id)');
        $this->addSql('CREATE INDEX IDX_B26681EE637792C ON evenement (lieu_destination_id)');
        $this->addSql('ALTER TABLE inscription_evenement ADD membre_id INT NOT NULL, ADD evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE inscription_evenement ADD CONSTRAINT FK_AD33AA066A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE inscription_evenement ADD CONSTRAINT FK_AD33AA06FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_AD33AA066A99F74A ON inscription_evenement (membre_id)');
        $this->addSql('CREATE INDEX IDX_AD33AA06FD02F13 ON inscription_evenement (evenement_id)');
        $this->addSql('ALTER TABLE reservation_trajet ADD trajet_id INT NOT NULL, ADD membre_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_trajet ADD CONSTRAINT FK_63AAE017D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id)');
        $this->addSql('ALTER TABLE reservation_trajet ADD CONSTRAINT FK_63AAE0176A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('CREATE INDEX IDX_63AAE017D12A823 ON reservation_trajet (trajet_id)');
        $this->addSql('CREATE INDEX IDX_63AAE0176A99F74A ON reservation_trajet (membre_id)');
        $this->addSql('ALTER TABLE trajet ADD evenement_id INT DEFAULT NULL, ADD organisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CD936B2FA FOREIGN KEY (organisateur_id) REFERENCES membre (id)');
        $this->addSql('CREATE INDEX IDX_2B5BA98CFD02F13 ON trajet (evenement_id)');
        $this->addSql('CREATE INDEX IDX_2B5BA98CD936B2FA ON trajet (organisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE epreuve DROP FOREIGN KEY FK_D6ADE47FFD02F13');
        $this->addSql('ALTER TABLE epreuve DROP FOREIGN KEY FK_D6ADE47F21D9C0A');
        $this->addSql('DROP INDEX IDX_D6ADE47FFD02F13 ON epreuve');
        $this->addSql('DROP INDEX IDX_D6ADE47F21D9C0A ON epreuve');
        $this->addSql('ALTER TABLE epreuve DROP evenement_id, DROP arme_id');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EE637792C');
        $this->addSql('DROP INDEX IDX_B26681EE637792C ON evenement');
        $this->addSql('ALTER TABLE evenement DROP lieu_destination_id');
        $this->addSql('ALTER TABLE inscription_evenement DROP FOREIGN KEY FK_AD33AA066A99F74A');
        $this->addSql('ALTER TABLE inscription_evenement DROP FOREIGN KEY FK_AD33AA06FD02F13');
        $this->addSql('DROP INDEX IDX_AD33AA066A99F74A ON inscription_evenement');
        $this->addSql('DROP INDEX IDX_AD33AA06FD02F13 ON inscription_evenement');
        $this->addSql('ALTER TABLE inscription_evenement DROP membre_id, DROP evenement_id');
        $this->addSql('ALTER TABLE reservation_trajet DROP FOREIGN KEY FK_63AAE017D12A823');
        $this->addSql('ALTER TABLE reservation_trajet DROP FOREIGN KEY FK_63AAE0176A99F74A');
        $this->addSql('DROP INDEX IDX_63AAE017D12A823 ON reservation_trajet');
        $this->addSql('DROP INDEX IDX_63AAE0176A99F74A ON reservation_trajet');
        $this->addSql('ALTER TABLE reservation_trajet DROP trajet_id, DROP membre_id');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CFD02F13');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CD936B2FA');
        $this->addSql('DROP INDEX IDX_2B5BA98CFD02F13 ON trajet');
        $this->addSql('DROP INDEX IDX_2B5BA98CD936B2FA ON trajet');
        $this->addSql('ALTER TABLE trajet DROP evenement_id, DROP organisateur_id');
    }
}
