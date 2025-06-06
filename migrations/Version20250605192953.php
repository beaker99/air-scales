<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250605192953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE calibration_point (id INT AUTO_INCREMENT NOT NULL, device_id INT NOT NULL, air_pressure DOUBLE PRECISION NOT NULL, temperature DOUBLE PRECISION DEFAULT NULL, axle_weight DOUBLE PRECISION NOT NULL, INDEX IDX_3D026D6094A4C7D4 (device_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE calibration_point ADD CONSTRAINT FK_3D026D6094A4C7D4 FOREIGN KEY (device_id) REFERENCES device (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE calibration_point DROP FOREIGN KEY FK_3D026D6094A4C7D4
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE calibration_point
        SQL);
    }
}
