<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250301163939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite_categorie_actualite (actualite_id INT NOT NULL, categorie_actualite_id INT NOT NULL, INDEX IDX_1E32B8AEA2843073 (actualite_id), INDEX IDX_1E32B8AEDB8776F1 (categorie_actualite_id), PRIMARY KEY(actualite_id, categorie_actualite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_actualite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, couleur VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualite_categorie_actualite ADD CONSTRAINT FK_1E32B8AEA2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_categorie_actualite ADD CONSTRAINT FK_1E32B8AEDB8776F1 FOREIGN KEY (categorie_actualite_id) REFERENCES categorie_actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE atelier CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE bruit_de_coolisses CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE formation CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE langue CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE partenaire CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE profil CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE realisation CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE stage CHANGE updated_at updated_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite_categorie_actualite DROP FOREIGN KEY FK_1E32B8AEA2843073');
        $this->addSql('ALTER TABLE actualite_categorie_actualite DROP FOREIGN KEY FK_1E32B8AEDB8776F1');
        $this->addSql('DROP TABLE actualite_categorie_actualite');
        $this->addSql('DROP TABLE categorie_actualite');
        $this->addSql('ALTER TABLE actualite CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE atelier CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE bruit_de_coolisses CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE langue CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE profil CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE realisation CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE stage CHANGE updated_at updated_at DATE NOT NULL');
    }
}
