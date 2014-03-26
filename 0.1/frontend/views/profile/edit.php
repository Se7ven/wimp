<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
/**
 * @var yii\web\View $this
 */
$this->title = 'Редактирование профиля';
$this->params['breadcrumbs'][] = ['label' => Yii::$app->user->identity->name.' '.Yii::$app->user->identity->lname, 'url' => ['profile/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
	<h1><?= Yii::$app->user->identity->name ?> <?= Yii::$app->user->identity->lname ?></h1>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'profile-form']); ?>
				<?= $form->field($user, 'name')->textInput(['value' => $user->name]) ?>
				<?= $form->field($user, 'lname')->textInput(['value' => $user->lname]) ?>
				<?= $form->field($user, 'phone')->textInput(['value' => $user->phone]) ?>
				<div class="form-group">
					<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>

</div>
