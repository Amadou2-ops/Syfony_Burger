<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220114080549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE burger (id INT AUTO_INCREMENT NOT NULL, complement_id INT DEFAULT NULL, INDEX IDX_EFE35A0D40D9D0AA (complement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, paiement_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, telephone INT NOT NULL, UNIQUE INDEX UNIQ_C744045519EB6921 (client_id), UNIQUE INDEX UNIQ_C74404552A4C4478 (paiement_id), INDEX IDX_C744045582EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, numeroc INT NOT NULL, etat VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE complement (id INT AUTO_INCREMENT NOT NULL, burger_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, prix INT NOT NULL, INDEX IDX_F8A41E3417CE5090 (burger_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, prix INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0D40D9D0AA FOREIGN KEY (complement_id) REFERENCES complement (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045519EB6921 FOREIGN KEY (client_id) REFERENCES paiement (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404552A4C4478 FOREIGN KEY (paiement_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045582EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE complement ADD CONSTRAINT FK_F8A41E3417CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE complement DROP FOREIGN KEY FK_F8A41E3417CE5090');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404552A4C4478');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045582EA2E54');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0D40D9D0AA');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045519EB6921');
        $this->addSql('DROP TABLE burger');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE complement');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE user');
    }
}
