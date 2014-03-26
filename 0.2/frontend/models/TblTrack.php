<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
use frontend\models\TblTstatus;

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
 * @property TblUser $u
 * @property TblTapi $departure
 * @property TblTapi $departure0
 * @property TblTapi $arrival
 * @property TblTstatus[] $tblTstatuses
 */
class TblTrack extends ActiveRecord
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

	public function scenarios()
	{
		return [
			'create' => ['tnumber', 'name'],
			'edit' => ['tnumber', 'name'],
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
			'tnumber' => 'Номер трека',
			'name' => 'Название',
			'departure' => 'Departure',
			'arrival' => 'Arrival',
			'status' => 'Status',
		];
	}
	
	public function beforeSave($insert)
	{
		if ($this->isNewRecord){
			$this->u_id=Yii::$app->getUser()->getId();
			$this->departure=1;
			$this->arrival=1;
		}
		return parent::beforeSave($insert);
	}
        
        public function afterSave($insert)
	{
               if ($this->getScenario() === 'create') {
               $status = new TblTstatus;
               $status->setScenario('create');
               $status->t_id = $this->t_id;
               $status->text = 'Запись создана';
               $status->date = date('Y-m-d H:i:s');
               $status->save();
               }
                return parent::afterSave($insert);
	}
	
	public static function findId($t_id)
	{
		return static::find($t_id);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getU()
	{
		return $this->hasOne(TblUser::className(), ['u_id' => 'u_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDeparture()
	{
		return $this->hasOne(TblTapi::className(), ['ta_id' => 'departure']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDeparture0()
	{
		return $this->hasOne(TblTapi::className(), ['ta_id' => 'departure']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getArrival()
	{
		return $this->hasOne(TblTapi::className(), ['ta_id' => 'arrival']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTblTstatuses()
	{
		return $this->hasMany(TblTstatus::className(), ['t_id' => 't_id']);
	}
	

}
