<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name User's name
 * @property string|null $surname User's last name
 * @property int|null $age User's age
 *
 */
class Users extends \yii\db\ActiveRecord
{

    public static function tableName(): string
    {
        return 'users';
    }

    public function rules(): array
    {
        return [
            [['age'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['surname'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'age' => 'Age',
        ];
    }

    public function getDisplayName(): string
    {
        return $this->name. ' ' .$this->surname;
    }

    public function getCommentsByUser(): \yii\db\ActiveQuery
    {
        return $this->hasMany(GuestRecord::class, ['user_id' => 'id']);
    }
}


