<?php

namespace app\models;

/**
 * This is the model class for table "tbl_api".
 *
 * @property string $a_id
 * @property string $u_id
 * @property string $key
 * @property string $type
 * @property string $startdate
 * @property string $enddate
 *
 * @property TblUser $u
 */
class TblApi extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_api';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['u_id', 'key', 'startdate', 'enddate'], 'required'],
			[['u_id'], 'integer'],
			[['startdate', 'enddate'], 'safe'],
			[['key'], 'string', 'max' => 255],
			[['type'], 'string', 'max' => 45]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'a_id' => 'A ID',
			'u_id' => 'U ID',
			'key' => 'Key',
			'type' => 'Type',
			'startdate' => 'Startdate',
			'enddate' => 'Enddate',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getU()
	{
		return $this->hasOne(TblUser::className(), ['u_id' => 'u_id']);
	}
}
