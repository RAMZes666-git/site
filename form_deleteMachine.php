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
                        <li >
                            <a href="basic_table_1v.php">Basic Table</a></li>
                        <li><a href="view_tableCmch.php">Информация о машинах</a></li>
                        <li> <a href="form_input.php">Добавить машину</a></li>
                        <li> <a href="insert_perf.php">Добавить экспл. хар-ки</a></li>
                        <li> <a href="insert_econom.php">Добавить эконом. хар-ки</a></li>
                        <li class="active"> <a href="form_deleteMachine.php">Удалить машину</a></li>
                        <li> <a href="form_deletePerf.php">Удалить экспл. хар-ки</a></li>
                        <li> <a href="form_deleteEconom.php">Удалить эконом. хар-ки</a></li>


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

            <div class="row mt" >
                <div class="col-lg-12 ">

                    <div class="content-panel">
                        <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed ">
                                <h4><i class="fa fa-angle-right"></i> Добавить  машину </h4>
                                <thead>
                                <tr>
                                    <th style="text-align: center ; vertical-align: middle">тип</th>
                                    <th style="text-align: center ; vertical-align: middle">марка</th>
                                </tr>

                                </thead>
                                <tbody>

                                <?php
                                require_once 'connectSQL.php';


                                IF( $conn ) {
                                    $result = sqlsrv_query($conn, "SELECT        dbo.type_of_cars.name, dbo.car_brands.[Brand name]
                                                                        FROM            dbo.car_brands INNER JOIN
                                                                        dbo.type_of_cars ON dbo.car_brands.Id_type = dbo.type_of_cars.Id_type ");
                                    while ($myrow = sqlsrv_fetch_array($result)) { ?>
                                        <tr style="text-align: center">
                                            <td> <?php echo $myrow['name']?></td>
                                            <td> <?php echo $myrow['Brand name']?></td>
                                        </tr>
                                    <?php }
                                }
                                ELSE
                                {
                                    echo "Connection could not be established.\n";
                                    DIE(print_r(sqlsrv_errors(), true));
                                }

                                ?>
                                <form   method="post">
                                    <tr>

                                        <td width=200px>
                                            <select name="idmach" id="" class="form-control" style="width: 100% "  >
                                                <option selected disabled>выберите машину</option>
                                                <?php
                                                include "connectSQL.php";
                                                IF( $conn ) {
                                                    $result = sqlsrv_query($conn, "SELECT  *  FROM car_brands");
                                                    while ($myrow = sqlsrv_fetch_array($result)) { ?>
                                                        <option value="<?php echo $myrow[0]?>"><?php echo $myrow[1]?></option>
                                                    <?php }
                                                }
                                                ELSE
                                                {
                                                    echo "Connection could not be established.\n";
                                                    DIE(print_r(sqlsrv_errors(), true));
                                                }

                                                ?>
                                            </select> </td>

                                        <td>
                                            <input id="clearButton"  class="btn btn-theme"  type="submit" value="Удалить" >
                                            <input id=""  class="btn btn-theme"  type="submit" value="Обновить страницу" onclick="Click()" >

                                            <?php  include 'delete_machine.php';

                                            ?>
                                        </td>
                                    </tr>
                                </form>
                                </tbody>
                            </table>

                        </section>
        </section>
        <!-- /MAIN CONTENT -->
        <!--main content end-->
        <!--footer start-->

    </section>

    <script>

        var text1=  document.getElementById("textInput");
        var btn =document.getElementById("clearButton");
        function ctrlButton() {
            btn.disabled = this.value.trim().length === 0;
        }
        text1.addEventListener('input', ctrlButton, false);
        ctrlButton.call(text1);

        function Click() {
            location.reload();
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
