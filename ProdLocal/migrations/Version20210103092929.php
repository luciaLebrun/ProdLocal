<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210103092929 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, image VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, shop_id INT DEFAULT NULL, day VARCHAR(80) NOT NULL, opening_hour VARCHAR(5) NOT NULL, closing_hour VARCHAR(5) NOT NULL, INDEX IDX_5A3811FB4D16C4DD (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE product ADD category_id INT NOT NULL, ADD image VARCHAR(80) NOT NULL, ADD availability TINYINT(1) NOT NULL, ADD unity VARCHAR(80) NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('ALTER TABLE shop DROP opening_hour, DROP closing_hour');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON product');
        $this->addSql('ALTER TABLE product DROP category_id, DROP image, DROP availability, DROP unity');
        $this->addSql('ALTER TABLE shop ADD opening_hour INT NOT NULL, ADD closing_hour INT NOT NULL');
    }
}
