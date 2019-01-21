<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'NIC') ?>

    <?php // echo $form->field($model, 'Reemed_points') ?>

    <?php // echo $form->field($model, 'Earned-point') ?>

    <?php // echo $form->field($model, 'Point_balance') ?>

    <?php // echo $form->field($model, 'Mobile_No') ?>

    <?php // echo $form->field($model, 'User_type_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
