<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AddUser */

$this->title = 'Create Add User';
$this->params['breadcrumbs'][] = ['label' => 'Add Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
