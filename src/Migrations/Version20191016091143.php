<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191016091143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE intitule (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, fk_intervenant_id INT DEFAULT NULL, intitule VARCHAR(255) NOT NULL, duree INT NOT NULL, INDEX IDX_9014574ADE94FEFF (fk_intervenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574ADE94FEFF FOREIGN KEY (fk_intervenant_id) REFERENCES intervenant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE intitule');
        $this->addSql('DROP TABLE matiere');
    }
}
