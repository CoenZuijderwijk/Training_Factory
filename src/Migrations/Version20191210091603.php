<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191210091603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY les_training');
        $this->addSql('DROP INDEX les_training ON lesson');
        $this->addSql('ALTER TABLE lesson CHANGE les_naam les_naam VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE persoon ADD ingeschreven_lessen LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE roles roles JSON NOT NULL, CHANGE hiring_date hiring_date DATE DEFAULT NULL, CHANGE salary salary NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE registration CHANGE payment payment VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX naam ON training');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson CHANGE les_naam les_naam VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT les_training FOREIGN KEY (les_naam) REFERENCES training (naam) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX les_training ON lesson (les_naam)');
        $this->addSql('ALTER TABLE persoon DROP ingeschreven_lessen, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE hiring_date hiring_date DATE DEFAULT \'NULL\', CHANGE salary salary NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE registration CHANGE payment payment VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('CREATE UNIQUE INDEX naam ON training (naam)');
    }
}
