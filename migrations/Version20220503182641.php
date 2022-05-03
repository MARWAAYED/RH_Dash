<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503182641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empolyee (id INT AUTO_INCREMENT NOT NULL, employee_name VARCHAR(255) NOT NULL, work_phone VARCHAR(255) NOT NULL, work_email VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, job_position VARCHAR(255) NOT NULL, manager VARCHAR(255) DEFAULT NULL, employee_contrats_wage INT DEFAULT NULL, days_off_used DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE condidats CHANGE mobile mobile VARCHAR(255) NOT NULL, CHANGE subject_application_name subject_application_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE empolyee');
        $this->addSql('ALTER TABLE condidats CHANGE mobile mobile VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE subject_application_name subject_application_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
