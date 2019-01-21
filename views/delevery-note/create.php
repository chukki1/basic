<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DeleveryNote */

$this->title = 'Create Delevery Note';
$this->params['breadcrumbs'][] = ['label' => 'Delevery Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delevery-note-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
