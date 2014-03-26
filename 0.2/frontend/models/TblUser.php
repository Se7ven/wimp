<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tbl_user".
 *
 * @property string $u_id
 * @property string $username
 * @property integer $status
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $name
 * @property string $lname
 * @property string $email
 * @property string $phone
 * @property string $create_time
 * @property string $update_time
 * @property string $balance
 * @property string $currency
 * @property string $ga_key
 * @property string $vk_key
 * @property string $fb_key

 * @property TblApi[] $tblApis
 * @property TblBilling[] $tblBillings
 * @property TblTrack[] $tblTracks
 * @property TblUserstatus[] $tblUserstatuses
 */
class TblUser extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['status'], 'integer'],
			[['auth_key', 'password_reset_token', 'email', 'create_time', 'update_time', 'currency'], 'required'],
			[['create_time', 'update_time'], 'safe'],
			[['balance'], 'number'],
			[['username', 'name', 'lname', 'email', 'phone', 'currency'], 'string', 'max' => 45],
			[['password_hash', 'auth_key', 'password_reset_token'], 'string', 'max' => 255]
		];
	}

	public function scenarios()
	{
		return [
			'update' => ['name', 'lname', 'phone'],
		];
	}



	public static function findIdentity($u_id)
	{
		return static::find($u_id);
	}
	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return null|User
	 */
	public static function findByUsername($username)
	{
		// return static::find(['username' => $username, 'status' => static::STATUS_ACTIVE]);
	}

	/**
	 * @return int|string current user ID
	 */
	public function getId()
	{
		return $this->u_id;
	}
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'u_id' => 'U ID',
			'username' => 'Username',
			'status' => 'Status',
			'password_hash' => 'Password Hash',
			'auth_key' => 'Auth Key',
			'password_reset_token' => 'Password Reset Token',
			'name' => 'Имя',
			'lname' => 'Фамилия',
			'email' => 'Email',
			'phone' => 'Телефон',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'balance' => 'Balance',
			'currency' => 'Currency',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTblApis()
	{
		return $this->hasMany(TblApi::className(), ['u_id' => 'u_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTblBillings()
	{
		return $this->hasMany(TblBilling::className(), ['u_id' => 'u_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTblTracks()
	{
		return $this->hasMany(TblTrack::className(), ['u_id' => 'u_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTblUserstatuses()
	{
		return $this->hasMany(TblUserstatus::className(), ['u_id' => 'u_id']);
	}
	
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			return true;
		}
		return false;
	}
}
