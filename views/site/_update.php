<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Products */


?>
<div class="site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDetails' => $modelDetails,
    ]) ?>

</div>
