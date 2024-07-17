<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240717193123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE animal ADD animal_counter_id INT DEFAULT NULL');
    }
    
    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE animal DROP animal_counter_id');
    }
}
