<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250605233136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE device DROP FOREIGN KEY FK_DCBB0C538E5CC2C0
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_92FB68E8E5CC2C0 ON device
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE device DROP sold_to_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicle CHANGE device_id device_id INT DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE device ADD sold_to_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE device ADD CONSTRAINT FK_DCBB0C538E5CC2C0 FOREIGN KEY (sold_to_id) REFERENCES user (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_92FB68E8E5CC2C0 ON device (sold_to_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicle CHANGE device_id device_id INT NOT NULL
        SQL);
    }
}
