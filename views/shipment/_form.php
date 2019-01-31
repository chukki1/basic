<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Discription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Suplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Administrator_Id')->textInput() ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <?= $form->field($model, 'Time')->textInput() ?>

    <?= $form->field($model, 'Item_Id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
