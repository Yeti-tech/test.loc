<?php

use yii\db\Migration;

/**
 * Class m220120_101951_drop_column
 */
class m220120_101951_drop_column extends Migration
{
    private $tableName = 'rate';

    public function safeUp(): bool
    {
        $this->dropColumn($this->tableName, 'rating');
        return true;
    }

    public function safeDown(): bool
    {
        $this->addColumn($this->tableName, 'rating', $this->integer());
        return false;
    }
}
