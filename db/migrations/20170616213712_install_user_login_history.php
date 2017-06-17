<?php

use App\Constants\MigrationConstants;
use Phinx\Migration\AbstractMigration;

class InstallUserLoginHistory extends AbstractMigration
{
    public function up()
    {
        $this->table(MigrationConstants::TABLE_USER_LOGIN_HISTORY)
            ->addColumn('user', 'string', ['length' => 100, 'null' => false])
            ->addColumn('login_status', 'string', ['length' => 100, 'null' => false])
            ->addColumn('login_time', 'datetime', ['null' => false])
            ->addColumn('comment', 'text', ['null' => true])
            ->addColumn('ip_address', 'string', ['length' => 100, 'null' => false])
            ->addColumn('user_agent', 'text', ['null' => false])
            ->create();
    }

    public function down()
    {
        $this->table(MigrationConstants::TABLE_USER_LOGIN_HISTORY)->drop();
    }
}
