<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "abteilung".
 *
 * @property string $abt_bezeichnung
 * @property string $abt_kuerzel
 * @property string $abt_vorstand
 * @property string $abt_l_lehrernummer
 *
 * @property Klasse[] $klasses
 * @property User[] $users
 */
class Abteilung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'abteilung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['abt_bezeichnung', 'abt_kuerzel', 'abt_l_lehrernummer'], 'required'],
            [['abt_bezeichnung', 'abt_kuerzel', 'abt_vorstand', 'abt_l_lehrernummer'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'abt_bezeichnung' => 'Abt Bezeichnung',
            'abt_kuerzel' => 'Abt Kuerzel',
            'abt_vorstand' => 'Abt Vorstand',
            'abt_l_lehrernummer' => 'Abt L Lehrernummer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlasses()
    {
        return $this->hasMany(Klasse::className(), ['k_abt_bezeichnung' => 'abt_bezeichnung']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Abteilung_abt_bezeichnung' => 'abt_bezeichnung']);
    }
}
