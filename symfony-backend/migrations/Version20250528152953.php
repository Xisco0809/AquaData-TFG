<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250528152953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities_user DROP CONSTRAINT fk_7b3d3d43c5d6f1ce
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities_user DROP CONSTRAINT fk_7b3d3d43a76ed395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species_user DROP CONSTRAINT fk_2193bbf64d4556e1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species_user DROP CONSTRAINT fk_2193bbf6a76ed395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news_user DROP CONSTRAINT fk_584e20c2b5a459a0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news_user DROP CONSTRAINT fk_584e20c2a76ed395
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE curiosities_user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE marine_species_user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE news_user
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities ADD users_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities ADD CONSTRAINT FK_B597719567B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B597719567B3B43D ON curiosities (users_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE diary ALTER users_id SET NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species ADD users_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species ADD CONSTRAINT FK_B7AE0B9667B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B7AE0B9667B3B43D ON marine_species (users_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news ADD users_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news ADD CONSTRAINT FK_1DD3995067B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1DD3995067B3B43D ON news (users_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE curiosities_user (curiosities_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(curiosities_id, user_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_7b3d3d43a76ed395 ON curiosities_user (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_7b3d3d43c5d6f1ce ON curiosities_user (curiosities_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE marine_species_user (marine_species_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(marine_species_id, user_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_2193bbf6a76ed395 ON marine_species_user (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_2193bbf64d4556e1 ON marine_species_user (marine_species_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE news_user (news_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(news_id, user_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_584e20c2a76ed395 ON news_user (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idx_584e20c2b5a459a0 ON news_user (news_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities_user ADD CONSTRAINT fk_7b3d3d43c5d6f1ce FOREIGN KEY (curiosities_id) REFERENCES curiosities (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities_user ADD CONSTRAINT fk_7b3d3d43a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species_user ADD CONSTRAINT fk_2193bbf64d4556e1 FOREIGN KEY (marine_species_id) REFERENCES marine_species (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species_user ADD CONSTRAINT fk_2193bbf6a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news_user ADD CONSTRAINT fk_584e20c2b5a459a0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news_user ADD CONSTRAINT fk_584e20c2a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities DROP CONSTRAINT FK_B597719567B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_B597719567B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities DROP users_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE diary ALTER users_id DROP NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species DROP CONSTRAINT FK_B7AE0B9667B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_B7AE0B9667B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species DROP users_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news DROP CONSTRAINT FK_1DD3995067B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_1DD3995067B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news DROP users_id
        SQL);
    }
}
