<?php

use App\Constants\MigrationConstants;
use Phinx\Migration\AbstractMigration;

class InstallUsersTable extends AbstractMigration
{
    public function up()
    {
        $this->table(MigrationConstants::TABLE_USERS)
            ->addColumn('username', 'string', ['length' => 100, 'null' => false])
            ->addColumn('first_name', 'string', ['length' => 100, 'null' => false])
            ->addColumn('last_name', 'string', ['length' => 100, 'null' => false])
            ->addColumn('display_name', 'string', ['length' => 200, 'null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->addColumn('last_login_time', 'datetime', ['null' => false])
            ->create();
    }

    public function down()
    {
        $this->dropTable(MigrationConstants::TABLE_USERS);
    }
}
