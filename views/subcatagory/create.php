<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subcatagory */

$this->title = 'Create Subcatagory';
$this->params['breadcrumbs'][] = ['label' => 'Subcatagories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcatagory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
