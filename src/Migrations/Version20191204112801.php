<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191204112801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY lesson_ibfk_2');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY lesson_ibfk_3');
        $this->addSql('DROP INDEX lesson_ibfk_3 ON lesson');
        $this->addSql('DROP INDEX training_id ON lesson');
        $this->addSql('ALTER TABLE lesson DROP person_id, DROP training_id');
        $this->addSql('ALTER TABLE persoon CHANGE hiring_date hiring_date DATE DEFAULT NULL, CHANGE salary salary NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE registration CHANGE payment payment VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE lesson ADD person_id INT DEFAULT NULL, ADD training_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT lesson_ibfk_2 FOREIGN KEY (training_id) REFERENCES training (id) ON UPDATE SET NULL ON DELETE SET NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT lesson_ibfk_3 FOREIGN KEY (person_id) REFERENCES persoon (ID) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX lesson_ibfk_3 ON lesson (person_id)');
        $this->addSql('CREATE UNIQUE INDEX training_id ON lesson (training_id)');
        $this->addSql('ALTER TABLE persoon CHANGE hiring_date hiring_date DATE DEFAULT \'NULL\', CHANGE salary salary NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE registration CHANGE payment payment VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT \'NULL\'');
    }
}
