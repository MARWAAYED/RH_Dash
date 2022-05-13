<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513225808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant ADD stage_id_id INT NOT NULL, ADD job_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE applicant ADD CONSTRAINT FK_CAAD1019FFE32C93 FOREIGN KEY (stage_id_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE applicant ADD CONSTRAINT FK_CAAD10197E182327 FOREIGN KEY (job_id_id) REFERENCES job (id)');
        $this->addSql('CREATE INDEX IDX_CAAD1019FFE32C93 ON applicant (stage_id_id)');
        $this->addSql('CREATE INDEX IDX_CAAD10197E182327 ON applicant (job_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applicant DROP FOREIGN KEY FK_CAAD1019FFE32C93');
        $this->addSql('ALTER TABLE applicant DROP FOREIGN KEY FK_CAAD10197E182327');
        $this->addSql('DROP INDEX IDX_CAAD1019FFE32C93 ON applicant');
        $this->addSql('DROP INDEX IDX_CAAD10197E182327 ON applicant');
        $this->addSql('ALTER TABLE applicant DROP stage_id_id, DROP job_id_id');
    }
}
