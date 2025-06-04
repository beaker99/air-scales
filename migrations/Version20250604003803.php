<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250604003803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, sold_to_id INT NOT NULL, entity_type VARCHAR(64) DEFAULT NULL, serial_number VARCHAR(32) DEFAULT NULL, mac_address VARCHAR(17) DEFAULT NULL, firmware_version VARCHAR(64) DEFAULT NULL, notes VARCHAR(255) DEFAULT NULL, order_date DATETIME DEFAULT NULL, ship_date DATETIME DEFAULT NULL, tracking_id VARCHAR(64) DEFAULT NULL, INDEX IDX_DCBB0C538E5CC2C0 (sold_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C538E5CC2C0 FOREIGN KEY (sold_to_id) REFERENCES user (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C538E5CC2C0
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE unit
        SQL);
    }
}
