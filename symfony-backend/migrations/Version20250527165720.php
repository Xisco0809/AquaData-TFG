<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250527165720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE curiosities (id SERIAL NOT NULL, title VARCHAR(100) NOT NULL, description TEXT NOT NULL, category VARCHAR(50) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE curiosities_user (curiosities_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(curiosities_id, user_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_7B3D3D43C5D6F1CE ON curiosities_user (curiosities_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_7B3D3D43A76ED395 ON curiosities_user (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE diary (id SERIAL NOT NULL, users_id INT DEFAULT NULL, date DATE NOT NULL, species VARCHAR(50) NOT NULL, quantity INT NOT NULL, notes TEXT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_917BEDE267B3B43D ON diary (users_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE marine_species (id SERIAL NOT NULL, diary_id INT NOT NULL, name VARCHAR(50) NOT NULL, image VARCHAR(100) NOT NULL, avarage_weight DOUBLE PRECISION NOT NULL, measurements VARCHAR(100) NOT NULL, description TEXT NOT NULL, category VARCHAR(50) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B7AE0B96E020E47A ON marine_species (diary_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE marine_species_user (marine_species_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(marine_species_id, user_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2193BBF64D4556E1 ON marine_species_user (marine_species_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2193BBF6A76ED395 ON marine_species_user (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE news (id SERIAL NOT NULL, title VARCHAR(100) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE news_user (news_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(news_id, user_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_584E20C2B5A459A0 ON news_user (news_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_584E20C2A76ED395 ON news_user (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "user" (id SERIAL NOT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(50) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN messenger_messages.created_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN messenger_messages.available_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN messenger_messages.delivered_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
                BEGIN
                    PERFORM pg_notify('messenger_messages', NEW.queue_name::text);
                    RETURN NEW;
                END;
            $$ LANGUAGE plpgsql;
        SQL);
        $this->addSql(<<<'SQL'
            DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities_user ADD CONSTRAINT FK_7B3D3D43C5D6F1CE FOREIGN KEY (curiosities_id) REFERENCES curiosities (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities_user ADD CONSTRAINT FK_7B3D3D43A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE diary ADD CONSTRAINT FK_917BEDE267B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species ADD CONSTRAINT FK_B7AE0B96E020E47A FOREIGN KEY (diary_id) REFERENCES diary (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species_user ADD CONSTRAINT FK_2193BBF64D4556E1 FOREIGN KEY (marine_species_id) REFERENCES marine_species (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species_user ADD CONSTRAINT FK_2193BBF6A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news_user ADD CONSTRAINT FK_584E20C2B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news_user ADD CONSTRAINT FK_584E20C2A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities_user DROP CONSTRAINT FK_7B3D3D43C5D6F1CE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curiosities_user DROP CONSTRAINT FK_7B3D3D43A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE diary DROP CONSTRAINT FK_917BEDE267B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species DROP CONSTRAINT FK_B7AE0B96E020E47A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species_user DROP CONSTRAINT FK_2193BBF64D4556E1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE marine_species_user DROP CONSTRAINT FK_2193BBF6A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news_user DROP CONSTRAINT FK_584E20C2B5A459A0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE news_user DROP CONSTRAINT FK_584E20C2A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE curiosities
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE curiosities_user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE diary
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE marine_species
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE marine_species_user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE news
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE news_user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "user"
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
