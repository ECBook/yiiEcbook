<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eltern".
 *
 * @property integer $e_id
 * @property string $e_nachname
 * @property string $e_vorname
 * @property string $e_anrede
 * @property string $e_titel
 *
 * @property User[] $users
 */
class Eltern extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eltern';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['e_nachname', 'e_vorname'], 'required'],
            [['e_nachname', 'e_vorname', 'e_titel'], 'string', 'max' => 45],
            [['e_anrede'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'e_id' => 'E ID',
            'e_nachname' => 'E Nachname',
            'e_vorname' => 'E Vorname',
            'e_anrede' => 'E Anrede',
            'e_titel' => 'E Titel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Eltern_e_id' => 'e_id']);
    }
}
