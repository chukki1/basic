<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Product;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */
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
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    
    <div class="row">
    <div class="col-sm-3">
    <?= $form->field($model, 'Issued_date')->textInput() ?>
    </div>
    <div class="col-sm-3">
    <?= $form->field($model, 'Issued_Time')->textInput() ?>
    </div>
    <div class="col-sm-3">
    <?= $form->field($model, 'Issued_by')->textInput() ?>
    </div>
    <div class="col-sm-3">
    <?= $form->field($model, 'status')->textInput() ?>
</div>
</div>
   


   
   
   <div class="panel panel-default">
       <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>InvoiceProducts</h4></div>
      <div class="panel-body">
   
   
            <?php DynamicFormWidget::begin([
               'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
               'widgetBody' => '.container-items', // required: css class selector
               'widgetItem' => '.item', // required: css class
               'limit' => 30, // the maximum times, an element can be cloned (default 999)
               'min' => 1, // 0 or 1 (default 1)
               'insertButton' => '.add-item', // css class
               'deleteButton' => '.remove-item', // css class
               'model' => $modelsInvoiceProducts[0],
               'formId' => 'dynamic-form',
               'formFields' => [
                  
                  
               
                'Product_Id',
                'Quantity',
               // 'Product_Subcatagory_Id',
                //'Product_Subcatagory_main_category_Id',
                //'Product_Subcatagory_Product_Id',
                   
               ],
           ]); ?>
       
           <div class="container-items"><!-- widgetContainer -->
                   <?php foreach ($modelsInvoiceProducts as $i => $modelInvoiceProducts): ?>
               <div class="item panel panel-default"><!-- widgetBody -->
                   
                   
                       <?php
                           // necessary for update action.
                           if (! $modelInvoiceProducts->isNewRecord) {
                               echo Html::activeHiddenInput($modelInvoiceProducts, "[{$i}]id");
                           }
                       ?>
                        
                  
                          
                           
                   
                   <div class="row">
                   
                          
                               
                          
                           <div class="col-sm-2">
                               <?= $form->field($modelInvoiceProducts, "[{$i}]Product_Id")->textInput(['maxlength' => 64]) ?>
                           </div>
                           <div class="col-sm-2">
                               <?= $form->field($modelInvoiceProducts, "[{$i}]Product_Name")->textInput(['maxlength' => 64]) ?>
                           </div>
                          <div class="col-sm-2">
                               <?=  $form->field($modelInvoiceProducts, "[{$i}]Quantity")->textInput(['maxlength' => 64]) ?>
                           </div>
                           <div class="col-sm-2">
                               <?= $form->field($modelInvoiceProducts, "[{$i}]UnitPrice")->textInput(['maxlength' => 64]) ?>
                           </div>
                           <div class="col-sm-2">
                               <?= $form->field($modelInvoiceProducts, "[{$i}]TotalPrice")->textInput(['maxlength' => 64]) ?>
                           </div>
                           <div class="col-sm-2">
                               <?php // echo $form->field($modelInvoiceProducts, "[{$i}]Product_Subcatagory_Product_Id")->textInput(['maxlength' => 64]) ?>
                           </div>
                           <div class="col-sm-2">
                           <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                           <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                       </div>
                   </div><!-- .row -->
                   
                 </div>
                 
              
           <?php endforeach; ?>
          
           
               
           <?php DynamicFormWidget::end(); ?>
       </div>
 
       <div class="col-sm-2">
       
       </div>

</div>
   
</div> 
<div class="pull-right">                         
<form>
  Net Total:<br>
  <input type="text" name="Net_Total"><br>
 
</form>  
</div>   
         
                    
   <div class="form-group">
   
   
   <?= Html::submitButton($modelInvoiceProducts->isNewRecord ? 'Save' : 'Update', ['class' => 'btn btn-primary']) ?>
   </div>
  
    <?php ActiveForm::end(); ?>

</div>
