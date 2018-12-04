<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use unclead\multipleinput\MultipleInput;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<?= $form->field($model, 'products')->widget(MultipleInput::className(), [
    'max' => 10,
    'cloneButton' => true,
    'columns' => [
        [
            'name'  => 'product_id',
            'type'  => 'dropDownList',
            'title' => 'Special Products',
            'defaultValue' => 1,
            'items' => [
                1 => 'id: 1, price: $19.99, title: product1',
                2 => 'id: 2, price: $29.99, title: product2',
                3 => 'id: 3, price: $39.99, title: product3',
                4 => 'id: 4, price: $49.99, title: product4',
                5 => 'id: 5, price: $59.99, title: product5',
            ],
        ],
        [
            'name'  => 'time',
            'type'  => DateTimePicker::className(),
            'title' => 'due date',
            'defaultValue' => date('d-m-Y h:i')
        ],
        [
            'name'  => 'count',
            'title' => 'Count',
            'defaultValue' => 1,
            'enableError' => true,
            'options' => [
                'type' => 'number',
                'class' => 'input-priority',
            ]
        ]
    ]
])->label(false);
?>