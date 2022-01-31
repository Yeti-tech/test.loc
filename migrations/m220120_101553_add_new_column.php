<?php

use yii\db\Migration;

/**
 * Class m220120_101553_add_new_column
 */
class m220120_101553_add_new_column extends Migration
{
    private $tableName = 'guest_record';

    public function safeUp(): bool
    {
        $this->addColumn($this->tableName, 'rating', $this->integer());
        return true;
    }

    public function safeDown(): bool
    {
        $this->dropColumn($this->tableName, 'rating');
        return false;
    }
}
