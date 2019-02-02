<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subcatagory */

$this->title = 'Update Subcatagory: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Subcatagories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'Id' => $model->Id, 'main_category_Id' => $model->main_category_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcatagory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
