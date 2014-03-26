<?php
/**
 * @var yii\web\View $this
 */
$this->title = "Статус трека $track->tnumber";
$this->params['breadcrumbs'][] = ['label'=>'Список отслеживаемых треков', 'url' => ['track/index']];
$this->params['breadcrumbs'][] = $track->tnumber;
?>
<div class="panel panel-info">
<div class="panel-heading">
<h3>Статуст трека <?= $track->tnumber ?></h3>
</div>
<div class="panel-body">
    <div class="bs-example">
       <div class="list-group">
    <?php
    foreach ($tstatuses as $tstatus) {
        echo $this->render('_status', [
        	'tid' => $tstatus->t_id,
            // 'tnumber' => $tstatus->tnumber,
            'text' => $tstatus->text,
            'place' => $tstatus->place,
            'pcode' => $tstatus->pcode,
            'date' => $tstatus->date,
        ]);
    }
    ?>
       </div>
    </div>
</div>
</div>
   <a class="btn btn-default"  href="<?= Yii::$app->urlManager->createAbsoluteUrl('track/create') ?>">Добавить трек</a>
</p>
