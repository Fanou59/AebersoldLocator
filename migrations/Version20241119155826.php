<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119155826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chorus (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disc (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `key` (id INT AUTO_INCREMENT NOT NULL, key_chord VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE morceaux (id INT AUTO_INCREMENT NOT NULL, volume_id INT DEFAULT NULL, style_id INT DEFAULT NULL, key_chord_id INT NOT NULL, tempo_id INT DEFAULT NULL, track_id INT DEFAULT NULL, chorus_id INT DEFAULT NULL, disc_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_823125C38FD80EEA (volume_id), INDEX IDX_823125C3BACD6074 (style_id), INDEX IDX_823125C315E8C36A (key_chord_id), INDEX IDX_823125C3234B247D (tempo_id), INDEX IDX_823125C35ED23C43 (track_id), INDEX IDX_823125C36A45FEE8 (chorus_id), INDEX IDX_823125C3C38F37CA (disc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tempo (id INT AUTO_INCREMENT NOT NULL, speed INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE track (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE volume (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE morceaux ADD CONSTRAINT FK_823125C38FD80EEA FOREIGN KEY (volume_id) REFERENCES volume (id)');
        $this->addSql('ALTER TABLE morceaux ADD CONSTRAINT FK_823125C3BACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE morceaux ADD CONSTRAINT FK_823125C315E8C36A FOREIGN KEY (key_chord_id) REFERENCES `key` (id)');
        $this->addSql('ALTER TABLE morceaux ADD CONSTRAINT FK_823125C3234B247D FOREIGN KEY (tempo_id) REFERENCES tempo (id)');
        $this->addSql('ALTER TABLE morceaux ADD CONSTRAINT FK_823125C35ED23C43 FOREIGN KEY (track_id) REFERENCES track (id)');
        $this->addSql('ALTER TABLE morceaux ADD CONSTRAINT FK_823125C36A45FEE8 FOREIGN KEY (chorus_id) REFERENCES chorus (id)');
        $this->addSql('ALTER TABLE morceaux ADD CONSTRAINT FK_823125C3C38F37CA FOREIGN KEY (disc_id) REFERENCES disc (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE morceaux DROP FOREIGN KEY FK_823125C38FD80EEA');
        $this->addSql('ALTER TABLE morceaux DROP FOREIGN KEY FK_823125C3BACD6074');
        $this->addSql('ALTER TABLE morceaux DROP FOREIGN KEY FK_823125C315E8C36A');
        $this->addSql('ALTER TABLE morceaux DROP FOREIGN KEY FK_823125C3234B247D');
        $this->addSql('ALTER TABLE morceaux DROP FOREIGN KEY FK_823125C35ED23C43');
        $this->addSql('ALTER TABLE morceaux DROP FOREIGN KEY FK_823125C36A45FEE8');
        $this->addSql('ALTER TABLE morceaux DROP FOREIGN KEY FK_823125C3C38F37CA');
        $this->addSql('DROP TABLE chorus');
        $this->addSql('DROP TABLE disc');
        $this->addSql('DROP TABLE `key`');
        $this->addSql('DROP TABLE morceaux');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE tempo');
        $this->addSql('DROP TABLE track');
        $this->addSql('DROP TABLE volume');
    }
}
