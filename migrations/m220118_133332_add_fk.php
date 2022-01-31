<?php

use yii\db\Migration;

/**
 * Class m220118_133332_add_fk
 */
class m220118_133332_add_fk extends Migration
{
    private $tableName = 'rate';
    private $refTableName = 'guest_record';

    public function safeUp(): bool
    {
        $this->addForeignKey('FKRECID_ID', $this->tableName, 'record_id', $this->refTableName, 'id');
        return true;
    }

    public function safeDown(): bool
    {
        $this->dropForeignKey('FKRECID_ID', $this->tableName);
        return false;
    }
}


