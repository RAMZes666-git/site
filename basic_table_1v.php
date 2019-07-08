<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>

  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a  class="logo">Estimation of the cost of the life cycle of the machine</a>
      <!--logo end-->
      
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          

          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Tables</span>
              </a>
            <ul class="sub">
              <li class="active">
                  <a href="basic_table_1v.php">Basic Table</a></li>
                <li><a href="view_tableCmch.php">Информация о машинах</a></li>

              
             
            </ul>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
            <ul class="sub">
              <li>
                <a href="morris.php">стандарт</a>
              </li>
              <li>
                <a href="chartjs.php">стандарт(суммарный)</a>
              </li>
              <li>
                <a href="flot_chart.html">капитальный(стандарт)</a>
              </li>
              <li>
                <a href="xchart.php">капитальный(суммарный)</a>
              </li>
                <li><a href="gydro.php">гидро(стандарт)</a></li>
                <li><a href="gydroSum.php">гидро(суммарный)</a></li>
                <li><a href="FirstStage.php">моделиров по 1 КР</a></li>
            </ul>
          </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-money"></i>
                    <span>Расчёт СМЧ</span>
                </a>
                <ul class="sub">
                    <li><a href="CalcDBsite.php">Расчёт</a></li>
                    <li><a href="DbsiteCode.php">Калькулятор</a></li>

                </ul>
            </li>
         
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
        <div class="row">
          
          <div class="col-md-12 mt">
            <div class="content-panel">
              <table class="table table-hover">
                <h4><i class="fa fa-angle-right"></i> Этапы </h4>
                <hr>
                <thead>
			
                  <tr>
                    <th>этап</th>
                    <th>Кти_A1</th>
                    <th>Кти_A2</th>
                    <th>Кп_A1</th>
					<th>Кп_A2</th>
					<th>Кс_A1</th>
					<th>Кс_A2</th>
					<th>Смч_A1</th>
					<th>Смч_A2</th>
					<th>Кпx</th>
					<th>Кн</th>
					<th>Ст</th>
					<th>Пт</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> <?php
						require_once 'connection_1.php';
						echo $array_2[0]['этап'] ?></td>
                    <td> 
							<?php 
							echo $array_2[0]['Кти_А1'] ;
							 ?>
					</td>
                    <td>
						<?php
					echo	$array_2[0]['Кти_А2'] ?>
					</td>
                    <td>
						<?php
						echo $array_2[0]['Кп_А1'] ?>
					</td>
					<td><?php
						echo $array_2[0]['Кп_А2'] ?></td>
					<td><?php
						echo $array_2[0]['Кс_А1'] ?></td>
					<td><?php
						echo $array_2[0]['Кс_А2'] ?></td>
					<td><?php
						echo $array_2[0]['Смч_А1'] ?></td>
					<td><?php
						echo $array_2[0]['Смч_А2'] ?></td>
					<td><?php
						echo $array_2[0]['Кпх'] ?></td>
					<td><?php
						echo $array_2[0]['Кн'] ?></td>
					<td><?php
						echo $array_2[0]['Ст'] ?></td>
					<td><?php
						echo $array_2[0]['Пт'] ?></td>
                  </tr>
				  <!--2 row   -->
                  <tr>
                    <td> <?php
						require_once 'connection_1.php';
						echo $array_2[1]['этап'] ?></td>
                    <td> 
							<?php 
							echo $array_2[1]['Кти_А1'] ;
							 ?>
					</td>
                    <td>
						<?php
						echo $array_2[1]['Кти_А2'] ?>
					</td>
                    <td>
						<?php
						echo $array_2[1]['Кп_А1'] ?>
					</td>
					<td><?php
						echo $array_2[1]['Кп_А2'] ?></td>
					<td><?php
						echo $array_2[1]['Кс_А1'] ?></td>
					<td><?php
						echo $array_2[1]['Кс_А2'] ?></td>
					<td><?php
						echo $array_2[1]['Смч_А1'] ?></td>
					<td><?php
						echo $array_2[1]['Смч_А2'] ?></td>
					<td><?php
						echo $array_2[1]['Кпх'] ?></td>
					<td><?php
						echo $array_2[1]['Кн'] ?></td>
					<td><?php
						echo $array_2[1]['Ст'] ?></td>
					<td><?php
						echo $array_2[1]['Пт'] ?></td>
                  </tr>
                  </tr>
				  <!--3 row   -->
                  <tr>
                    <td> <?php
						require_once 'connection_1.php';
						echo $array_2[2]['этап'] ?></td>
                    <td> 
							<?php 
							echo $array_2[2]['Кти_А1'] ;
							 ?>
					</td>
                    <td>
						<?php
						echo $array_2[2]['Кти_А2'] ?>
					</td>
                    <td>
						<?php
						echo $array_2[2]['Кп_А1'] ?>
					</td>
					<td><?php
						echo $array_2[2]['Кп_А2'] ?></td>
					<td><?php
						echo $array_2[2]['Кс_А1'] ?></td>
					<td><?php
						echo $array_2[2]['Кс_А2'] ?></td>
					<td><?php
						echo $array_2[2]['Смч_А1'] ?></td>
					<td><?php
						echo $array_2[2]['Смч_А2'] ?></td>
					<td><?php
						echo $array_2[2]['Кпх'] ?></td>
					<td><?php
						echo $array_2[2]['Кн'] ?></td>
					<td><?php
						echo $array_2[2]['Ст'] ?></td>
					<td><?php
						echo $array_2[2]['Пт'] ?></td>
                  </tr>
				  <!--4 row   -->
                  <tr>
                    <td> <?php
						require_once 'connection_1.php';
						echo $array_2[3]['этап'] ?></td>
                    <td> 
							<?php 
							echo $array_2[3]['Кти_А1'] ;
							 ?>
					</td>
                    <td>
						<?php
						echo $array_2[3]['Кти_А2'] ?>
					</td>
                    <td>
						<?php
						echo $array_2[3]['Кп_А1'] ?>
					</td>
					<td><?php
						echo $array_2[3]['Кп_А2'] ?></td>
					<td><?php
						echo $array_2[3]['Кс_А1'] ?></td>
					<td><?php
						echo $array_2[3]['Кс_А2'] ?></td>
					<td><?php
						echo $array_2[3]['Смч_А1'] ?></td>
					<td><?php
						echo $array_2[3]['Смч_А2'] ?></td>
					<td><?php
						echo $array_2[3]['Кпх'] ?></td>
					<td><?php
						echo $array_2[3]['Кн'] ?></td>
					<td><?php
						echo $array_2[3]['Ст'] ?></td>
					<td><?php
						echo $array_2[3]['Пт'] ?></td>
                  </tr>
				  <!--5 row   -->
                  <tr>
                    <td> <?php
						require_once 'connection_1.php';
						echo $array_2[4]['этап'] ?></td>
                    <td> 
							<?php 
							echo $array_2[4]['Кти_А1'] ;
							 ?>
					</td>
                    <td>
						<?php
						echo $array_2[4]['Кти_А2'] ?>
					</td>
                    <td>
						<?php
						echo $array_2[4]['Кп_А1'] ?>
					</td>
					<td><?php
						echo $array_2[4]['Кп_А2'] ?></td>
					<td><?php
						echo $array_2[4]['Кс_А1'] ?></td>
					<td><?php
						echo $array_2[4]['Кс_А2'] ?></td>
					<td><?php
						echo $array_2[4]['Смч_А1'] ?></td>
					<td><?php
						echo $array_2[4]['Смч_А2'] ?></td>
					<td><?php
						echo $array_2[4]['Кпх'] ?></td>
					<td><?php
						echo $array_2[4]['Кн'] ?></td>
					<td><?php
						echo $array_2[4]['Ст'] ?></td>
					<td><?php
						echo $array_2[4]['Пт'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /col-md-12 -->
		  <div class="col-md-12 mt">
            <div class="content-panel">
              <table class="table table-hover">
                <h4><i class="fa fa-angle-right"></i> Дополнительные данные </h4>
                <hr>
                <thead>
			
                  <tr>
                    <th>id</th>
						<th>стоимость новой машины</th>
						<th>стоимость КР</th>
						<th>стоимость КР гидр</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
				  <td><?php
						require_once 'connection.php';
						echo $array_1[0]['id'] ;
						 ?></td>
					    <td><?php
						echo $array_1[0]['стоим_нов_маш'] ;
						 ?></td>
						<td><?php
						 echo $array_1[0]['стоим_КР'] ; ?></td>
						<td><?php
						echo $array_1[0]['стоим_КР_гидр'] ; ?></td>
					</tr>
					<!-- 2 row -->
					<tr>
				  <td><?php
						 echo $array_1[1]['id'] ;?></td>
					     <td><?php
						echo $array_1[1]['стоим_нов_маш'] ?></td>
						<td><?php
						echo $array_1[1]['стоим_КР'] ?></td>
						<td><?php
						echo $array_1[1]['стоим_КР_гидр'] ?></td>
					</tr>
					<!-- 3 row -->
					<tr>
				  <td><?php
						echo $array_1[2]['id'] ?></td>
					    <td><?php
						echo $array_1[2]['стоим_нов_маш'] ?></td>
						<td><?php
						echo $array_1[2]['стоим_КР'] ?></td>
						<td><?php
						echo $array_1[2]['стоим_КР_гидр'] ?></td>
					</tr>
					<!-- 4 row -->
					<tr>
				  <td><?php
						echo $array_1[3]['id'] ?></td>
					    <td><?php
						echo $array_1[3]['стоим_нов_маш'] ?></td>
						<td><?php
						echo $array_1[3]['стоим_КР'] ?></td>
						<td><?php
						echo $array_1[3]['стоим_КР_гидр'] ?></td>
					</tr>
					<!-- 3 row -->
					<tr>
				  <td><?php
						echo $array_1[4]['id'] ?></td>
					    <td><?php
						echo $array_1[4]['стоим_нов_маш'] ?></td>
						<td><?php
						echo $array_1[4]['стоим_КР'] ?></td>
						<td><?php
						echo $array_1[4]['стоим_КР_гидр'] ?></td>
					</tr>
                </tbody>
              </table>
            </div>
          </div>
		  
		  
        </div>
        <!-- row -->
        
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    
  </section>
  <!-- js placed at the end of the document so the pages load faster -->

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
   <script src="lib/jquery.scrollTo.min.js"></script>
   <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
   <!--common script for all pages-->
   <script src="lib/common-scripts.js"></script>
  <!--script for this page-->

</body>

</html>
