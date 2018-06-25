<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180623181621 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fight (id INT AUTO_INCREMENT NOT NULL, user1_id INT NOT NULL, user2_id INT DEFAULT NULL, alien1_id INT DEFAULT NULL, alien2_id INT DEFAULT NULL, bet INT NOT NULL, odd_fighter1 INT NOT NULL, odd_fighter2 INT NOT NULL, date DATETIME NOT NULL, accepted TINYINT(1) NOT NULL, INDEX IDX_21AA445656AE248B (user1_id), INDEX IDX_21AA4456441B8B65 (user2_id), INDEX IDX_21AA44569BD7E9A8 (alien1_id), INDEX IDX_21AA445689624646 (alien2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fight ADD CONSTRAINT FK_21AA445656AE248B FOREIGN KEY (user1_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fight ADD CONSTRAINT FK_21AA4456441B8B65 FOREIGN KEY (user2_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fight ADD CONSTRAINT FK_21AA44569BD7E9A8 FOREIGN KEY (alien1_id) REFERENCES alien (id)');
        $this->addSql('ALTER TABLE fight ADD CONSTRAINT FK_21AA445689624646 FOREIGN KEY (alien2_id) REFERENCES alien (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE fight');
    }
}
