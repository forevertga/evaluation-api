<?php

use App\Constants\MigrationConstants;
use Phinx\Migration\AbstractMigration;

class AlterUsersTable extends AbstractMigration
{
    public function up()
    {
        $this->table(MigrationConstants::TABLE_USERS)
            ->addColumn('password', 'string', ['length' => 255, 'null' => false])
            ->update();
    }

    public function down()
    {
        return false;
    }
}
