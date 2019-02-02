<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainCategory */

$this->title = 'Create Main Category';
$this->params['breadcrumbs'][] = ['label' => 'Main Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsSub'=>$modelsSub,
    ]) ?>

</div>
