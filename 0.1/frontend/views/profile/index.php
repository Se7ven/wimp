<?php

use yii\helpers\Html;
use yii\authclient\widgets\Choice;
/**
 * @var yii\web\View $this
 */
$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
// $this->layout = 'main';
?>

<div class="site-index">
	<div class="row">
	<h1>Профиль пользователя <?= Yii::$app->user->identity->name ?> <?= Yii::$app->user->identity->lname ?></h1>
		<div class="col-xs-2">
			<p><strong>Имя</strong></p>
			<p><strong>Фамилия</strong></p>
			<p><strong>Email</strong></p>
			<p><strong>Телефон</strong></p>
			<p><strong>&nbsp;</strong></p>

			
		</div>
		<div class="col-xs-5">
			<p><?= $user->name ?>&nbsp;</p>	
			<p><?= $user->lname ?>&nbsp;</p>
			<p><?= $user->email ?>&nbsp;</p>
			<p><?= $user->phone ?>&nbsp;</p>
			<p><strong>&nbsp;</strong></p>
		</div>
        </div>
	<div class="row">
		 <?php $authChoice = Choice::begin([
     		'baseAuthUrl' => ['profile/auth']
 			]); 
 			$clients = $authChoice->getClients();
 			?>
 			<p><strong>Социальные сети</strong></p>
 			
		<div class="col-xs-2">
			
			<p><span class="auth-icon google"></span></p>
			<p><span class="auth-icon vkontakte"></p>
			<p><span class="auth-icon facebook"></p>
		</div>
		<div class="col-xs-5">
			
			<p class="auth-icon">&nbsp;<?= $user->ga_key ? ($user->ga_key==$user->username ? 'Удалить&nbsp;привязку' : Html::a('Удалить&nbsp;привязку', ['profile/deletesn?sn=google']))  : $authChoice->clientLink($clients['google'], "Привязать"); ?></p>
			<p class="auth-icon">&nbsp;<?= $user->vk_key ? ($user->vk_key==$user->username ? 'Удалить&nbsp;привязку' : Html::a('Удалить&nbsp;привязку', ['profile/deletesn?sn=vkontakte']))  : $authChoice->clientLink($clients['vkontakte'], "Привязать"); ?></p>
			<p class="auth-icon">&nbsp;<?= $user->fb_key ? ($user->fb_key==$user->username ? 'Удалить&nbsp;привязку' : Html::a('Удалить&nbsp;привязку', ['profile/deletesn?sn=facebook'])) : $authChoice->clientLink($clients['facebook'], "Привязать"); ?></p>
		
		</div>
		<?php //Choice::end(); ?>
	</div>
		

<a class="btn btn-default"  href="<?= Yii::$app->urlManager->createAbsoluteUrl('profile/edit') ?>">Редактировать профиль</a>

</div>
