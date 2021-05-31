<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201104752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D2294458938B6DAD');
        $this->addSql('DROP INDEX IDX_D2294458938B6DAD ON feedback');
        $this->addSql('ALTER TABLE feedback ADD shop_id INT NOT NULL, DROP id_shop_id, DROP id_feedback, CHANGE author author VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D22944584D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('CREATE INDEX IDX_D22944584D16C4DD ON feedback (shop_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD938B6DAD');
        $this->addSql('DROP INDEX IDX_D34A04AD938B6DAD ON product');
        $this->addSql('ALTER TABLE product ADD shop_id INT NOT NULL, DROP id_shop_id, DROP id_product, CHANGE name name VARCHAR(255) NOT NULL, CHANGE price price INT NOT NULL, CHANGE description descrition VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD4D16C4DD ON product (shop_id)');
        $this->addSql('ALTER TABLE shop DROP id_shop, CHANGE name name VARCHAR(255) NOT NULL, CHANGE adress adress VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D22944584D16C4DD');
        $this->addSql('DROP INDEX IDX_D22944584D16C4DD ON feedback');
        $this->addSql('ALTER TABLE feedback ADD id_feedback INT NOT NULL, CHANGE author author VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE shop_id id_shop_id INT NOT NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D2294458938B6DAD FOREIGN KEY (id_shop_id) REFERENCES shop (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D2294458938B6DAD ON feedback (id_shop_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4D16C4DD');
        $this->addSql('DROP INDEX IDX_D34A04AD4D16C4DD ON product');
        $this->addSql('ALTER TABLE product ADD id_product INT NOT NULL, CHANGE name name VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE price price DOUBLE PRECISION NOT NULL, CHANGE shop_id id_shop_id INT NOT NULL, CHANGE descrition description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD938B6DAD FOREIGN KEY (id_shop_id) REFERENCES shop (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D34A04AD938B6DAD ON product (id_shop_id)');
        $this->addSql('ALTER TABLE shop ADD id_shop INT NOT NULL, CHANGE name name VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adress adress VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
