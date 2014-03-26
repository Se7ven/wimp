<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use common\models\LoginForm;
use frontend\models\ProfileForm;
use frontend\models\TblUser;
use yii\web\UnauthorizedHttpException;
use yii\helpers\Security;

class ProfileController extends \yii\web\Controller
{
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
		];
	}
        
        private function getsnid($attributes, $authclient) {
            switch ($authclient) {
            case 'google': return $attributes['id'];
           	break;
            case 'facebook': return $attributes['id'];
           	break;
            case 'vkontakte': return $attributes['response'][0]['uid'];
           	break;
                }
        }
        
        private function getsnkey($authclient) {
            switch ($authclient) {
            case 'google': return 'ga_key';
           	break;
            case 'facebook': return 'fb_key';
           	break;
            case 'vkontakte': return 'vk_key';
           	break;
                }
        }
        
	public function successCallback($client)
        {
    	$attributes = $client->getUserAttributes();
    	$getq = Yii::$app->request->get('authclient');
    	$tbluser = TblUser::findIdentity(Yii::$app->getUser()->getId()); 
      // $tbluser->setScenario('update');
      // $tbluser->vk_key = $attributes['response'][0]['uid'];
      // $tbluser->vk_key = serialize($attributes);
      // $tbluser->save();
        
       	$user = new User();
        $sn_key = $this->getsnkey($getq);
        $sn_id = $this->getsnid($attributes, $getq);
        $current_user = $user::find([$sn_key => $sn_id]);
       	if (!Yii::$app->getUser()->getIsGuest()) {
          if ($current_user["id"] > 0) {
          	throw new UnauthorizedHttpException(Yii::t('app','User with this ID is already exist.'));
          } else {
                	      $tbluser->setScenario('update');
                                switch ($getq) {
                                case 'google': $tbluser->ga_key=$attributes['id'];
                                break;
                                case 'facebook': $tbluser->fb_key=$attributes['id'];
                                break;
                                case 'vkontakte': $tbluser->vk_key=$attributes['response'][0]['uid'];
                                break;
                }
                  $tbluser->save();
       	}
       		} else {
       			if ($current_user["id"] >  0) {
       				$user_login = new LoginForm();
              		$user_login->username = $current_user->username;
              		$user_login->rememberMe = 1;

              Yii::$app->user->login($user_login->getUser(), 3600*24*30);

       			}
       			else {
       				array_key_exists('email', $attributes) ? $email = $attributes['email'] : $email='1@1.com';
//  					$registr = new User();	
 					$user->setScenario('signup');
 					switch ($getq) {
						case 'google': $login=$attributes['id'];
						$user->ga_key = $login;
						break;
						case 'facebook': $login=$attributes['id'];
						$user->fb_key = $login;
						break;
						case 'vkontakte': $login=$attributes['response'][0]['uid'];
						$user->vk_key = $login;
						break;
					}
					$user->username = $login;
					$user->email = $email;
					$user->password = Security::generateRandomKey();
       				if ($user->save()) {
                                    Yii::$app->getUser()->login($user, 3600*24*30); 
				}
       			}
       		}
       	
    }

	public function actionIndex()
	{
		

		if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
		$model = TblUser::findIdentity(Yii::$app->getUser()->getId());
//		$this->layout='main3';
		return $this->render('index', ['user'=>$model]);
		}
	}
	
	public function actionDeletesn($sn)
	{
		if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
		$model = TblUser::findIdentity(Yii::$app->getUser()->getId());
		$model->setScenario('update');
		switch ($sn) {
			case 'google': $model->ga_key = '';
			break;
			case 'facebook': $model->fb_key = '';
			break;
			case 'vkontakte': $model->vk_key = '';
			break;
		}
		if ($model->save()) {
			$this->redirect(['profile/index']);
		}
	}
		

	}
	
	public function actionEdit()
	{
		$model = TblUser::findIdentity(Yii::$app->getUser()->getId());
		$model->setScenario('update');
		if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
			if ($model->load($_POST) && $model->save()) {
					$this->redirect(['profile/index']);
				} else { return $this->render('edit', ['user' => $model]); }
		}	
	}	

}
