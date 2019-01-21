<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Administrator */

$this->title = 'Update Administrator: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Administrators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'Id' => $model->Id, 'User_type_Id' => $model->User_type_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="administrator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
