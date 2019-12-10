<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191210120539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE products (sku CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', brand_id INT DEFAULT NULL, category_id INT DEFAULT NULL COMMENT \'(DC2Type:id)\', name VARCHAR(255) NOT NULL, password_hash LONGTEXT NOT NULL, photos JSON NOT NULL, status VARCHAR(255) NOT NULL COMMENT \'(DC2Type:product_status)\', INDEX IDX_B3BA5A5A44F5D008 (brand_id), INDEX IDX_B3BA5A5A12469DE2 (category_id), PRIMARY KEY(sku)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brands (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_details (version VARCHAR(20) NOT NULL, material VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, product_sku CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', quantity INT UNSIGNED NOT NULL, price VARCHAR(255) NOT NULL, specification LONGTEXT NOT NULL, INDEX IDX_A3FF103AEFBF6CDB (product_sku), PRIMARY KEY(product_sku, version, material, color)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL COMMENT \'(DC2Type:id)\', parent_id INT DEFAULT NULL COMMENT \'(DC2Type:id)\', name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3AF34668727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A44F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE product_details ADD CONSTRAINT FK_A3FF103AEFBF6CDB FOREIGN KEY (product_sku) REFERENCES products (sku) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_details DROP FOREIGN KEY FK_A3FF103AEFBF6CDB');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A44F5D008');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A12469DE2');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668727ACA70');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE brands');
        $this->addSql('DROP TABLE product_details');
        $this->addSql('DROP TABLE categories');
    }
}
