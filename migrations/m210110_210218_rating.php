<?php

use yii\db\Migration;

/**
 * Class m210110_210218_rating
 */
class m210110_210218_rating extends Migration
{
    private $tableName = 'rate';

    public function safeUp(): bool
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'rating' => $this->integer(11)->comment('Рейтинг записи'), 'comment' => $this->string(2000)->comment('Комменты к записи'),
            'record_id' => $this->integer(11)->comment('Id записи'),
        ]);
        return true;
    }

    public function safeDown(): bool
    {
        $this->dropTable($this->tableName);
        return false;
    }


}