<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\TrackSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-track-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 't_id') ?>

		<?= $form->field($model, 'u_id') ?>

		<?= $form->field($model, 'tnumber') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'departure') ?>

		<?php // echo $form->field($model, 'arrival') ?>

		<?php // echo $form->field($model, 'status') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
