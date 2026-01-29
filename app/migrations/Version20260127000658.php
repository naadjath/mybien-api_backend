<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260127000658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, message LONGTEXT NOT NULL, is_read TINYINT NOT NULL, created_at DATETIME NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, facture_id INT NOT NULL, INDEX IDX_BF5476CAF624B39D (sender_id), INDEX IDX_BF5476CACD53EDB6 (receiver_id), INDEX IDX_BF5476CA7F2DEE08 (facture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CACD53EDB6 FOREIGN KEY (receiver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAF624B39D');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CACD53EDB6');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA7F2DEE08');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE notification');
    }
}
