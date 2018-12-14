<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\ReceiptNo */
/* @var $form yii\widgets\ActiveForm */
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
}); 
';

$this->registerJs($js);
?>
<?php
/* start getting the totalamount */
$script = <<<EOD
    var getAmount = function() {

        // var items = $(".item");
        // var qnty = $(elem).find(".qnty").val();
        var qnty = $(".qnty").val();
        var price = $(".price").val();
        // var price = $(elem).find(".price").val();
        var amount = 0;

        amount = parseInt(qnty) * parseInt(price);

        // items.each(function (index, elem) {
        //     var priceValue = $(elem).find(".sumPart").val();
        //     //Check if priceValue is numeric or something like that
        //     sum = parseInt(sum) + parseInt(priceValue);
        // });
        //Assign the sum value to the field
        $(".amount").val(amount);
    };

    //Bind new elements to support the function too
    $(".price").on("change", function() {
        getAmount();
    });
EOD;
$this->registerJs($script);
/*end getting the totalamount */
?>

<div class="receipt-no-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'receipt_no')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>
    <div class="row">
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Receipt</h4></div>
       <div class="panel-body">
    
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsReceipt[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                   
                    'product_it_no',
                    'Product_Name',
                    'Price',
                    'Quantity',
                    'Discount',
                    'Total_Discount',
                    'Total',
                    
                ],
            ]); ?>
        
            <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsReceipt as $i => $modelReceipt): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Receipt</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelReceipt->isNewRecord) {
                                echo Html::activeHiddenInput($modelsReceipt, "[{$i}]id");
                            }
                        ?>
                         
                   
                           
                            
                    </div><!-- .row -->
                    <div class="row">
                    <div class="col-sm-2">
                                <?= $form->field($modelReceipt, "[{$i}]Product_Name")->textInput(['maxlength' => 64]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelReceipt, "[{$i}]Price")->textInput(['maxlength' => 64]) ?>
                            </div>
                           <div class="col-sm-2">
                                <?= $form->field($modelReceipt, "[{$i}]Quantity")->textInput(['maxlength' => 64]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelReceipt, "[{$i}]Discount")->textInput(['maxlength' => 64]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelReceipt, "[{$i}]Total_Discount")->textInput(['maxlength' => 64]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelReceipt, "[{$i}]Total")->textInput(['maxlength' => 64]) ?>
                            </div>
                    </div><!-- .row -->
                  </div>
               </div>
            <?php endforeach; ?>
            </div><!-- .panel -->
            
               
            <?php DynamicFormWidget::end(); ?>
        </div>
  
   

</div>
    
</div>

    <div class="form-group">
   
    
    <?= Html::submitButton($modelReceipt->isNewRecord ? 'Save' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>


</div>