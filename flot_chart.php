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
                    <a  class="active"href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="morris.php">стандарт</a></li>
                        <li><a href="chartjs.php">стандарт(суммарный)</a></li>
                        <li class="active"><a href="flot_chart.php">капитальный(стандарт)</a></li>
                        <li><a href="xchart.php">капитальный(суммарный)</a></li>
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
            <div class="row mt">
                <div class="col-lg-12">
                    <form role="form" class="form-horizontal style-form" action="flot_chart.php" method="post">

                        <div class="form-group has-success">
                            <label class="col-lg-1 control-label">Введите N</label>
                            <div class="col-lg-10">
                                <input type="text" autocomplete="off"   size="10"   style="height:34px"  name="capital" required oninvalid="this.setCustomValidity('Введите число от 1 до 9')" oninput="this.setCustomValidity('')"  pattern="[1-9]" >  <!--" -->
                                <input class="btn btn-theme"  type="submit" value="Отправить">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

                    <?php
                    include 'code.php';
                   // print_r($mass1);


                    ?>
                    <h4><i class="fa fa-angle-right"></i> График </h4>

                    <!-- width="400" height="400"-->
                     <canvas id="lineChart" ></canvas>
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

<script src="Chart.bundle.js" ></script>
<script  >
    var x = JSON.parse('<?php echo JSON_encode($mass);?>');
    var y = JSON.parse('<?php echo JSON_encode($mass1);?>');

   Chart.defaults.NegativeTransparentLine = Chart.helpers.clone(Chart.defaults.line);
   Chart.controllers.NegativeTransparentLine = Chart.controllers.line.extend({
       update: function() {
// get the min and max values
           var min = Math.min.apply(null, this.chart.data.datasets[0].data);
           var max = Math.max.apply(null, this.chart.data.datasets[0].data);
           var yScale = this.getScaleForId(this.getDataset().yAxisID);

// figure out the pixels for these and the value 0
           var top = yScale.getPixelForValue(max);
           var zero = yScale.getPixelForValue(0);
           var bottom = yScale.getPixelForValue(min);

// build a gradient that switches color at the 0 point
           var ctx = this.chart.chart.ctx;
           var gradient = ctx.createLinearGradient(0, bottom, 0, top);
           var ratio = Math.min((zero - bottom) / (top - bottom), 1);
           gradient.addColorStop(0, 'rgb(255,0,0)');
           gradient.addColorStop(ratio, 'rgb(255,0,0)');
           gradient.addColorStop(ratio, 'rgb(0,255,0)');
           gradient.addColorStop(1, 'rgb(0,255,0)');
           this.chart.data.datasets[0].borderColor = gradient;

           return Chart.controllers.line.prototype.update.apply(this, arguments);
       }
   });

   var ctx = document.getElementById("lineChart").getContext("2d");


   myLineChart = new Chart(ctx, {
        type: 'NegativeTransparentLine',  //NegativeTransparentLine
        data: {
            labels: x,
            datasets: [{
                data: y,
                fill: false,
                label:'Life Cycle Cost Analysis',
                //borderWidth: 2,
                pointRadius:0,
               // strokeColor: "rgba(0,252,0,0)",

               // pointStrokeColor: "#00ff00",
                borderColor: "#00ff00",
            }],
            /* option: {

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


            } */
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


