<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230912135421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE log ADD fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE log ADD identificador VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE log ADD codigo_entidad VARCHAR(200) NOT NULL');
        $this->addSql('ALTER TABLE log ADD accion VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE log ADD usuario VARCHAR(25) NOT NULL');
        $this->addSql('ALTER TABLE log ADD ruta VARCHAR(200) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE log DROP fecha');
        $this->addSql('ALTER TABLE log DROP identificador');
        $this->addSql('ALTER TABLE log DROP codigo_entidad');
        $this->addSql('ALTER TABLE log DROP accion');
        $this->addSql('ALTER TABLE log DROP usuario');
        $this->addSql('ALTER TABLE log DROP ruta');
    }
}
