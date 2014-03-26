<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
/**
 * This is the model class for table "tbl_tstatus".
 *
 * @property string $s_id
 * @property string $t_id
 * @property string $text
 * @property string $place
 * @property string $pcode
 * @property string $date
 *
 * @property TblTrack $t
 */
class TblTstatus extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_tstatus';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['t_id', 'place', 'pcode'], 'required'],
			[['t_id'], 'integer'],
			[['text', 'place'], 'string'],
			[['date'], 'safe'],
			[['pcode'], 'string', 'max' => 10]
		];
	}
	
        public function scenarios()
	{
		return [
			'create' => ['text', 'date'],
//			'edit' => ['tnumber', 'name'],
		];
	}
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			's_id' => 'S ID',
			't_id' => 'T ID',
			'text' => 'Text',
			'place' => 'Place',
			'pcode' => 'Pcode',
			'date' => 'Date',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getT()
	{
		return $this->hasOne(TblTrack::className(), ['t_id' => 't_id']);
	}
}
