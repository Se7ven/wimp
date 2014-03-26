<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\TblTrack $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="tbl-track-form">

	<?php $form = ActiveForm::begin(); ?>


		<?= $form->field($model, 'tnumber')->textInput(['maxlength' => 45]) ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
