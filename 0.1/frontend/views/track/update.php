<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TblTrack $model
 */

$this->title = 'Update Tbl Track: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tracks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->t_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-track-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
