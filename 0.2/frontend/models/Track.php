<?php

namespace app\models;

/**
 * This is the model class for table "tbl_track".
 *
 * @property string $t_id
 * @property string $u_id
 * @property string $tnumber
 * @property string $name
 * @property integer $departure
 * @property integer $arrival
 * @property string $status
 *
 * @property User $u
 * @property Tapi $departure
 * @property Tapi $departure0
 * @property Tapi $arrival
 * @property Tstatus[] $tstatuses
 */
class Track extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_track';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['u_id', 'tnumber', 'name', 'departure', 'arrival'], 'required'],
			[['u_id', 'departure', 'arrival'], 'integer'],
			[['status'], 'string'],
			[['tnumber'], 'string', 'max' => 45],
			[['name'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			't_id' => 'T ID',
			'u_id' => 'U ID',
			'tnumber' => 'Tnumber',
			'name' => 'Name',
			'departure' => 'Departure',
			'arrival' => 'Arrival',
			'status' => 'Status',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getU()
	{
		return $this->hasOne(User::className(), ['u_id' => 'u_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDeparture()
	{
		return $this->hasOne(Tapi::className(), ['ta_id' => 'departure']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDeparture0()
	{
		return $this->hasOne(Tapi::className(), ['ta_id' => 'departure']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getArrival()
	{
		return $this->hasOne(Tapi::className(), ['ta_id' => 'arrival']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTstatuses()
	{
		return $this->hasMany(Tstatus::className(), ['t_id' => 't_id']);
	}
}
