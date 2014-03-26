<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\apisearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="api-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'a_id') ?>

		<?= $form->field($model, 'u_id') ?>

		<?= $form->field($model, 'key') ?>

		<?= $form->field($model, 'type') ?>

		<?= $form->field($model, 'startdate') ?>

		<?php // echo $form->field($model, 'enddate') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
