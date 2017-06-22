<?php

use App\Constants\MigrationConstants;
use Phinx\Migration\AbstractMigration;

class UpdateLoginTimeUsersTable extends AbstractMigration
{
    public function up()
    {
        $this->table(MigrationConstants::TABLE_USERS)
            ->changeColumn('last_login_time', 'datetime', ['null' => true])
            ->update();
    }

    public function down()
    {
        $this->table(MigrationConstants::TABLE_USERS)
            ->changeColumn('last_login_time', 'datetime', ['null' => false])
            ->update();
    }
}
