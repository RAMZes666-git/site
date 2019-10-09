<!DOCTYPE html>


<head xmlns="http://www.w3.org/1999/html">
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
                    <a  href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class="sub">
                        <li >
                            <a href="basic_table_1v.php">Basic Table</a>
                        <li><a href="view_tableCmch.php">Информация о машинах</a></li>
                        </li>
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
                    <a class="active" href="javascript:;">
                        <i class="fa fa-money"></i>
                        <span>Расчёт СМЧ</span>
                    </a>
                    <ul class="sub">
                        <li class="active"><a href="CalcDBsite.php">Расчёт</a></li>
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

                <div class="col-lg-12 ">
                    <form role="form" class="form-horizontal style-form" action="form_saveINbd.php"   method="post">
                    <h4>Выберите машину</h4>

                    <select   name="SelectOption1" id="SelectOption1" class="form-control" style="width: 40% " >     <!-- onchange="getValue()" -->
                        <option selected disabled>выберите машину</option>    <!--Экскаватор Амкодор 732 Погрузчик Амкодор 702 Каток HAMM 3414 VIO Автогрейдер Титан 8220 -->
                        <?php
                        include "connectSQL.php";
                        IF( $conn ) {
                            $result = sqlsrv_query($conn, "SELECT  *  FROM car_brands");
                            while ($myrow = sqlsrv_fetch_array($result)) { ?>
                                <option   value="<?php echo $myrow[0]?>"><?php echo $myrow[1]?></option>
                            <?php }
                        }
                        ELSE
                        {
                            echo "Connection could not be established.\n";
                            DIE(print_r(sqlsrv_errors(), true));
                        }

                        ?>
                    </select>
                    <input class="btn btn-theme "  type="submit" value="Рассчитать" >

                    </form>


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