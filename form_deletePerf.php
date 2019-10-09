<!DOCTYPE html>


<head xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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
                        <li ><a href="basic_table_1v.php">Basic Table</a> </li>
                        <li ><a href="view_tableCmch.php">Информация о машинах</a></li>
                        <li> <a href="form_input.php">Добавить машину</a></li>
                        <li> <a href="insert_perf.php">Добавить экспл. хар-ки</a></li>
                        <li> <a href="insert_econom.php">Добавить эконом. хар-ки</a></li>
                        <li> <a href="form_deleteMachine.php">Удалить машину</a></li>
                        <li class="active"> <a href="form_deletePerf.php">Удалить экспл. хар-ки</a></li>
                        <li > <a href="form_deleteEconom.php">Удалить эконом. хар-ки</a></li>
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
            <form  method="post" >
                <div class="row mt" style="margin-right: -3600px">

                    <div class="col-lg-12 ">
                        <div class="content-panel">
                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <h4><i class="fa fa-angle-right"></i>Эксплуатационные характеристики</h4>

                                    <thead>

                                    <tr>
                                        <th style="text-align: center ; vertical-align: middle">ID хар-ки</th>
                                        <th style="text-align: center ; vertical-align: middle">марка</th>
                                        <th style="text-align: center ; vertical-align: middle">наработка с начала эксплуатации</th>
                                        <th style="text-align: center ; vertical-align: middle">начало интервала наработки</th>
                                        <th style="text-align: center ; vertical-align: middle">конец интервала наработки</th>
                                        <th style="text-align: center ; vertical-align: middle"> продолжительность смены</th>
                                        <th style="text-align: center ; vertical-align: middle">рабочее время текущего года, дни </th>
                                        <th style="text-align: center ; vertical-align: middle">коэффициент сменности </th>
                                        <th style="text-align: center ; vertical-align: middle"> количество машинистов</th>
                                        <th style="text-align: center ; vertical-align: middle">среднее растояние перебазировки до объекта, км </th>
                                        <th style="text-align: center ; vertical-align: middle">количество перебазирований техники в год</th>
                                        <th style="text-align: center ; vertical-align: middle"> количество такелажников</th>
                                        <th style="text-align: center ; vertical-align: middle"> средняя скорость перебазировок</th>
                                        <th style="text-align: center ; vertical-align: middle"> время погрузки, чел-часы</th>
                                        <th style="text-align: center ; vertical-align: middle"> коэффициент изменения условий эксплуатации</th>
                                        <th style="text-align: center ; vertical-align: middle">количество ТО-1 </th>
                                        <th style="text-align: center ; vertical-align: middle">количество ТО-2 </th>
                                        <th style="text-align: center ; vertical-align: middle">количество текущих ремонтов (Т) </th>
                                        <th style="text-align: center ; vertical-align: middle">количество сезонных обслуживаний (СО)</th>
                                        <th style="text-align: center ; vertical-align: middle">нормативная трудоемкость ТО-1, чел. час</th>
                                        <th style="text-align: center ; vertical-align: middle">нормативная трудоемкость ТО-2, чел. час</th>
                                        <th style="text-align: center ; vertical-align: middle">нормативная трудоемкость Т, чел. час </th>
                                        <th style="text-align: center ; vertical-align: middle"> нормативная трудоемкость СО, чел. час</th>
                                        <th style="text-align: center ; vertical-align: middle">нормативные трудоёмкость на капитальный ремонт (К), чел. часов </th>
                                        <th style="text-align: center ; vertical-align: middle"> периодичность ТО-1</th>
                                        <th style="text-align: center ; vertical-align: middle"> периодичность ТО-2</th>
                                        <th style="text-align: center ; vertical-align: middle"> периодичность Т</th>
                                        <th style="text-align: center ; vertical-align: middle"> периодичность К</th>
                                        <th style="text-align: center ; vertical-align: middle">продолжительность ТО-1, дни </th>
                                        <th style="text-align: center ; vertical-align: middle"> продолжительность ТО-2, дни</th>
                                        <th style="text-align: center ; vertical-align: middle">продолжительность Т, дни </th>
                                        <th style="text-align: center ; vertical-align: middle">продолжительность СО, дни </th>
                                        <th style="text-align: center ; vertical-align: middle">продолжительность К, дни </th>
                                        <th style="text-align: center ; vertical-align: middle"> среднемесячное рабочее время, ч</th>
                                        <th style="text-align: center ; vertical-align: middle"> линейная норма расхода дизельного топлива на 100 км, л.</th>
                                        <th style="text-align: center ; vertical-align: middle">норма расхода дизтоплива летом за 1 машинный час </th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    require_once 'connectSQL.php';


                                    IF( $conn ) {
                                        $result = sqlsrv_query($conn, "SELECT  *
                                                                         FROM car_brands  INNER JOIN
                                                                         dbo.performance_ch ON dbo.car_brands.Id_brand = dbo.performance_ch.Id_brand INNER JOIN
                                                                          dbo.type_of_cars ON dbo.car_brands.Id_type = dbo.type_of_cars.Id_type   ");
                                        while ($myrow = sqlsrv_fetch_array($result)) { ?>
                                            <tr style="text-align: center">
                                                <td> <?php echo $myrow['Id_perf_ch']?></td>
                                                <td> <?php echo $myrow['Brand name']?></td>
                                                <td> <?php echo $myrow['H']?></td>
                                                <td> <?php echo $myrow['Hstart']?></td>
                                                <td> <?php echo $myrow['Hend']?></td>
                                                <td> <?php echo $myrow['shift duration']?></td>
                                                <td> <?php echo $myrow['working time of the current year, days']?></td>
                                                <td> <?php echo $myrow['shift factor']?></td>
                                                <td> <?php echo $myrow['number of drivers']?></td>
                                                <td> <?php echo $myrow['average distance of relocation, km']?></td>
                                                <td> <?php echo $myrow['Number of relocations per year']?></td>
                                                <td> <?php echo $myrow['number of scaffold riders']?></td>
                                                <td> <?php echo round($myrow['average relocation rate, km / h'],2)?></td>
                                                <td> <?php echo round($myrow['loading time, man hours'],2)?></td>
                                                <td> <?php echo $myrow['coefficient of change in operating conditions']?></td>
                                                <td> <?php echo $myrow['number of TO-1']?></td>
                                                <td> <?php echo $myrow['number of TO-2']?></td>
                                                <td> <?php echo $myrow['number of current repairs (T)']?></td>
                                                <td> <?php echo $myrow['number of seasonal services (SS)']?></td>
                                                <td> <?php echo $myrow['normative labor input of TO-1, man. hour']?></td>
                                                <td> <?php echo $myrow['normative labor input of TO-2, man. hour']?></td>
                                                <td> <?php echo $myrow['standard labor intensity T, man. hour']?></td>
                                                <td> <?php echo $myrow['normative labor input SS, man hours']?></td>
                                                <td> <?php echo $myrow['normative labor input of capital repairs (K), man hours']?></td>
                                                <td> <?php echo $myrow['periodicity of the TO-1']?></td>
                                                <td> <?php echo $myrow['periodicity of the TO-2']?></td>
                                                <td> <?php echo $myrow['periodicity of execution T']?></td>
                                                <td> <?php echo $myrow['periodicity of K']?></td>
                                                <td>  <?php echo round($myrow['duration of TO-1, days'],2)?></td>
                                                <td> <?php echo round($myrow['duration of TO-2, days'],2)?></td>
                                                <td> <?php echo round($myrow['duration T, days'],2)?></td>
                                                <td> <?php echo round($myrow['duration of CO, days'],2)?></td>
                                                <td> <?php echo round($myrow['duration K, days'],2)?></td>
                                                <td> <?php echo $myrow['average monthly working time, h']?></td>
                                                <td> <?php echo $myrow['linear rate of diesel fuel consumption per 100 km, l.']?></td>
                                                <td> <?php echo round($myrow['consumption rate of diesel fuel in the summer for 1 machine hour'],2)?></td>



                                            </tr>
                                        <?php }
                                    }
                                    ELSE
                                    {
                                        echo "Connection could not be established.\n";
                                        DIE(print_r(sqlsrv_errors(), true));
                                    }

                                    ?>



                                    </tr>
                                    <tr style="text-align: center">
                                        <td width="200px">     </td>

                                        <td width=200px>   <select name="id_perf" id="" class="form-control" style="width: 100% "  >
                                                <option selected disabled>выберите id </option>
                                                <?php
                                                include "connectSQL.php";
                                                IF( $conn ) {
                                                    $result = sqlsrv_query($conn, "SELECT  *  FROM  performance_ch");
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

                                            <input  class="btn btn-theme"  type="submit" value="Удалить"> </td>
                                        <td> <input id=""  class="btn btn-theme"  type="submit" value="Обновить страницу" onclick="Click()" >
                                            <?php include 'delete_perf.php';
                                            ?>
                                        </td>

                                    </tr>


                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>

                <!-- row -->
            </form>
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
