<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180623130416 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fight (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE new_fight (id INT AUTO_INCREMENT NOT NULL, bet INT NOT NULL, odd_fighter1 INT NOT NULL, odd_fighter2 INT NOT NULL, date DATETIME NOT NULL, accepted TINYINT(1) NOT NULL, winner VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alien ADD fight_id INT DEFAULT NULL, ADD alien1_id INT DEFAULT NULL, ADD alien2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alien ADD CONSTRAINT FK_E606C249AC6657E4 FOREIGN KEY (fight_id) REFERENCES fight (id)');
        $this->addSql('ALTER TABLE alien ADD CONSTRAINT FK_E606C2499BD7E9A8 FOREIGN KEY (alien1_id) REFERENCES new_fight (id)');
        $this->addSql('ALTER TABLE alien ADD CONSTRAINT FK_E606C24989624646 FOREIGN KEY (alien2_id) REFERENCES new_fight (id)');
        $this->addSql('CREATE INDEX IDX_E606C249AC6657E4 ON alien (fight_id)');
        $this->addSql('CREATE INDEX IDX_E606C2499BD7E9A8 ON alien (alien1_id)');
        $this->addSql('CREATE INDEX IDX_E606C24989624646 ON alien (alien2_id)');
        $this->addSql('ALTER TABLE user ADD user1_id INT DEFAULT NULL, ADD user2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64956AE248B FOREIGN KEY (user1_id) REFERENCES new_fight (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649441B8B65 FOREIGN KEY (user2_id) REFERENCES new_fight (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64956AE248B ON user (user1_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649441B8B65 ON user (user2_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alien DROP FOREIGN KEY FK_E606C249AC6657E4');
        $this->addSql('ALTER TABLE alien DROP FOREIGN KEY FK_E606C2499BD7E9A8');
        $this->addSql('ALTER TABLE alien DROP FOREIGN KEY FK_E606C24989624646');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64956AE248B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649441B8B65');
        $this->addSql('DROP TABLE fight');
        $this->addSql('DROP TABLE new_fight');
        $this->addSql('DROP INDEX IDX_E606C249AC6657E4 ON alien');
        $this->addSql('DROP INDEX IDX_E606C2499BD7E9A8 ON alien');
        $this->addSql('DROP INDEX IDX_E606C24989624646 ON alien');
        $this->addSql('ALTER TABLE alien DROP fight_id, DROP alien1_id, DROP alien2_id');
        $this->addSql('DROP INDEX IDX_8D93D64956AE248B ON user');
        $this->addSql('DROP INDEX IDX_8D93D649441B8B65 ON user');
        $this->addSql('ALTER TABLE user DROP user1_id, DROP user2_id');
    }
}
