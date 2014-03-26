<?php
$rootDir = __DIR__ . '/../..';

$params = array_merge(
	require($rootDir . '/common/config/params.php'),
	require($rootDir . '/common/config/params-local.php'),
	require(__DIR__ . '/params.php'),
	require(__DIR__ . '/params-local.php')
);

return [
	'id' => 'app-frontend',
	'basePath' => dirname(__DIR__),
	'language' => 'ru-RU',
	'vendorPath' => $rootDir . '/vendor',
	'controllerNamespace' => 'frontend\controllers',
	'modules' => [
		'gii' => 'yii\gii\Module'
	],
	'extensions' => require($rootDir . '/vendor/yiisoft/extensions.php'),
	'components' => [
	'i18n' => [
		'translations' => [
			'app*' => [
				'class' => 'yii\i18n\PhpMessageSource',
				'basePath' => '@app/messages',
				'sourceLanguage' => 'en',
				'fileMap' => [
					'app' => 'app.php',
					'app/error' => 'error.php',
					'social' => 'social.php',
				],
			],
		],
	],

    	  'urlManager' => [
    	  'enablePrettyUrl' => true,
 	      'rules' => [
                  'track/status/<tid:\d+>' => 'track/status'
                    // your rules go here
      		],
      		// ...
 	 	],
	'db' => $params['components.db'],
	'cache' => $params['components.cache'],
	'mail' => $params['components.mail'],
	'user' => [
		'identityClass' => 'common\models\User',
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
	],
	'params' => $params,
];
