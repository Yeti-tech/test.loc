<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "guest_record".
 *
 * @property int $id
 * @property int|null $user_id Идентификатор пользователя
 * @property string|null $text Текст записи
 * @property string $created_at Дата создания записи
 * @property int|null $rating Рейтинг записи
 * @property array|null $comments Комментарии к записи
 */
class GuestRecord extends \yii\db\ActiveRecord
{

    public function calculateTotalRating($oldRating, $postRating)
    {
        $postRating += $oldRating;
        $this->rating = $postRating;
        $this->save();
        return $postRating;
    }

    public function behaviors(): array
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => false,
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],

        ];
    }

    public static function tableName(): string
    {
        return 'guest_record';
    }

    public function rules(): array
    {
        return [
            [['user_id'], 'integer'],
            [['user_id'], 'required'],
            [['rating'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => Users::class,
                'targetAttribute' => 'id', 'message' => Yii::t('app',
                'This user_id doesn\'t exist in Users Table')],
            [['text'], 'string', 'max' => 2000],
            [['text'], 'required', 'message' => 'Please fill the form.'],
            [['created_at'], 'safe'],];

    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'text' => 'Text',
            'rating' => 'Рейтинг',
        ];
    }

    public function getComments(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Comment::class, ['record_id' => 'id']);
    }


    public function getName(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}