<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'Список отслеживаемых треков';
$this->params['breadcrumbs'][] = $this->title;
?>

<h2>Список отслеживаемых треков</h2>

<p>
    <?php
    foreach ($tracks as $track) {
        echo $this->render('_list', [
            'tid' => $track->t_id,
            'tnumber' => $track->tnumber,
            'name' => $track->name,
            'departure' => $track->name,
            'count' => $count[$track->t_id],
            'status' => $track->status,
        ]);
    }
    ?>

   <a class="btn btn-default"  href="<?= Yii::$app->urlManager->createAbsoluteUrl(['track/create']) ?>">Добавить трек</a>
</p>
