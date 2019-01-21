<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DeleveryNoteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delevery-note-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Created_date') ?>

    <?= $form->field($model, 'Discription') ?>

    <?= $form->field($model, 'Customer_Id') ?>

    <?= $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Administrator_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
