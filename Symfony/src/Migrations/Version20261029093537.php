<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261029093537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE subtask (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, is_completed TINYINT NOT NULL, task_id INT NOT NULL, INDEX IDX_8BCBA9AE8DB60186 (task_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE subtask ADD CONSTRAINT FK_8BCBA9AE8DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE task ADD assigned_to VARCHAR(100) DEFAULT NULL, ADD priority VARCHAR(20) NOT NULL, ADD due_date DATETIME DEFAULT NULL, ADD estimated INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subtask DROP FOREIGN KEY FK_8BCBA9AE8DB60186');
        $this->addSql('DROP TABLE subtask');
        $this->addSql('ALTER TABLE task DROP assigned_to, DROP priority, DROP due_date, DROP estimated');
    }
}
