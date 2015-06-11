<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unterrichtsstunde".
 *
 * @property integer $us_id
 * @property string $us_std_datum
 * @property integer $us_stunde
 * @property string $us_kurzbezeichnung
 * @property string $us_raum
 * @property string $us_thema
 * @property string $k_name
 * @property string $uf_kurzbezeichnung
 * @property integer $user_id
 *
 * @property Unterrichtsfach $ufKurzbezeichnung
 * @property Klasse $kName
 * @property User $user
 */
class Unterrichtsstunde extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unterrichtsstunde';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['us_id', 'us_std_datum', 'us_stunde', 'us_kurzbezeichnung', 'us_raum', 'k_name', 'uf_kurzbezeichnung', 'user_id'], 'required'],
            [['us_id', 'us_stunde', 'user_id'], 'integer'],
            [['us_std_datum'], 'safe'],
            [['us_kurzbezeichnung', 'us_raum', 'us_thema', 'k_name', 'uf_kurzbezeichnung'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'us_id' => 'Us ID',
            'us_std_datum' => 'Us Std Datum',
            'us_stunde' => 'Us Stunde',
            'us_kurzbezeichnung' => 'Us Kurzbezeichnung',
            'us_raum' => 'Us Raum',
            'us_thema' => 'Us Thema',
            'k_name' => 'K Name',
            'uf_kurzbezeichnung' => 'Uf Kurzbezeichnung',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUfKurzbezeichnung()
    {
        return $this->hasOne(Unterrichtsfach::className(), ['uf_kurzbezeichnung' => 'uf_kurzbezeichnung']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKName()
    {
        return $this->hasOne(Klasse::className(), ['k_name' => 'k_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
