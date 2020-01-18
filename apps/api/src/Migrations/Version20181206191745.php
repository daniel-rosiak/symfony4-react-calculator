<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181206191745 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $table_user_profile = $schema->createTable('operations');
        $table_user_profile->addColumn('id', 'integer', ['autoincrement' => true]);
        $table_user_profile->addColumn('arguments', 'text');
        $table_user_profile->addColumn('type', 'string', ['length' => 50]);
        $table_user_profile->addColumn('result', 'string', [ 'length' => 255 ]);
        $table_user_profile->addColumn('created_at', 'datetime');

        $table_user_profile->setPrimaryKey(['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('operations');
    }
}
