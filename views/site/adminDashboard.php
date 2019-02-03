<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
$this->title = 'adminDashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 20px -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  color: navy;
  
}
</style>
</head>
<body>

<div class="row">

  <div class="column">
    <div class="card bg-light" style="background-color:violet">
      <i class="fa fa-book" style="font-size:60px;color:black"></i>
      <p class="card-text"><h2><b>Sales Report</b></h2></p>
      <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/site/sales-report'], ['class'=>'small-box-footer']) ?>
    </div>
  </div>


  <div class="column">
    <div class="card bg-light" style="background-color:springGreen">
      <i class="fa fa-user-plus" style="font-size:60px;color:black"></i>
      <p class="card-text"><h2><b>Add Customer</b></h2></p>
      <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/customer/index'], ['class'=>'small-box-footer']) ?>
    </div>
  </div>
  
  <div class="column">
    <div class="card bg-light" style="background-color:Tomato">
      <i class="fa fa-shopping-cart" style="font-size:60px;color:black"></i>
      <p class="card-text"><h2><b>Shipment</b></h2></p>
      <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/shipment/index'], ['class'=>'small-box-footer']) ?>
    </div>
  </div>
  
  <div class="column">
    <div class="card bg-light" style="background-color:teal">
      <i class="fa fa-address-card" style="font-size:60px;color:black"></i>
      <p class="card-text"><h2><b>User Management</b></h2></p>
      <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/add-user/index'], ['class'=>'small-box-footer']) ?>
    </div>
  </div>
</div>

<div class="row">
<div class="column">
    <div class="card bg-light" style="background-color:goldenrod">
      <i class="fa fa-gift" style="font-size:60px;color:black"></i>
      <p class="card-text"><h2><b>Add Item</b></h2></p>
      <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/add-user/index'], ['class'=>'small-box-footer']) ?>
    </div>
  </div>

  <div class="column">
    <div class="card bg-light" style="background-color:silver">
      <i class="fa fa-envelope-open" style="font-size:60px;color:black"></i>
      <p class="card-text"><h2><b>Delivery Note</b></h2></p>
      <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['delevery-note/index'], ['class'=>'small-box-footer']) ?>
    </div>
  </div>
  
  <div class="column">
    <div class="card bg-light" style="background-color:skyblue">
      <i class="fa fa-envelope-open" style="font-size:60px;color:black"></i>
      <p class="card-text"><h2><b>Delivery Note</b></h2></p>
      <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['delevery-note/index'], ['class'=>'small-box-footer']) ?>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Card 4</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
</div>

</body>
</html>
