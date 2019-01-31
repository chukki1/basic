<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DeleveryNote */

$this->title = 'Update Delevery Note: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Delevery Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'Id' => $model->Id, 'Administrator_Id' => $model->Administrator_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delevery-note-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
