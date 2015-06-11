<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use yii\helpers\Html;




/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $status
 * @property integer $benutzergruppe
 * @property string $created_at
 * @property string $updated_at
 * @property string $vorname
 * @property string $nachname
 * @property string $geburtsdatum
 * @property integer $istKlassenvorstand
 * @property string $wohnadresse
 * @property string $telefonnummer
 * @property string $ort
 * @property string $plz
 * @property string $Abteilung_abt_bezeichnung
 * @property integer $Eltern_e_id
 * @property integer $istKlassensprecher
 * @property string $Klasse_k_name
 *
 * @property Benutzergruppe $benutzergruppe0
 * @property Fehlstunde[] $fehlstundes
 * @property Krankmeldung[] $krankmeldungs
 * @property Unterrichtsstunde[] $unterrichtsstundes
 * @property Abteilung $abteilungAbtBezeichnung
 * @property Benutzergruppe $benutzergruppe1
 * @property Eltern $elternE
 * @property Klasse $klasseKName
 * @property Benutzergruppe $benutzergruppe2
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'benutzergruppe', 'Abteilung_abt_bezeichnung', 'Eltern_e_id', 'Klasse_k_name'], 'required'],
            [['id', 'benutzergruppe', 'istKlassenvorstand', 'Eltern_e_id', 'istKlassensprecher'], 'integer'],
            [['geburtsdatum'], 'safe'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'created_at', 'updated_at', 'vorname', 'nachname', 'wohnadresse', 'telefonnummer', 'ort', 'plz', 'Abteilung_abt_bezeichnung', 'Klasse_k_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'benutzergruppe' => 'Benutzergruppe',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'vorname' => 'Vorname',
            'nachname' => 'Nachname',
            'geburtsdatum' => 'Geburtsdatum',
            'istKlassenvorstand' => 'Ist Klassenvorstand',
            'wohnadresse' => 'Wohnadresse',
            'telefonnummer' => 'Telefonnummer',
            'ort' => 'Ort',
            'plz' => 'Plz',
            'Abteilung_abt_bezeichnung' => 'Abteilung Abt Bezeichnung',
            'Eltern_e_id' => 'Eltern E ID',
            'istKlassensprecher' => 'Ist Klassensprecher',
            'Klasse_k_name' => 'Klasse K Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzergruppe0()
    {
        return $this->hasOne(Benutzergruppe::className(), ['bg_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFehlstundes()
    {
        return $this->hasMany(Fehlstunde::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrankmeldungs()
    {
        return $this->hasMany(Krankmeldung::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnterrichtsstundes()
    {
        return $this->hasMany(Unterrichtsstunde::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbteilungAbtBezeichnung()
    {
        return $this->hasOne(Abteilung::className(), ['abt_bezeichnung' => 'Abteilung_abt_bezeichnung']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzergruppe1()
    {
        return $this->hasOne(Benutzergruppe::className(), ['bg_id' => 'benutzergruppe']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElternE()
    {
        return $this->hasOne(Eltern::className(), ['e_id' => 'Eltern_e_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlasseKName()
    {
        return $this->hasOne(Klasse::className(), ['k_name' => 'Klasse_k_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzergruppe2()
    {
        return $this->hasOne(Benutzergruppe::className(), ['bg_id' => 'benutzergruppe']);
    }
	
	/**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
 
        return static::findOne([
            'password_reset_token' => $token,
            'status_id' => self::STATUS_ACTIVE,
        ]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }
 
        /**
        * @getId
        */
 
    public function getId()
    {
        return $this->getPrimaryKey();
    }
 
        /**
        * @getAuthKey
        */
 
    public function getAuthKey()
    {
        return $this->auth_key;
    }
 
        /**
        * @validateAuthKey
        */
 
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
 
        /**
        * Validates password
        *
        * @param string $password password to validate
        * @return boolean if password provided is valid for current user
        */
 
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
 
        /**
        * Generates password hash from password and sets it to the model
        *
        * @param string $password
        */
 
    public function setPassword($password)
    {
         $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
 
        /**
        * Generates "remember me" authentication key
        */
 
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
 
        /**
        * Generates new password reset token
        * broken into 2 lines to avoid wordwrapping
        */
 
 
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString()  . '_' . time();
    }
 
        /**
        * Removes password reset token
        */
 
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
        /**
        * get role relationship
        *
        */
	
	
}
?>