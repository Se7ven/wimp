<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\TblTrack;
use frontend\models\TblTstatus;
use yii\web\BadRequestHttpException;
use yii\web\UnauthorizedHttpException;
use yii\web\NotFoundHttpException;
use yii\helpers\Security;

class TrackController extends \yii\web\Controller
{
	public function actionIndex()
	{
//		$model = TblTrack::find()->where('u_id = :u_id', [':u_id' => Yii::$app->getUser()->getId()])->all();
                $tracks = TblTrack::find()->where('u_id = :u_id', [':u_id' => Yii::$app->getUser()->getId()])->all();
                foreach ($tracks as $track) {
                    $count[$track->t_id] = TblTstatus::find()->where('t_id = :t_id', [':t_id' => $track->t_id])->count();
                }
                if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
                    if (!isset($count)) {
                        return $this->render('index',['tracks' => $tracks]); 
                        
                    } else {
                        return $this->render('index',['tracks' => $tracks, 'count' => $count]); 
                    }
		}
	}

	public function actionCreate()
	{
		$model = new TblTrack;
		$model->setScenario('create');
		if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
			if ($model->load($_POST) && $model->save()) {
					$this->redirect(['track/index']);
				} else { return $this->render('create', ['model' => $model]); }
		}	
	}	


	public function actionEdit($tid)
	{
		$model = TblTrack::find()->where('t_id = :t_id', [':t_id' => $tid])->one();
		$model->setScenario('edit');
		if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
			if ($model->load($_POST) && $model->save()) {
					$this->redirect(['track/index']);
				} else { return $this->render('edit', ['model' => $model]); }
		}	
	}	

	public function actionStatus($tid)
	{
		$model = TblTrack::find()->With('tblTstatuses')->where('t_id = :t_id', [':t_id' => $tid])->one();
		if ($model) {
                    $status = $model->tblTstatuses;
                } else {
                    throw new NotFoundHttpException(Yii::t('app','Track not found.'));
                }
		// $model->setScenario('edit');
		if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
                    if (Yii::$app->getUser()->getId() == $model->u_id) {
			return $this->render('status',['tstatuses' => $status, 'track' => $model]);
                    }	else {
                        throw new UnauthorizedHttpException(Yii::t('app','Track status not found.'));
                    }
                }
	}	

	public function actionDelete($tid)
	{
		$model = new TblTrack;
		// $model->setScenario('delete');
		if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
			if ($model->deleteAll('t_id = '.$tid)) {
					$this->redirect(['track/index']);
				} else { $this->redirect(['track/index']); }
		}	
	}
        
        public function actionDeleteconfirm($tid)
	{
                $track = TblTrack::find()->where('t_id = :t_id', [':t_id' => $tid])->one();
//                foreach ($tracks as $track) {
//                    $count[$track->t_id] = TblTstatus::find()->where('t_id = :t_id', [':t_id' => $track->t_id])->count();
//                }
                if (Yii::$app->getUser()->getIsGuest()) {
			Yii::$app->getUser()->loginRequired();
		} else {
                $this->layout = 'ajaxpopup';
                    return $this->render('deleteconfirm', ['track' => $track]);
		}
	}	

}
