<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
                <li> <a href="form_input.php">Добавить машину</a></li>
                <li> <a href="insert_perf.php">Добавить экспл. хар-ки</a></li>
                <li> <a href="insert_econom.php">Добавить эконом. хар-ки</a></li>
                <li> <a href="form_deleteMachine.php">Удалить машину</a></li>
                <li> <a href="form_deletePerf.php">Удалить экспл. хар-ки</a></li>
                <li> <a href="form_deleteEconom.php">Удалить эконом. хар-ки</a></li>
                <li> <a href="actual_values.php">Информ. о фактич. знач.</a></li>
              
             
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
            <form role="form" action="basic_table_1v.php" method="post">
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
						echo $array[0][0] ?></td>
                    <td> 
							<?php 
							echo $array[0][1] ;
							 ?>
					</td>
                    <td>
						<?php
					echo	$array[0][2] ?>
					</td>
                    <td>
						<?php
						echo $array[0][3] ?>
					</td>
					<td><?php
						echo $array[0][4] ?></td>
					<td><?php
						echo $array[0][5] ?></td>
					<td><?php
						echo $array[0][6] ?></td>
					<td><?php
						echo $array[0][7] ?></td>
					<td><?php
						echo $array[0][8] ?></td>
					<td><?php
						echo $array[0][9] ?></td>
					<td><?php
						echo $array[0][10] ?></td>
					<td><?php
						echo $array[0][11] ?></td>
					<td><?php
						echo $array[0][12] ?></td>
                  </tr>
				  <!--2 row   -->
                  <tr>
                    <td> <?php
					///	require_once 'connection_1.php';
						echo $array[1][0] ?></td>
                    <td> 
							<?php 
							echo $array[1][1] ;
							 ?>
					</td>
                    <td>
						<?php
						echo $array[1][2] ?>
					</td>
                    <td>
						<?php
						echo $array[1][3] ?>
					</td>
					<td><?php
						echo $array[1][4] ?></td>
					<td><?php
						echo $array[1][5] ?></td>
					<td><?php
						echo $array[1][6] ?></td>
					<td><?php
						echo $array[1][7] ?></td>
					<td><?php
						echo $array[1][8] ?></td>
					<td><?php
						echo $array[1][9] ?></td>
					<td><?php
						echo $array[1][10] ?></td>
					<td><?php
						echo $array[1][11] ?></td>
					<td><?php
						echo $array[1][12] ?></td>
                  </tr>
                  </tr>
				  <!--3 row   -->
                  <tr>
                    <td> <?php
						///require_once 'connection_1.php';
						echo $array[2][0] ?></td>
                    <td> 
							<?php 
							echo $array[2][1] ;
							 ?>
					</td>
                    <td>
						<?php
						echo $array[2][2] ?>
					</td>
                    <td>
						<?php
						echo $array[2][3] ?>
					</td>
					<td><?php
						echo $array[2][4] ?></td>
					<td><?php
						echo $array[2][5] ?></td>
					<td><?php
						echo $array[2][6] ?></td>
					<td><?php
						echo $array[2][7] ?></td>
					<td><?php
						echo $array[2][8] ?></td>
					<td><?php
						echo $array[2][9] ?></td>
					<td><?php
						echo $array[2][10] ?></td>
					<td><?php
						echo $array[2][11] ?></td>
					<td><?php
						echo $array[2][12] ?></td>
                  </tr>
				  <!--4 row   -->
                  <tr>
                    <td> <?php
					//	require_once 'connection_1.php';
						echo $array[3][0] ?></td>
                    <td> 
							<?php 
							echo $array[3][1] ;
							 ?>
					</td>
                    <td>
						<?php
						echo $array[3][2] ?>
					</td>
                    <td>
						<?php
						echo $array[3][3] ?>
					</td>
					<td><?php
						echo $array[3][4] ?></td>
					<td><?php
						echo $array[3]['Кс_А1'] ?></td>
					<td><?php
						echo $array[3]['Кс_А2'] ?></td>
					<td><?php
						echo $array[3]['Смч_А1'] ?></td>
					<td><?php
						echo $array[3]['Смч_А2'] ?></td>
					<td><?php
						echo $array[3]['Кпх'] ?></td>
					<td><?php
						echo $array[3]['Кн'] ?></td>
					<td><?php
						echo $array[3]['Ст'] ?></td>
					<td><?php
						echo $array[3]['Пт'] ?></td>
                  </tr>
				  <!--5 row   -->
                  <tr>
                    <td> <?php
					///	require_once 'connection_1.php';
						echo $array[4]['этап'] ?></td>
                    <td> 
							<?php 
							echo $array[4]['Кти_А1'] ;
							 ?>
					</td>
                    <td>
						<?php
						echo $array[4]['Кти_А2'] ?>
					</td>
                    <td>
						<?php
						echo $array[4]['Кп_А1'] ?>
					</td>
					<td><?php
						echo $array[4]['Кп_А2'] ?></td>
					<td><?php
						echo $array[4]['Кс_А1'] ?></td>
					<td><?php
						echo $array[4]['Кс_А2'] ?></td>
					<td><?php
						echo $array[4]['Смч_А1'] ?></td>
					<td><?php
						echo $array[4]['Смч_А2'] ?></td>
					<td><?php
						echo $array[4]['Кпх'] ?></td>
					<td><?php
						echo $array[4]['Кн'] ?></td>
					<td><?php
						echo $array[4]['Ст'] ?></td>
					<td><?php
						echo $array[4]['Пт'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

            <div class="col-md-12 mt">
                <div class="content-panel">

                    <table class="table table-hover">
                        <h4><i class="fa fa-angle-right"></i> Изменить данные </h4>
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


                                    <td>  <input type="text" id="limitation" autocomplete="off"   size="10"   style="height:34px"  name="stage" >  </td>
                                    <td>  <input type="text" id="limitation2" autocomplete="off"   size="10"   style="height:34px"  name="kti_a1" >  </td>
                                    <td>  <input type="text" id="limitation3" autocomplete="off"   size="10"   style="height:34px"  name="kti_a2" >  </td>
                                    <td>  <input type="text" id="limitation4" autocomplete="off"   size="10"   style="height:34px"  name="kp_a1" > </td>
                                    <td>  <input type="text" id="limitation5" autocomplete="off"   size="10"   style="height:34px"  name="kp_a2"  >  </td>
                                    <td>  <input type="text" id="limitation6" autocomplete="off"   size="10"   style="height:34px"  name="ks_a1"  >  </td>
                                    <td>  <input type="text" id="limitation7" autocomplete="off"   size="10"   style="height:34px"  name="ks_a2"  >  </td>
                                    <td>  <input type="text" id="limitation8" autocomplete="off"   size="10"   style="height:34px"  name="cmch_a1"  >  </td>
                                    <td>  <input type="text" id="limitation9" autocomplete="off"   size="10"   style="height:34px"  name="cmch_a2"  >  </td>
                                    <td>  <input type="text" id="limitation10" autocomplete="off"   size="10"   style="height:34px"  name="kpx"  >  </td>
                                    <td>  <input type="text" id="limitation11" autocomplete="off"   size="10"   style="height:34px"  name="kn"  >  </td>
                                    <td>  <input type="text" id="limitation12" autocomplete="off"   size="10"   style="height:34px"  name="st" >  </td>
                                    <td>  <input type="text" id="limitation13" autocomplete="off"   size="10"   style="height:34px"  name="pt" >  </td>

                                </tr>

                                     <input  class="btn btn-theme"  type="submit" value="Изменить">
                                 <input id=""  class="btn btn-theme"  type="submit" value="Обновить страницу" onclick="Click()" >

                                        <?php include 'update_basic_table.php';
                                        ?>




                            </tbody>

                    </table>

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

                    <div class="col-md-12 mt">
                        <div class="content-panel">

                            <table class="table table-hover">
                                <h4><i class="fa fa-angle-right"></i> Изменить данные </h4>
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


                                    <td>  <input type="text" id="limitation14" autocomplete="off"   size="10"   style="height:34px"  name="id_mash" >  </td>
                                    <td>  <input type="text" id="limitation15" autocomplete="off"   size="10"   style="height:34px"  name="cost_mash" >  </td>
                                    <td>  <input type="text" id="limitation16" autocomplete="off"   size="10"   style="height:34px"  name="cost_Kr" >  </td>
                                    <td>  <input type="text" id="limitation17" autocomplete="off"   size="10"   style="height:34px"  name="cost_Kr_gidr" > </td>


                                </tr>
                                <input  class="btn btn-theme"  type="submit" value="Изменить">
                                <input  class="btn btn-theme"  type="submit" value="Обновить страницу" onclick="Click()" >
                                <?php include 'update_basic_table_2.php';
                                ?>
                                </tbody>

                            </table>
		  
        </form>
        </div>
        <!-- row -->
        
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    
  </section>


<script>
    function Click() {
        location.reload();
    }


    perem1 = document.getElementById("limitation");
    perem2 = document.getElementById("limitation2");
    perem3 = document.getElementById("limitation3");
    perem4 = document.getElementById("limitation4");
    perem5 = document.getElementById("limitation5");
    perem6 = document.getElementById("limitation6");
    perem7 = document.getElementById("limitation7");
    perem8 = document.getElementById("limitation8");
    perem9 = document.getElementById("limitation9");
    perem10 = document.getElementById("limitation10");
    perem11 = document.getElementById("limitation11");
    perem12 = document.getElementById("limitation12");
    perem13 = document.getElementById("limitation13");
    perem14 = document.getElementById("limitation14");
    perem15 = document.getElementById("limitation15");
    perem16 = document.getElementById("limitation16");
    perem17 = document.getElementById("limitation17");


    perem1.oninput = perem1.onkeydown = inputFloat;
    perem2.oninput = perem2.onkeydown = inputFloat;
    perem3.oninput = perem3.onkeydown = inputFloat;
    perem4.oninput = perem4.onkeydown = inputFloat;
    perem5.oninput = perem5.onkeydown = inputFloat;
    perem6.oninput = perem6.onkeydown = inputFloat;
    perem7.oninput = perem7.onkeydown = inputFloat;
    perem8.oninput = perem8.onkeydown = inputFloat;
    perem9.oninput = perem9.onkeydown = inputFloat;
    perem10.oninput = perem10.onkeydown = inputFloat;
    perem11.oninput = perem11.onkeydown = inputFloat;
    perem12.oninput = perem12.onkeydown = inputFloat;
    perem13.oninput = perem13.onkeydown = inputFloat;
    perem14.oninput = perem14.onkeydown = inputFloat;
    perem15.oninput = perem15.onkeydown = inputFloat;
    perem16.oninput = perem16.onkeydown = inputFloat;
    perem17.oninput = perem17.onkeydown = inputFloat;

    function inputFloat() {
        this.value = this.value.replace(',', '.');
        if (!/^\.?$/.test(this.value) && !isFinite(this.value)) {
            this.value = parseFloat(this.value) || this.value.slice(0, -1);
        }
        (this.value < 0 || this.value > 100000) && (this.value = 0);
    }


</script>




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
