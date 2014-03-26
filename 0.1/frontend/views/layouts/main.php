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
			'brandLabel' => 'WhereIsMyParcel',
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-inverse navbar-fixed-top',
			],
		]);
		
                $menuItems = [
			['label' => 'Главная', 'url' => ['/site/index']]];
                if (!Yii::$app->user->isGuest) {
      
			$menuItems[] = ['label' => 'Посылки', 'url' => ['/track/index'],
			'items' =>[
                            ['label'=>'Список', 'url' => ['/track/index']],
                            ['label'=>'Добавить', 'url' => ['/track/create']]
                        ]];
                }
			$menuItems[] = ['label' => 'О сервисе', 'url' => ['/site/about']];
			$menuItems[] = ['label' => 'Обратная связь', 'url' => ['/site/contact']];
		if (Yii::$app->user->isGuest) {
			$menuItems[] = ['label' => 'Зарегистрироваться', 'url' => ['/site/signup']];
			$menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
		} else {
			$menuItems[] = ['label' => 'Профиль (' . Yii::$app->user->identity->username .')' , 'url' => ['/profile/index']];
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
