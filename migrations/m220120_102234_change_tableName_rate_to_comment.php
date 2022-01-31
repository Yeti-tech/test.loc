<?php

use yii\db\Migration;

/**
 * Class m220120_102234_change_tableName_rate_to_comment
 */
class m220120_102234_change_tableName_rate_to_comment extends Migration
{
    private $oldTableName = 'rate';
    private $newTableName = 'comment';

    public function safeUp(): bool
    {
        $this->renameTable($this->oldTableName, $this->newTableName);
        return true;
    }

    public function safeDown(): bool
    {
        $this->renameTable($this->newTableName, $this->oldTableName);
        return false;
    }
}
