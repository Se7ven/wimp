<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblTrack;

/**
 * TrackSearch represents the model behind the search form about TblTrack.
 */
class TrackSearch extends Model
{
	public $t_id;
	public $u_id;
	public $tnumber;
	public $name;
	public $departure;
	public $arrival;
	public $status;

	public function rules()
	{
		return [
			[['t_id', 'u_id', 'departure', 'arrival'], 'integer'],
			[['tnumber', 'name', 'status'], 'safe'],
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

	public function search($params)
	{
		$query = TblTrack::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'tnumber');
		$this->addCondition($query, 'tnumber', true);
		$this->addCondition($query, 'name');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'status');
		$this->addCondition($query, 'status', true);
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
