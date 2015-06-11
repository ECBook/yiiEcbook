<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fehlstunde".
 *
 * @property string $fs_datum
 * @property string $fs_grund
 * @property string $fs_anzahl
 * @property integer $user_id
 * @property string $fs_anmerkung
 * @property integer $fs_versaetet
 *
 * @property User $user
 */
class Fehlstunde extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fehlstunde';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fs_datum', 'fs_grund', 'user_id'], 'required'],
            [['fs_datum'], 'safe'],
            [['user_id', 'fs_versaetet'], 'integer'],
            [['fs_grund', 'fs_anzahl', 'fs_anmerkung'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fs_datum' => 'Fs Datum',
            'fs_grund' => 'Fs Grund',
            'fs_anzahl' => 'Fs Anzahl',
            'user_id' => 'User ID',
            'fs_anmerkung' => 'Fs Anmerkung',
            'fs_versaetet' => 'Fs Versaetet',
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
