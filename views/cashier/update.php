<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cashier */

$this->title = 'Update Cashier: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Cashiers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'Id' => $model->Id, 'User_type_Id' => $model->User_type_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cashier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
