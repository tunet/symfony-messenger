<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230204192405 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE image_post_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('
            CREATE TABLE image_post (
                id INT NOT NULL, 
                filename VARCHAR(255) NOT NULL, 
                original_filename VARCHAR(255) NOT NULL, 
                ponka_added_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, 
                created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, 
                PRIMARY KEY(id)
            )
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP SEQUENCE image_post_id_seq CASCADE');
        $this->addSql('DROP TABLE image_post');
    }
}
