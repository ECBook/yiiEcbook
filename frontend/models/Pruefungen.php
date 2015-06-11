<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pruefungen".
 *
 * @property string $p_datum
 * @property string $p_uhrzeit
 * @property string $p_thema
 * @property string $uf_kurzbezeichnung
 *
 * @property Unterrichtsfach $ufKurzbezeichnung
 */
class Pruefungen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pruefungen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_datum', 'uf_kurzbezeichnung'], 'required'],
            [['p_datum'], 'safe'],
            [['p_uhrzeit', 'p_thema', 'uf_kurzbezeichnung'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_datum' => 'P Datum',
            'p_uhrzeit' => 'P Uhrzeit',
            'p_thema' => 'P Thema',
            'uf_kurzbezeichnung' => 'Uf Kurzbezeichnung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUfKurzbezeichnung()
    {
        return $this->hasOne(Unterrichtsfach::className(), ['uf_kurzbezeichnung' => 'uf_kurzbezeichnung']);
    }
}
