<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220515100727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant ADD stage_id INT DEFAULT NULL, ADD job_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE applicant ADD CONSTRAINT FK_CAAD10192298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE applicant ADD CONSTRAINT FK_CAAD1019BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
        $this->addSql('CREATE INDEX IDX_CAAD10192298D193 ON applicant (stage_id)');
        $this->addSql('CREATE INDEX IDX_CAAD1019BE04EA9 ON applicant (job_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant DROP FOREIGN KEY FK_CAAD10192298D193');
        $this->addSql('ALTER TABLE applicant DROP FOREIGN KEY FK_CAAD1019BE04EA9');
        $this->addSql('DROP INDEX IDX_CAAD10192298D193 ON applicant');
        $this->addSql('DROP INDEX IDX_CAAD1019BE04EA9 ON applicant');
        $this->addSql('ALTER TABLE applicant DROP stage_id, DROP job_id');
    }
}
