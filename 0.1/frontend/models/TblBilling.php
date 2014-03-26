<?php

namespace app\models;

/**
 * This is the model class for table "tbl_billing".
 *
 * @property string $b_id
 * @property string $u_id
 * @property string $balance
 * @property string $date
 * @property string $system
 * @property string $currency
 *
 * @property TblUser $u
 */
class TblBilling extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_billing';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['u_id', 'balance', 'date', 'system', 'currency'], 'required'],
			[['u_id'], 'integer'],
			[['balance'], 'number'],
			[['date'], 'safe'],
			[['system'], 'string', 'max' => 255],
			[['currency'], 'string', 'max' => 5]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'b_id' => 'B ID',
			'u_id' => 'U ID',
			'balance' => 'Balance',
			'date' => 'Date',
			'system' => 'System',
			'currency' => 'Currency',
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
