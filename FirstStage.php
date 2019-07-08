<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"/>
    <!--<script type="text/javascript" src="lib/js/fusioncharts.js"> </script> -->

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
        <a class="logo">Estimation of the cost of the life cycle of the machine </a>
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
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class="sub">
                        <li><a href="basic_table.php">Basic Table</a></li>
                        <li><a href="view_tableCmch.php">Информация о машинах</a></li>


                    </ul>
                </li>

                <li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="morris.php">Стандарт</a></li>
                        <li><a href="chartjs.php">Стандарт(суммарный)</a></li>
                        <li><a href="flot_chart.php">капитальный(стандарт)</a></li>
                        <li><a href="xchart.php">капитальный(суммарный)</a></li>
                        <li><a href="gydro.php">гидро(стандарт)</a></li>
                        <li><a href="gydroSum.php">гидро(суммарный)</a></li>
                        <li class="active"><a href="FirstStage.php">моделиров по 1 КР</a></li>
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
            <div class="tab-pane" id="chartjs">
                <?php
                include 'FirstStageCode.php';
                ?>
                <div class="row mt">
                    <div class="col-lg-6">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Затраты(прибыль) / наработка</h4>
                            <div class="panel-body text-center">
                                <canvas id="lineChart" height="300" width="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Изменение Кти, Кп, Кс от наработки сначала эксплуатации </h4>
                            <div class="panel-body text-center">
                                <canvas id="lineChart1" height="300" width="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-6">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Изменение себестоимости машиночаса от наработки сначала эксплуатации</h4>
                            <div class="panel-body text-center">
                                <canvas id="lineChart2" height="300" width="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Изменение производительности от наработки сначала эксплуатации</h4>
                            <div class="panel-body text-center">
                                <canvas id="lineChart3" height="300" width="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--/flot-chart -->
            <!-- page end-->
        </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

</section>




<!--https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js   -->
<!--https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.0.0/Chart.bundle.js -->
<!--https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js -->
<script src="Chart.bundle2.js" ></script>


<script >
    var x = JSON.parse('<?php echo JSON_encode($mass);?>');
    var y = JSON.parse('<?php echo JSON_encode($mass1);?>');
    var yy = JSON.parse('<?php echo JSON_encode($chart);?>');
    var xxx = JSON.parse('<?php echo JSON_encode($chart1);?>');
    var yyy = JSON.parse('<?php echo JSON_encode($chart2);?>');

    var x1 = JSON.parse('<?php echo JSON_encode($chart6);?>');
    var y1 = JSON.parse('<?php echo JSON_encode($chart7);?>');
    var yy1 = JSON.parse('<?php echo JSON_encode($chart8);?>');
    var yyy1 = JSON.parse('<?php echo JSON_encode($chart9);?>');

    var x2 = JSON.parse('<?php echo JSON_encode($chart10);?>');
    var y2 = JSON.parse('<?php echo JSON_encode($chart11);?>');

    var x3 = JSON.parse('<?php echo JSON_encode($chart3);?>');
    var y3 = JSON.parse('<?php echo JSON_encode($chart4);?>');
    var yy3 = JSON.parse('<?php echo JSON_encode($chart5);?>');

    var ctx = document.getElementById("lineChart").getContext("2d");
    myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: yy,
            datasets: [{
                data: y,
                fill: false,
                //borderWidth: 2,

                pointRadius:0,
                borderColor: "red",
            },
                {
                    data: xxx,
                    fill: false,
                    //borderWidth: 2,
                    pointRadius:0,
                    borderColor: "red",
                },
                {
                    data:yyy ,  //x
                    fill: false,
                    //borderWidth: 2,
                    pointRadius:0,

                    borderColor: "#00ff00",
                }



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



    var ctx1 = document.getElementById("lineChart1").getContext("2d");
    myLineChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: x1, //x
            datasets: [{
                data: yyy1,
                fill: false,
                //borderWidth: 2,
                label:"Кс",
                pointRadius:0,
                borderColor: "blue",
            },
                {
                    data: y1,  //x
                    fill: false,

                    label:"Кти",
                    pointRadius:0,
                    borderColor: "red",
                },
                {
                    data:yy1 ,
                    fill: false,
                    label:"Кп",
                    pointRadius:0,

                    borderColor: "#00ff00",
                }



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

    var ctx2 = document.getElementById("lineChart2").getContext("2d");
    myLineChart1 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: x2, //x
            datasets: [{
                data: y2,
                fill: false,
                //borderWidth: 2,
                label:"Смч",
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


    var ctx3 = document.getElementById("lineChart3").getContext("2d");
    myLineChart1 = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: x3,
            datasets: [{
                data: y3,
                fill: false,
                //borderWidth: 2,
                label:"Пт",
                pointRadius:0,
                borderColor: "red",
            },
                {
                    data: yy3,
                    fill: false,

                    label:"Пэ",
                    pointRadius:0,
                    borderColor: "green",
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
<!--<script src="lib/flot/jquery.flot.js"></script>
<script src="lib/flot/jquery.flot.resize.js"></script>
<script src="lib/flot/jquery.flot.stack.js"></script>
<script src="lib/flot/jquery.flot.crosshair.js"></script>
<script src="lib/flotchart-conf.js"></script>-->



</body>

</html>

