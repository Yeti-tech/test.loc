<?php

namespace app\models;


/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string|null $comment Комменты к записи
 * @property int|null $record_id Id записи
 */
class Comment extends \yii\db\ActiveRecord
{

    public $rating;

    public static function tableName(): string
    {
        return 'comment';
    }

    public function rules(): array
    {
        return [
            [['record_id'], 'integer'],
            [['rating'], 'integer'],
            [['record_id'], 'required'],
            [['comment'], 'string', 'max' => 2000],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'record_id' => 'Record ID',
        ];
    }
    }


