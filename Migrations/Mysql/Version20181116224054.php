<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

// phpcs:ignoreFile

class Version20181116224054 extends AbstractMigration
{
    // phpcs:disable

    /**
     * @return string
     */
    public function getDescription()
    {
        return 'Client and configuration tables for OAuth';
    }

    /**
     * @param Schema $schema
     * @return void
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');

        $this->addSql('CREATE TABLE punktde_oauth2_server_domain_model_client (identifier VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, granttype VARCHAR(255) NOT NULL, hashedsecret VARCHAR(255) NOT NULL, redirecturi VARCHAR(255) DEFAULT NULL, PRIMARY KEY(identifier)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE punktde_oauth2_server_domain_model_serverconfiguration (configurationkey VARCHAR(255) NOT NULL, configurationvalue LONGTEXT NOT NULL, PRIMARY KEY(configurationkey)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     * @return void
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');

        $this->addSql('DROP TABLE punktde_oauth2_server_domain_model_client');
        $this->addSql('DROP TABLE punktde_oauth2_server_domain_model_serverconfiguration');
    }
}
