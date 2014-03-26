<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TblTrack $model
 */

$this->title = "Редактирование трека $model->tnumber";
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tracks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-track-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
