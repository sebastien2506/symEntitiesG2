<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240910131937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE section (id INT UNSIGNED AUTO_INCREMENT NOT NULL, section_title VARCHAR(120) NOT NULL, section_description VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_article (section_id INT UNSIGNED NOT NULL, article_id INT UNSIGNED NOT NULL, INDEX IDX_D07DC369D823E37A (section_id), INDEX IDX_D07DC3697294869C (article_id), PRIMARY KEY(section_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE section_article ADD CONSTRAINT FK_D07DC369D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_article ADD CONSTRAINT FK_D07DC3697294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_article DROP FOREIGN KEY FK_D07DC369D823E37A');
        $this->addSql('ALTER TABLE section_article DROP FOREIGN KEY FK_D07DC3697294869C');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE section_article');
    }
}
