<!DOCTYPE html>


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
                    <form role="form" class="form-horizontal style-form" action="CalcDBsite.php" method="post">
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
                    <input class="btn btn-theme "  type="submit" value="Рассчитать" onclick="Calc()">
                    </form>
            </div>
                <div>
                    <?php
                    include_once ("CalcDBsiteCode.php");
                    include_once ("CalcDBsiteCode2.php");
                    ?>
                </div>

                <div class="col-lg-6">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> График сравнения себестоимости машино-часа работы техники</h4>
                        <div class="panel-body text-center">
                            <canvas id="lineChart" height="300" width="400"></canvas>
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

<script src="Chart.bundle2.js" ></script>
<script  >
    var x = JSON.parse('<?php echo JSON_encode($mass);?>');
    var y = JSON.parse('<?php echo JSON_encode($mass1);?>');
    var yy = JSON.parse('<?php echo JSON_encode($mass2);?>');
    var ctx = document.getElementById("lineChart").getContext("2d");


    myLineChart = new Chart(ctx, {
        type: 'line',  //NegativeTransparentLine
        data: {
            labels: x,
            datasets: [{
                data: y,
                fill: false,
                label:'с учётом старения',
                //borderWidth: 2,
                pointRadius:0,
                // strokeColor: "rgba(0,252,0,0)",

                // pointStrokeColor: "#00ff00",
                borderColor: "#00ff00",
            },

                {
                    data: yy,
                    fill: false,
                    label:'без учёта старения',
                    pointRadius:0,
                    borderColor: "red",
            },

            ],
            option: {

                scales: {

                    yAxes: [{

                        ticks: {
                            beginAtZero: true

                        }
                    }],
                    xAxes: [{
                        display: true,

                    }],
                },

            }



        }
    });


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