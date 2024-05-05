<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240505155027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal CHANGE details_commentaire details_commentaire LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE habitat CHANGE habitat_description habitat_description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE service_tab_entity CHANGE service_description service_description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal CHANGE details_commentaire details_commentaire VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE habitat CHANGE habitat_description habitat_description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE service_tab_entity CHANGE service_description service_description TEXT NOT NULL');
    }
}
