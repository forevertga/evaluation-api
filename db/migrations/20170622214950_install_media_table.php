<?php

use App\Constants\MigrationConstants;
use Phinx\Migration\AbstractMigration;

class InstallMediaTable extends AbstractMigration
{
    public function up()
    {
        $this->table(MigrationConstants::TABLE_MEDIA)
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('url', 'string', ['length' => 255, 'null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->addForeignKey('user_id', MigrationConstants::TABLE_USERS, 'id', [])
            ->create();
    }

    public function down()
    {
        $this->table(MigrationConstants::TABLE_MEDIA)
        ->dropForeignKey('user_id')->drop();
    }
}
