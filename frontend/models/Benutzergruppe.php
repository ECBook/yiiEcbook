<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "benutzergruppe".
 *
 * @property integer $bg_id
 * @property string $bg_name
 * @property integer $bg_value
 *
 * @property User[] $users
 */
class Benutzergruppe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'benutzergruppe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bg_value'], 'required'],
            [['bg_value'], 'integer'],
            [['bg_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bg_id' => 'Bg ID',
            'bg_name' => 'Bg Name',
            'bg_value' => 'Bg Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['benutzergruppe' => 'bg_id']);
    }
}
