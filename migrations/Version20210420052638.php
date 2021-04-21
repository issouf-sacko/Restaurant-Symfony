<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210420052638 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE id_Pers id_Pers INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE commande CHANGE idClient idClient INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_produit_categorie');
        $this->addSql('ALTER TABLE produit ADD photo VARCHAR(255) DEFAULT NULL, CHANGE idCat idCat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BF165E2F FOREIGN KEY (idCat) REFERENCES categorie (idCat)');
        $this->addSql('ALTER TABLE produitCommande DROP FOREIGN KEY FK_produitCommande_commande');
        $this->addSql('ALTER TABLE produitCommande DROP quantite');
        $this->addSql('ALTER TABLE produitCommande ADD CONSTRAINT FK_DC59CC79E140147 FOREIGN KEY (idCmd) REFERENCES commande (idCmd)');
        $this->addSql('ALTER TABLE produitCommande RENAME INDEX i_fk_produitcommande_produit TO IDX_DC59CC79C6494F09');
        $this->addSql('ALTER TABLE produitCommande RENAME INDEX i_fk_produitcommande_commande TO IDX_DC59CC79E140147');
        $this->addSql('ALTER TABLE reservation CHANGE idReserv idReserv INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE id_Pers id_Pers INT NOT NULL');
        $this->addSql('ALTER TABLE commande CHANGE idClient idClient INT NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BF165E2F');
        $this->addSql('ALTER TABLE produit DROP photo, CHANGE idCat idCat INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_produit_categorie FOREIGN KEY (idCat) REFERENCES categorie (idCat) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produitcommande DROP FOREIGN KEY FK_DC59CC79E140147');
        $this->addSql('ALTER TABLE produitcommande ADD quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produitcommande ADD CONSTRAINT FK_produitCommande_commande FOREIGN KEY (idCmd) REFERENCES commande (idCmd) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produitcommande RENAME INDEX idx_dc59cc79c6494f09 TO I_FK_PRODUITCOMMANDE_PRODUIT');
        $this->addSql('ALTER TABLE produitcommande RENAME INDEX idx_dc59cc79e140147 TO I_FK_produitCommande_commande');
        $this->addSql('ALTER TABLE reservation CHANGE idReserv idReserv INT NOT NULL');
    }
}
