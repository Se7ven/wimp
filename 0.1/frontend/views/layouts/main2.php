<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
	<?php
		NavBar::begin([
			'brandLabel' => 'WhereIsMyParcel2',
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-inverse navbar-fixed-top',
			],
		]);
		$menuItems = [
			['label' => 'Главная', 'url' => ['/site/index']],
			['label' => 'Посылки', 'url' => ['/track/index']],
			['label' => 'О сервисе', 'url' => ['/site/about']],
			['label' => 'Обратная связь', 'url' => ['/site/contact']],
		];
		if (Yii::$app->user->isGuest) {
			$menuItems[] = ['label' => 'Зарегистрироваться', 'url' => ['/site/signup']];
			$menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
		} else {
			$menuItems[] = ['label' => 'Профиль' , 'url' => ['/profile/index']];
			$menuItems[] = ['label' => 'Выйти' , 'url' => ['/site/logout']];
		}
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => $menuItems,
		]);
		NavBar::end();
	?>

	<div class="container">
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>
	<?= Alert::widget() ?>
	<?= $content ?>
	</div>

	<footer class="footer">
		<div class="container">
		<p class="pull-left">&copy; Whereismyparcel <?= date('Y') ?></p>
		<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
