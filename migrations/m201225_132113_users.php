<?php

use yii\db\Migration;

/**
 * Class m201225_132113_users
 */
class m201225_132113_users extends Migration
{
    private $tableName = 'users';

    public function safeUp(): bool
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->comment('Имя пользователя'),
            'surname' => $this->string(200)->comment('Фамилия пользователя'),
            'age' => $this->integer(11)->comment('Возраст пользователя')
        ]);
        return true;
    }

    public function down(): bool
    {
        $this->dropTable($this->tableName);
        return false;
    }

}
