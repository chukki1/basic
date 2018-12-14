<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReceiptNo */

$this->title = 'Create Receipt No';
$this->params['breadcrumbs'][] = ['label' => 'Receipt Nos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipt-no-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsReceipt'=>$modelsReceipt,
    ]) ?>

</div>
