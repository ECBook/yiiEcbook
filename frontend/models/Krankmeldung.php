<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "krankmeldung".
 *
 * @property integer $km_id
 * @property string $km_datum
 * @property string $km_unterschrift
 * @property integer $user_id
 *
 * @property User $user
 */
class Krankmeldung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'krankmeldung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['km_id', 'user_id'], 'required'],
            [['km_id', 'user_id'], 'integer'],
            [['km_datum'], 'safe'],
            [['km_unterschrift'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'km_id' => 'Km ID',
            'km_datum' => 'Km Datum',
            'km_unterschrift' => 'Km Unterschrift',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
