<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514193539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applicant (id INT AUTO_INCREMENT NOT NULL, stage_id INT NOT NULL, job_id INT NOT NULL, name VARCHAR(255) NOT NULL, create_date DATE DEFAULT NULL, priority VARCHAR(255) DEFAULT NULL, probability DOUBLE PRECISION DEFAULT NULL, INDEX IDX_CAAD10192298D193 (stage_id), INDEX IDX_CAAD1019BE04EA9 (job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, date_start DATE NOT NULL, date_end DATE DEFAULT NULL, wage DOUBLE PRECISION DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, contract_id INT NOT NULL, name VARCHAR(255) NOT NULL, job_title VARCHAR(255) DEFAULT NULL, work_email VARCHAR(255) DEFAULT NULL, INDEX IDX_5D9F75A12576E0FD (contract_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, no_of_employee INT DEFAULT NULL, no_of_recruitment INT DEFAULT NULL, no_of_hired_employee INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `leave` (id INT AUTO_INCREMENT NOT NULL, private_name VARCHAR(255) NOT NULL, date_from DATE DEFAULT NULL, date_end DATE NOT NULL, number_of_days DOUBLE PRECISION DEFAULT NULL, note VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE applicant ADD CONSTRAINT FK_CAAD10192298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE applicant ADD CONSTRAINT FK_CAAD1019BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A12576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A12576E0FD');
        $this->addSql('ALTER TABLE applicant DROP FOREIGN KEY FK_CAAD1019BE04EA9');
        $this->addSql('ALTER TABLE applicant DROP FOREIGN KEY FK_CAAD10192298D193');
        $this->addSql('DROP TABLE applicant');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE `leave`');
        $this->addSql('DROP TABLE stage');
    }
}
