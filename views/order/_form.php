<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mdm\widgets\GridInput;
use app\models\OrderItem;
/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="forms">
    <?=
     Html :: submitButton ( $model -> isNewRecord ? ' Create ' : ' Update ' , [ ' class ' => $model -> isNewRecord ? ' Btn btn -success '   
                    : ' btn btn-primary ' ])
        ?>
    </div>
    <div class = "forms" >
        <?=
        GridInput::widget ([
           
            'allModels'=> $model->orderItems,
            ' model '  =>  OrderItem :: className (),
            ' form '  =>  $form ,
            ' columns '  => [
                [' class '=>' mdm\widgets\SerialColumn ' ],
                ' product ' ,
                ' qty ' ,
                [' class '=>' mdm \ widgets \ButtonColumn ' ]
            ],
            ' hiddens ' => [
                ' id '
            ]
        ])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
