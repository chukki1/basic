<?php 
use app\assets\AppAsset;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.sidebar{
  background-color:	#DCDCDC;
   padding:10px 40px 10px 20px;
   
}
body {
  padding:3px 0px 10px 10px;
    height: 700px;
}
</style>
</head>
<body>
<div class=row>
  <div class=col-sm-2>
  <aside class="main-sidebar">

  
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
       <li><a href="http://http://localhost/basic/web/index.php?r=site%2Flogin"><i class="fa fa-home"></i> <span>Home</span></a></li>
        
        <li class="treeview">
          <a href="http://localhost/basic/web/index.php?r=customer">
            <i class="fa fa-book"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/basic/web/customer"><i class="fa fa-circle-o">Sales Reports</i></a></li>
            <li><a href="http://localhost/basic/web/customer"><i class="fa fa-circle-o">Inventory Reports</i></a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="http://localhost/basic/web/customer">
            <i class="fa fa-pie-chart"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-setting"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/basic/web/index.php?r=products"><i class="fa fa-circle-o"> All products</i></a></li>
            <li><a href="http://localhost/basic/web/index.php?r=customer"><i class="fa fa-circle-o"> Categories</i></a>
               
            </li>
          </ul>
        </li>

        
        <li><a href="https://adminlte.io/docs"><i class="fa fa-user"></i> <span>Users</span></a></li>


        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  
</aside>

</div>
</div>
</body>

</html> 
