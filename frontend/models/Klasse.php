<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "klasse".
 *
 * @property string $k_name
 * @property string $k_jahrgang
 * @property string $k_abschlussjahr
 * @property integer $k_schueleranzahl
 * @property string $k_abt_bezeichnung
 * @property integer $k_semester
 *
 * @property Abteilung $kAbtBezeichnung
 * @property Unterrichtsstunde[] $unterrichtsstundes
 * @property User[] $users
 */
class Klasse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'klasse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['k_name', 'k_abt_bezeichnung'], 'required'],
            [['k_schueleranzahl', 'k_semester'], 'integer'],
            [['k_name', 'k_jahrgang', 'k_abschlussjahr', 'k_abt_bezeichnung'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'k_name' => 'K Name',
            'k_jahrgang' => 'K Jahrgang',
            'k_abschlussjahr' => 'K Abschlussjahr',
            'k_schueleranzahl' => 'K Schueleranzahl',
            'k_abt_bezeichnung' => 'K Abt Bezeichnung',
            'k_semester' => 'K Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKAbtBezeichnung()
    {
        return $this->hasOne(Abteilung::className(), ['abt_bezeichnung' => 'k_abt_bezeichnung']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnterrichtsstundes()
    {
        return $this->hasMany(Unterrichtsstunde::className(), ['k_name' => 'k_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Klasse_k_name' => 'k_name']);
    }
}
