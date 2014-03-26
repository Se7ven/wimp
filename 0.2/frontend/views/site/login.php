<?php
// use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii\authclient\widgets\Choice;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */
$this->title = Yii::t('app', 'Login');
$menuItems[1] = ['label' => 'Выйти' , 'url' => ['/site/logout']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<p><?= Yii::t('app', 'Please fill out the following fields to login:') ?></p>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
				<?= $form->field($model, 'username') ?>
				<?= $form->field($model, 'password')->passwordInput() ?>
				<?= $form->field($model, 'rememberMe')->checkbox() ?>
				<div style="color:#999;margin:1em 0">
					If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
				</div>
				<div class="form-group">
					<?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
				</div>
			<?php ActiveForm::end(); ?>

			<?= yii\authclient\widgets\Choice::widget([
     			'baseAuthUrl' => ['profile/auth'],
			]) ?>

		</div>
	</div>
</div>
