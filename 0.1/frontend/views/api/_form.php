<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\api $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="api-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'u_id')->textInput(['maxlength' => 20]) ?>

		<?= $form->field($model, 'key')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'startdate')->textInput() ?>

		<?= $form->field($model, 'enddate')->textInput() ?>

		<?= $form->field($model, 'type')->textInput(['maxlength' => 45]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
