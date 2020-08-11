<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200811083757 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(40) NOT NULL, contact_name VARCHAR(30) DEFAULT NULL, contact_title VARCHAR(30) DEFAULT NULL, address VARCHAR(60) DEFAULT NULL, city VARCHAR(15) DEFAULT NULL, region VARCHAR(15) DEFAULT NULL, postal_code VARCHAR(10) DEFAULT NULL, country VARCHAR(15) DEFAULT NULL, phone VARCHAR(24) DEFAULT NULL, fax VARCHAR(24) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_details (id INT AUTO_INCREMENT NOT NULL, unit_price NUMERIC(10, 4) NOT NULL, quantity SMALLINT NOT NULL, discount DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, employee_id INT DEFAULT NULL, order_date DATETIME DEFAULT NULL, required_date DATETIME DEFAULT NULL, shipped_date DATETIME DEFAULT NULL, ship_via INT DEFAULT NULL, freight NUMERIC(10, 4) DEFAULT NULL, ship_name VARCHAR(40) DEFAULT NULL, ship_address VARCHAR(60) DEFAULT NULL, ship_city VARCHAR(15) DEFAULT NULL, ship_region VARCHAR(15) DEFAULT NULL, ship_postal_code VARCHAR(10) DEFAULT NULL, ship_country VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suppliers (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(40) NOT NULL, contact_name VARCHAR(30) DEFAULT NULL, contact_title VARCHAR(30) DEFAULT NULL, address VARCHAR(60) DEFAULT NULL, city VARCHAR(15) DEFAULT NULL, region VARCHAR(15) DEFAULT NULL, postal_code VARCHAR(10) DEFAULT NULL, phone VARCHAR(24) DEFAULT NULL, fax VARCHAR(24) DEFAULT NULL, home_page LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE suppliers');
    }
}
