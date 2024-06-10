<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240610135314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaires ADD lundi_start TIME NOT NULL, ADD lundi_close TIME NOT NULL, ADD mardi_start TIME NOT NULL, ADD mardi_close TIME NOT NULL, ADD mercredi_start TIME NOT NULL, ADD mercredi_close TIME NOT NULL, ADD jeudi_start TIME NOT NULL, ADD jeudi_close TIME NOT NULL, ADD vendredi_start TIME NOT NULL, ADD vendredi_close TIME NOT NULL, ADD samedi_start TIME NOT NULL, ADD samedi_close TIME NOT NULL, ADD dimanche_start TIME NOT NULL, ADD dimanche_close TIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaires DROP lundi_start, DROP lundi_close, DROP mardi_start, DROP mardi_close, DROP mercredi_start, DROP mercredi_close, DROP jeudi_start, DROP jeudi_close, DROP vendredi_start, DROP vendredi_close, DROP samedi_start, DROP samedi_close, DROP dimanche_start, DROP dimanche_close');
    }
}
