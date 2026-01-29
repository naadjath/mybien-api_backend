<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260126234302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE biens ADD proprietaire_id INT NOT NULL, ADD locataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE biens ADD CONSTRAINT FK_1F9004DD76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE biens ADD CONSTRAINT FK_1F9004DDD8A38199 FOREIGN KEY (locataire_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1F9004DD76C50E4A ON biens (proprietaire_id)');
        $this->addSql('CREATE INDEX IDX_1F9004DDD8A38199 ON biens (locataire_id)');
        $this->addSql('ALTER TABLE facture ADD bien_id INT NOT NULL, ADD locataire_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410BD95B80F FOREIGN KEY (bien_id) REFERENCES biens (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410D8A38199 FOREIGN KEY (locataire_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FE866410BD95B80F ON facture (bien_id)');
        $this->addSql('CREATE INDEX IDX_FE866410D8A38199 ON facture (locataire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bien');
        $this->addSql('ALTER TABLE biens DROP FOREIGN KEY FK_1F9004DD76C50E4A');
        $this->addSql('ALTER TABLE biens DROP FOREIGN KEY FK_1F9004DDD8A38199');
        $this->addSql('DROP INDEX IDX_1F9004DD76C50E4A ON biens');
        $this->addSql('DROP INDEX IDX_1F9004DDD8A38199 ON biens');
        $this->addSql('ALTER TABLE biens DROP proprietaire_id, DROP locataire_id');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410BD95B80F');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410D8A38199');
        $this->addSql('DROP INDEX IDX_FE866410BD95B80F ON facture');
        $this->addSql('DROP INDEX IDX_FE866410D8A38199 ON facture');
        $this->addSql('ALTER TABLE facture DROP bien_id, DROP locataire_id');
    }
}
