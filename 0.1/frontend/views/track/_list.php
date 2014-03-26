<?php
use yii\helpers\Html;
$st = $status=='vip' ? 'panel-warning' : 'panel-primary';
$st = $status=='arrived' ? 'panel-success' : $st;
?>

<div class="panel <?php echo $st; ?>">
    <div class="panel-heading">
        <a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('track/status', ['tid'=>$tid]) ?>"><h4><?= Html::encode($name) ?></h4></a>
    </div>
    <div class="list-group-item ">
                <span class="badge"><a href="#" class="active"><?= Html::encode($count) ?></a></span>
                <p><?= Html::encode($tnumber) ?></p>
                <a class="btn btn-success btn-xs" href="#">Получено</a>
                <a class="btn btn-primary btn-xs" href="<?= Yii::$app->urlManager->createAbsoluteUrl('track/edit', ['tid'=>$tid])?>">Редактировать</a>
                <a class="btn btn-danger btn-xs" href="<?= Yii::$app->urlManager->createAbsoluteUrl('track/delete', ['tid'=>$tid])?>">Удалить</a>
                
     </div>
</div>



