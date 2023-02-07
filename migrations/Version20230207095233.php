<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230207095233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, nom_competence VARCHAR(50) NOT NULL, description_competence LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, intitule_experience VARCHAR(255) NOT NULL, date_debut VARCHAR(50) DEFAULT NULL, date_fin VARCHAR(50) DEFAULT NULL, missions_experience LONGTEXT DEFAULT NULL, etablissement_experience VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisation (id INT AUTO_INCREMENT NOT NULL, titre_realisation VARCHAR(150) NOT NULL, description_realisation LONGTEXT DEFAULT NULL, lien_realisation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technologie (id INT AUTO_INCREMENT NOT NULL, nom_technologie VARCHAR(50) NOT NULL, logo_technologie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technologie_realisation (technologie_id INT NOT NULL, realisation_id INT NOT NULL, INDEX IDX_4FA7EFA0261A27D2 (technologie_id), INDEX IDX_4FA7EFA0B685E551 (realisation_id), PRIMARY KEY(technologie_id, realisation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techo_realisation (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE technologie_realisation ADD CONSTRAINT FK_4FA7EFA0261A27D2 FOREIGN KEY (technologie_id) REFERENCES technologie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE technologie_realisation ADD CONSTRAINT FK_4FA7EFA0B685E551 FOREIGN KEY (realisation_id) REFERENCES realisation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technologie_realisation DROP FOREIGN KEY FK_4FA7EFA0261A27D2');
        $this->addSql('ALTER TABLE technologie_realisation DROP FOREIGN KEY FK_4FA7EFA0B685E551');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE realisation');
        $this->addSql('DROP TABLE technologie');
        $this->addSql('DROP TABLE technologie_realisation');
        $this->addSql('DROP TABLE techo_realisation');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
