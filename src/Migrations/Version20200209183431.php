<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200209183431 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE expense (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, refunded_by_id INT NOT NULL, tiltle VARCHAR(255) NOT NULL, comment LONGTEXT NOT NULL, created_on DATE NOT NULL, refunded_on DATE DEFAULT NULL, refund_way VARCHAR(255) NOT NULL, total DOUBLE PRECISION NOT NULL, year INT NOT NULL, INDEX IDX_2D3A8DA6F675F31B (author_id), INDEX IDX_2D3A8DA639321F42 (refunded_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expense_line (id INT AUTO_INCREMENT NOT NULL, expense_id INT NOT NULL, nature VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, invoice_date DATE NOT NULL, amount DOUBLE PRECISION NOT NULL, invoice_file VARCHAR(255) NOT NULL, INDEX IDX_65B3FA94F395DB7B (expense_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, promo INT NOT NULL, position VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA639321F42 FOREIGN KEY (refunded_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE expense_line ADD CONSTRAINT FK_65B3FA94F395DB7B FOREIGN KEY (expense_id) REFERENCES expense (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE expense_line DROP FOREIGN KEY FK_65B3FA94F395DB7B');
        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA6F675F31B');
        $this->addSql('ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA639321F42');
        $this->addSql('DROP TABLE expense');
        $this->addSql('DROP TABLE expense_line');
        $this->addSql('DROP TABLE user');
    }
}
