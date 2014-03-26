<?php

namespace app\models;

/**
 * This is the model class for table "tbl_userstatus".
 *
 * @property string $us_id
 * @property string $u_id
 * @property string $status
 * @property string $startdate
 * @property string $enddate
 *
 * @property TblUser $u
 */
class TblUserstatus extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_userstatus';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['u_id', 'startdate', 'enddate'], 'required'],
			[['u_id'], 'integer'],
			[['status'], 'string'],
			[['startdate', 'enddate'], 'safe']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'us_id' => 'Us ID',
			'u_id' => 'U ID',
			'status' => 'Status',
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
