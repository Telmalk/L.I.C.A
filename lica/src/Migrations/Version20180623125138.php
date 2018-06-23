<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180623125138 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alien (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, race VARCHAR(40) NOT NULL, weight INT NOT NULL, height INT NOT NULL, sex VARCHAR(10) NOT NULL, origin VARCHAR(30) NOT NULL, nutritions VARCHAR(500) NOT NULL, attack INT NOT NULL, defense INT NOT NULL, speed INT NOT NULL, threat INT NOT NULL, description_card VARCHAR(500) NOT NULL, trait VARCHAR(300) NOT NULL, win INT NOT NULL, defeat INT NOT NULL, health_status VARCHAR(30) NOT NULL, adopted TINYINT(1) NOT NULL, rating INT NOT NULL, price INT NOT NULL, INDEX IDX_E606C24979F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alien ADD CONSTRAINT FK_E606C24979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE alien');
    }
}
