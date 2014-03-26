<?php

namespace app\models;

/**
 * This is the model class for table "tbl_tapi".
 *
 * @property integer $ta_id
 * @property string $name
 * @property string $url
 * @property string $url_format
 * @property string $protocol
 *
 * @property TblTrack[] $tblTracks
 * @property TblTrack[] $tblTracks0
 * @property TblTrack[] $tblTracks1
 */
class TblTapi extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_tapi';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'url', 'url_format', 'protocol'], 'required'],
			[['url_format', 'protocol'], 'string'],
			[['name'], 'string', 'max' => 5],
			[['url'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'ta_id' => 'Ta ID',
			'name' => 'Name',
			'url' => 'Url',
			'url_format' => 'Url Format',
			'protocol' => 'Protocol',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTblTracks()
	{
		return $this->hasMany(TblTrack::className(), ['departure' => 'ta_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTblTracks0()
	{
		return $this->hasMany(TblTrack::className(), ['departure' => 'ta_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTblTracks1()
	{
		return $this->hasMany(TblTrack::className(), ['arrival' => 'ta_id']);
	}
}
