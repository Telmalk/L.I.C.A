<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180628092042 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
       /* $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD description VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE pseudo pseudo VARCHAR(255) NOT NULL, CHANGE nb_credit nb_credit INT NOT NULL, CHANGE win win INT NOT NULL, CHANGE defeat defeat INT NOT NULL, CHANGE rating rating INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64986CC499D ON user (pseudo)');
       */
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin DROP roles');
        $this->addSql('DROP INDEX UNIQ_8D93D64986CC499D ON user');
        $this->addSql('ALTER TABLE user DROP roles, DROP description, CHANGE password password VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE pseudo pseudo VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE nb_credit nb_credit INT DEFAULT 0, CHANGE win win INT DEFAULT NULL, CHANGE defeat defeat INT DEFAULT NULL, CHANGE rating rating INT DEFAULT NULL');
    }
}
