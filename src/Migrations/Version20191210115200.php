<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191210115200 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE registration (id INT AUTO_INCREMENT NOT NULL, les_id INT NOT NULL, persoon_id INT NOT NULL, payment VARCHAR(255) DEFAULT NULL, INDEX IDX_62A8A7A77FAC85EF (les_id), INDEX IDX_62A8A7A790FBB45F (persoon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A77FAC85EF FOREIGN KEY (les_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A790FBB45F FOREIGN KEY (persoon_id) REFERENCES persoon (id)');
        $this->addSql('ALTER TABLE persoon CHANGE hiring_date hiring_date DATE DEFAULT NULL, CHANGE salary salary NUMERIC(10, 2) DEFAULT NULL, CHANGE ingeschreven_lessen ingeschreven_lessen LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE registration');
        $this->addSql('ALTER TABLE persoon CHANGE hiring_date hiring_date DATE DEFAULT \'NULL\', CHANGE salary salary NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE ingeschreven_lessen ingeschreven_lessen LONGTEXT CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE training CHANGE kosten kosten NUMERIC(10, 2) DEFAULT \'NULL\'');
    }
}
