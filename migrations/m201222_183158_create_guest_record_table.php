<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guest_record}}`.
 */
class m201222_183158_create_guest_record_table extends Migration
{
    private $tableName = 'guest_record';


    public function safeUp(): bool
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->comment('Идентификатор пользователя'),
            'text' => $this->string(2000)->comment('Текст записи'),
            'created_at' => $this->timestamp(),
        ]);
        return true;
    }


    public function safeDown(): bool
    {
        $this->dropTable($this->tableName);
        return false;
    }
}
