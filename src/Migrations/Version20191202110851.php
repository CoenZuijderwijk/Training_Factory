<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191202110851 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY registration_ibfk_2');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY lesson_ibfk_2');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE registration');
        $this->addSql('DROP TABLE training');
        $this->addSql('ALTER TABLE persoon ADD prepovision VARCHAR(255) NOT NULL, DROP firstname, DROP preprovision, CHANGE hiring_date hiring_date DATE DEFAULT NULL, CHANGE salary salary NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lesson (person_id INT DEFAULT NULL, training_id INT NOT NULL, ID INT AUTO_INCREMENT NOT NULL, time TIME NOT NULL, date DATE NOT NULL, location VARCHAR(255) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, max_persons INT NOT NULL, INDEX training_id (training_id), INDEX instructor_id (person_id), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE registration (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, lesson_id INT DEFAULT NULL, payment VARCHAR(255) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, INDEX person_id (person_id), INDEX lesson_id (lesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE training (ID INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, description VARCHAR(255) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, duration INT NOT NULL, costs DOUBLE PRECISION NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT lesson_ibfk_2 FOREIGN KEY (training_id) REFERENCES training (ID)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT lesson_ibfk_3 FOREIGN KEY (person_id) REFERENCES persoon (ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT registration_ibfk_2 FOREIGN KEY (lesson_id) REFERENCES lesson (ID)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT registration_ibfk_3 FOREIGN KEY (person_id) REFERENCES persoon (ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE persoon ADD preprovision VARCHAR(255) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`, CHANGE hiring_date hiring_date DATE DEFAULT \'NULL\', CHANGE salary salary NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE prepovision firstname VARCHAR(255) CHARACTER SET utf16 NOT NULL COLLATE `utf16_general_ci`');
    }
}
