<?php
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Планы работы по WhereIsMyParcell (кратко):</p>
	<ol>
	<li><strike>Авторизация</strike> </li>
	<li><strike>Работа с профилем пользователя</strike></li>
	<li>Работа с треками (добавление, удаление, редактирование)</li>
	<li>Работа со статусами треков (получение статуса трека по ID)</li>
	<li>API</li>
	<li>Авторизация через соцсети</li>
	<li>...</li>
	</ol>


</div>
