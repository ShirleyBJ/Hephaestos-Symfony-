<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713082808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27D9E2FAFE');
        $this->addSql('DROP INDEX IDX_29A5EC27D9E2FAFE ON produit');
        $this->addSql('ALTER TABLE produit DROP produit_commander_id');
        $this->addSql('ALTER TABLE produit_commander ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit_commander ADD CONSTRAINT FK_C6444656F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_C6444656F347EFB ON produit_commander (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD produit_commander_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27D9E2FAFE FOREIGN KEY (produit_commander_id) REFERENCES produit_commander (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27D9E2FAFE ON produit (produit_commander_id)');
        $this->addSql('ALTER TABLE produit_commander DROP FOREIGN KEY FK_C6444656F347EFB');
        $this->addSql('DROP INDEX IDX_C6444656F347EFB ON produit_commander');
        $this->addSql('ALTER TABLE produit_commander DROP produit_id');
    }
}
