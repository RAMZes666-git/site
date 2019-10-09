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
                        <li class="active"> <a href="insert_perf.php">Добавить экспл. хар-ки</a></li>
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
            <form  method="post" >
                <div class="row mt" style="margin-right: -3600px">

                    <div class="col-lg-12 ">
                        <div class="content-panel">
                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <h4><i class="fa fa-angle-right"></i>Эксплуатационные характеристики</h4>

                                    <thead>

                                    <tr>
                                        <th style="text-align: center ; vertical-align: middle">тип машины</th>
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
                                                <td> <?php echo $myrow['name']?></td>
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

                                        <td width=200px>   <select name="Id_mach" id="" class="form-control" style="width: 100% "  >
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

                                        <td >  <input type="text" id="limitation" autocomplete="off"   size="10"   style="height:34px"  name="p1" > </td>
                                        <td>  <input type="text" id="limitation2" autocomplete="off"   size="10"   style="height:34px"  name="p2" > </td>
                                        <td>  <input type="text" id="limitation3" autocomplete="off"   size="10"   style="height:34px"  name="p3" > </td>
                                        <td>  <input type="text" id="limitation4" autocomplete="off"   size="10"   style="height:34px"  name=p4" > </td>
                                        <td>  <input type="text" id="limitation5" autocomplete="off"   size="10"   style="height:34px"  name="p5" > </td>
                                        <td>  <input type="text" id="limitation6" autocomplete="off"   size="10"   style="height:34px"  name="p6" > </td>
                                        <td>  <input type="text" id="limitation7" autocomplete="off"   size="10"   style="height:34px"  name="p7" > </td>
                                        <td>  <input type="text" id="limitation8"  autocomplete="off"   size="10"   style="height:34px"  name="p8" > </td>
                                        <td>  <input type="text" id="limitation9" autocomplete="off"   size="10"   style="height:34px"  name="p9" > </td>
                                        <td>  <input type="text" id="limitation10" autocomplete="off"   size="10"   style="height:34px"  name="p10" > </td>
                                        <td>  <input type="text" id="limitation11" autocomplete="off"   size="10"   style="height:34px"  name="p11" > </td><td>
                                            <input type="text" id="limitation12" autocomplete="off"   size="10"   style="height:34px"  name="p12" > </td><td>
                                            <input type="text" id="limitation13" autocomplete="off"   size="10"   style="height:34px"  name="p13" > </td>
                                        <td>  <input type="text" id="limitation14" autocomplete="off"   size="10"   style="height:34px"  name="p14" > </td>
                                        <td>  <input type="text" id="limitation15" autocomplete="off"   size="10"   style="height:34px"  name="p15" > </td>
                                        <td>  <input type="text" id="limitation16" autocomplete="off"   size="10"   style="height:34px"  name="p16" > </td>
                                        <td>  <input type="text" id="limitation17" autocomplete="off"   size="10"   style="height:34px"  name="p17" > </td>
                                        <td>  <input type="text" id="limitation18" autocomplete="off"   size="10"   style="height:34px"  name="p18" > </td>
                                        <td>  <input type="text" id="limitation19" autocomplete="off"   size="10"   style="height:34px"  name="p19" > </td>
                                        <td>  <input type="text" id="limitation20" autocomplete="off"   size="10"   style="height:34px"  name="p20" > </td>
                                        <td>  <input type="text" id="limitation21" autocomplete="off"   size="10"   style="height:34px"  name="p21" > </td>
                                        <td>  <input type="text" id="limitation22" autocomplete="off"   size="10"   style="height:34px"  name="p22" > </td>
                                        <td>  <input type="text" id="limitation23" autocomplete="off"   size="10"   style="height:34px"  name="p23" > </td>
                                        <td>  <input type="text" id="limitation24" autocomplete="off"   size="10"   style="height:34px"  name="p24" > </td>
                                        <td>  <input type="text" id="limitation25" autocomplete="off"   size="10"   style="height:34px"  name="p25" > </td>
                                        <td>  <input type="text" id="limitation26" autocomplete="off"   size="10"   style="height:34px"  name="p26" > </td>
                                        <td>  <input type="text" id="limitation27" autocomplete="off"   size="10"   style="height:34px"  name="p27" > </td>
                                        <td>  <input type="text" id="limitation28" autocomplete="off"   size="10"   style="height:34px"  name="p28" > </td>
                                        <td>  <input type="text" id="limitation29" autocomplete="off"   size="10"   style="height:34px"  name="p29" > </td>
                                        <td>  <input type="text" id="limitation30" autocomplete="off"   size="10"   style="height:34px"  name="p30" > </td>
                                        <td>  <input type="text" id="limitation31" autocomplete="off"   size="10"   style="height:34px"  name="p31" > </td>
                                        <td>  <input type="text" id="limitation32" autocomplete="off"   size="10"   style="height:34px"  name="p32" > </td>
                                        <td>  <input type="text" id="limitation33" autocomplete="off"   size="10"   style="height:34px"  name="p33" > </td>
                                        <td> <input type="text" id="limitation34" autocomplete="off"   size="10"   style="height:34px"  name="p34" ></td>
                                        <tr style="text-align: center">
                                        <td>

                                            <input  class="btn btn-theme"  type="submit" value="Добавить"> </td>
                                           <td> <input id=""  class="btn btn-theme"  type="submit" value="Обновить страницу" onclick="Click()" >
                                        <?php include 'input_perfCode.php';
                                        ?>
                                        </td>
                                        <tr>
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
    perem18 = document.getElementById("limitation18");
    perem19 = document.getElementById("limitation19");
    perem20 = document.getElementById("limitation20");
    perem21 = document.getElementById("limitation21");
    perem22 = document.getElementById("limitation22");
    perem23 = document.getElementById("limitation23");
    perem24 = document.getElementById("limitation24");
    perem25 = document.getElementById("limitation25");
    perem26 = document.getElementById("limitation26");
    perem27 = document.getElementById("limitation27");
    perem28 = document.getElementById("limitation28");
    perem29 = document.getElementById("limitation29");
    perem30 = document.getElementById("limitation30");
    perem31 = document.getElementById("limitation31");
    perem32 = document.getElementById("limitation32");
    perem33 = document.getElementById("limitation33");
    perem34 = document.getElementById("limitation34");


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
    perem18.oninput = perem18.onkeydown = inputFloat;
    perem19.oninput = perem19.onkeydown = inputFloat;
    perem20.oninput = perem20.onkeydown = inputFloat;
    perem21.oninput = perem21.onkeydown = inputFloat;
    perem22.oninput = perem22.onkeydown = inputFloat;
    perem23.oninput = perem23.onkeydown = inputFloat;
    perem24.oninput = perem24.onkeydown = inputFloat;
    perem25.oninput = perem25.onkeydown = inputFloat;
    perem26.oninput = perem26.onkeydown = inputFloat;
    perem27.oninput = perem27.onkeydown = inputFloat;
    perem28.oninput = perem28.onkeydown = inputFloat;
    perem29.oninput = perem29.onkeydown = inputFloat;
    perem30.oninput = perem30.onkeydown = inputFloat;
    perem31.oninput = perem31.onkeydown = inputFloat;
    perem32.oninput = perem32.onkeydown = inputFloat;
    perem33.oninput = perem33.onkeydown = inputFloat;
    perem34.oninput = perem34.onkeydown = inputFloat;


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
