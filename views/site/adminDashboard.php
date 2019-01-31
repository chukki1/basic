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

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 30%;
  padding: 15px;
  height: 250px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
body {
  padding:3px 0px 10px 10px;
    height: 100%;
}
</style>
</head>
<body>



<div class="row">
  <div class="column" style="background-color:blue;">
  
    <div class="card bg-light">
      <div class="card-body text-center">
		<i class="fa fa-book" style="font-size:60px;color:black"></i>
		<p class="card-text"><h2><b>Sales Report</b></h2></p>
        <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/site/sales-report'], ['class'=>'small-box-footer']) ?>
      </div>
      
  </div>
</div>
  <div class="column" style="background-color:pink;">
  <div class="card bg-light">
      <div class="card-body text-center">
	  <i class="fa fa-user-plus" style="font-size:60px;color:black"></i>
		<p class="card-text"><h2><b>Add Customers</b></h2></p>
        <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/customer/index'], ['class'=>'small-box-footer']) ?>
      </div>
    </div>

  </div>
  <div class="column" style="background-color:yellow;">
    <div class="card bg-light">
      <div class="card-body text-center">
		<i class="fa fa-shopping-cart" style="font-size:60px;color:black"></i>
		<p class="card-text"><h2><b>Shipment</b></h2></p>
        <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/shipment/index'], ['class'=>'small-box-footer']) ?>
      </div>
    </div>
  </div>
  
</div>
<br>
<div class="row">
  <div class="column" style="background-color:green;">
   <div class="card bg-light">
      <div class="card-body text-center">
		<i class="fa fa-address-card" style="font-size:60px;color:black"></i>
		<p class="card-text"><h2><b>User Manegement</b></h2></p>
    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/add-user/index'], ['class'=>'small-box-footer']) ?>
      </div>
    </div>  
</div>
  <div class="column" style="background-color:purple;">
  <div class="card bg-light">
      <div class="card-body text-center">
		<i class="fa fa-gift" style="font-size:60px;color:black"></i>
		<p class="card-text"><h2><b>Inventoty</b></h2></p>
    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/product/index'], ['class'=>'small-box-footer']) ?>
      </div>
    </div>

  </div>
  <div class="column" style="background-color:red;">
   <div class="card bg-light">
      <div class="card-body text-center">
		<i class="fa fa-envelope-open" style="font-size:60px;color:black"></i>
		<p class="card-text"><h2><b>Delivery Note</b></h2></p>
    <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/delevery-note/index'], ['class'=>'small-box-footer']) ?>
      </div>
    </div>
  </div>
  
</div>
</body>
</html>
