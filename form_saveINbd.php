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
                    <form action="saveINbd.php"  method="post">

                        <div>

                           <?php include_once ("CalcDBsiteCode.php");  ?>
                            Марка машины -  <input type="text" name="id_mash"  readonly value="<?php  echo $name ?>">  </br>
                            Годовой режим работы СДМ =  <input type="text" name="gd_rejim"  readonly value="<?php  echo round($Tch,2) ?>">    </br>
                            Амортизационные отчисления, приходящиеся на один час эксплуатации = <input type="text" name="armotiz" readonly  value=" <?php echo round($Za,2) ?>">    </br>
                            Затраты на оплату и стимулирование труда машинистов =  <input type="text" name="zatraty_machinistov" readonly  value=" <?php  echo round($Zzp,2) ?>">    </br>
                            Затраты на энергоносители, смазочные и сопутствующие материалы =  <input type="text" name="ztr_energo" readonly  value=" <?php  echo round($Zen,2) ?>">    </br>
                            Затраты на заработную плату ремонтных рабочих =  <input type="text" name="ztr_zarplaty" readonly  value=" <?php  echo round($Ztzar,2) ?>">    </br>
                            Затраты на запасные части и ремонтные материалы =  <input type="text" name="ztr_mat"  readonly value=" <?php  echo round($Zmat,2) ?>">    </br>
                            Затраты на машину технической помощи для проведения ТО вне ремонтной базы (на объекте) = <input type="text" name="zatraty_tex" readonly  value=" <?php  echo round($Zmtp,2) ?>">    </br>
                            Определение затрат, приходящихся на один машиночас, для строительной техники, перебазируемой спецсредствами = <input type="text" name="zatr_mach_h" readonly  value=" <?php  echo round($Zpb,2) ?>">    </br>
                            Затраты на капремонт =  <input type="text" name="zatr_kapremont"  readonly value=" <?php  echo round($Zkr,2) ?>">    </br>
                            Затраты на техническое обслуживание, текущий и капитальный ремонты =  <input type="text" name="zatr_to" readonly  value=" <?php  echo round($Zto,2) ?>">    </br>
                            Затраты на перебазирование строительной техники спецсредствами =  <input type="text" name="zatr_perebaz"  readonly value=" <?php  echo round($Zpm,2) ?>">    </br>
                            Затраты на заработную плату машиниста перебазируемой техники за время перебазирования =  <input type="text" name="zatr_zarpl_mash" readonly  value=" <?php  echo round($Zzpm,2) ?>">    </br>
                            Затраты на машину сопровождения =  <input type="text" name="zatr_soprov" readonly  value=" <?php  echo round($Zmc,2) ?>">   </br>
                            Затраты на тягач =  <input type="text" name="zatr_tygach" readonly  value=" <?php  echo round($Ztg,2) ?>">    </br>
                            Затраты на прицеп или трейлер =  <input type="text" name="zatr_pricep"  readonly value=" <?php  echo round($Zpr,2) ?>">    </br>
                            Затраты на кран =  <input type="text" name="zatr_kran" readonly  value=" <?php  echo round($Zkran,2) ?>">    </br>
                            Затраты на оплату труда рабочих, занятых погрузкой-разгрузкой перебазируемой техники =  <input type="text" name="zatr_zarplata"  readonly value=" <?php  echo round($Zr,2) ?>">    </br>
                            Затраты на сменную оснастку =  <input type="text" name="zatr_osnastka" readonly  value=" <?php  echo round($Zos,2) ?>">    </br>
                            Себестоимость машиночаса =  <input type="text" name="cmch1" readonly  value=" <?php  echo round($Cmch,2) ?>">    </br>
                            Накладные расходы =  <input type="text" name="nakladnye" readonly  value=" <?php  echo round($Nr,2) ?>">    </br>
                            Заработная плата в накладных расходах =  <input type="text" name="zarplata_nakladnye" readonly  value=" <?php  echo round($ZPnp,2) ?>">    </br>
                            Плановые накопления =  <input type="text" name="planovye" readonly  value=" <?php  echo round($Pn,2) ?>">    </br>
                            Заработная плата в плановых накоплениях =  <input type="text" name="zarplata_planovye"  readonly value=" <?php  echo round($ZPpn,2) ?>">    </br>
                            Начисления дополнительного отпуска =  <input type="text" name="otpysk" readonly  value=" <?php  echo round($Dot,2) ?>">    </br>
                            Выплаты за выслугу лет =  <input type="text" name="vyslyga_let" readonly  value=" <?php  echo round($Vl,2) ?>">    </br>
                            Обязательное страхование от несчастных случаев =  <input type="text" name="ns"  readonly value=" <?php  echo round($Cnc,2) ?>">    </br>
                            Прочие затраты =  <input type="text" name="prochie_zatraty"  readonly value=" <?php  echo round($Pz,2) ?>">    </br>
                            Отчисления в инновационный фонд =  <input type="text" name="inov_fond" readonly value=" <?php  echo round($If,2) ?>">    </br>
                            Отчисления на соц. страхование =  <input type="text" name="soc_straxovanie" readonly  value=" <?php  echo round($Ssoc,2) ?>">    </br>
                            С/х налог =  <input type="text" name="cx_nalog" readonly  value=" <?php  echo round($Ncx,2) ?>">    </br>
                            Налоги и отчисления =  <input type="text" name="nalogi"  readonly value=" <?php  echo round($N,2) ?>">    </br>
                            Планово-расчетная цена машиночаса =  <input type="text" name="prc2"  readonly value=" <?php  echo round($PRC,2) ?>">    </br>
                            Единый платёж в местные целевые бюджетные и республиканские фонды =  <input type="text" name="edinyi_platej" readonly  value=" <?php  echo round($Ep,2) ?>">    </br>
                            НДС =  <input type="text" name="nds1"  readonly value=" <?php  echo round($NDS,2) ?>">    </br>
                            Планово-расчетная цена машиночаса с налогами =  <input type="text" name="prc_nalog"  readonly value=" <?php  echo round($PRCn,2) ?>">    </br>


                            <?php include_once ("CalcDBsiteCode2.php"); ?>

                            <input class="btn btn-theme "  type="submit" value="Сохранить" >

                        </div>
                    </form>


                    <div class="col-lg-6">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> График сравнения себестоимости машино-часа работы техники</h4>
                            <div class="panel-body text-center">
                                <canvas id="lineChart" height="300" width="400"></canvas>
                            </div>
                        </div>
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
