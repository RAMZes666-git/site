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
                        <li> <a href="form_deletePerf.php">Удалить экспл. хар-ки</a></li>
                        <li> <a href="form_deleteEconom.php">Удалить эконом. хар-ки</a></li>
                        <li class="active"> <a href="actual_values.php">Информ. о фактич. знач.</a></li>


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

                <div class="row mt" style="margin-right: -3600px">

                    <div class="col-lg-12 ">
                        <div class="content-panel">
                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <h4><i class="fa fa-angle-right"></i>Фактические значения</h4>

                                    <thead>

                                    <tr>
                                        <th style="text-align: center ; vertical-align: middle">№</th>
                                        <th style="text-align: center ; vertical-align: middle">Дата проведения расчёта</th>
                                        <th style="text-align: center ; vertical-align: middle">Марка машины</th>
                                        <th style="text-align: center ; vertical-align: middle">Годовой режим работы СДМ</th>
                                        <th style="text-align: center ; vertical-align: middle">Амортизационные отчисления, приходящиеся на один час эксплуатации</th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на оплату и стимулирование труда машинистов</th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на энергоносители, смазочные и сопутствующие материалы</th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на заработную плату ремонтных рабочих</th>
                                        <th style="text-align: center ; vertical-align: middle"> Затраты на запасные части и ремонтные материалы</th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на машину технической помощи для проведения ТО вне ремонтной базы (на объекте) </th>
                                        <th style="text-align: center ; vertical-align: middle">Определение затрат, приходящихся на один машиночас, для строительной техники, перебазируемой спецсредствами </th>
                                        <th style="text-align: center ; vertical-align: middle"> Затраты на капремонт</th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на техническое обслуживание, текущий и капитальный ремонты </th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на перебазирование строительной техники спецсредствами</th>
                                        <th style="text-align: center ; vertical-align: middle"> Затраты на заработную плату машиниста перебазируемой техники за время перебазирования</th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на машину сопровождения</th>
                                        <th style="text-align: center ; vertical-align: middle"> Затраты на тягач </th>
                                        <th style="text-align: center ; vertical-align: middle">  Затраты на прицеп или трейлер </th>
                                        <th style="text-align: center ; vertical-align: middle"> Затраты на кран </th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на оплату труда рабочих, занятых погрузкой-разгрузкой перебазируемой техники </th>
                                        <th style="text-align: center ; vertical-align: middle">Затраты на сменную оснастку  </th>
                                        <th style="text-align: center ; vertical-align: middle">Себестоимость машиночаса</th>
                                        <th style="text-align: center ; vertical-align: middle"> Накладные расходы</th>
                                        <th style="text-align: center ; vertical-align: middle">Заработная плата в накладных расходах</th>
                                        <th style="text-align: center ; vertical-align: middle"> Плановые накопления </th>
                                        <th style="text-align: center ; vertical-align: middle"> Заработная плата в плановых накоплениях</th>
                                        <th style="text-align: center ; vertical-align: middle"> Начисления дополнительного отпуска </th>
                                        <th style="text-align: center ; vertical-align: middle">  Выплаты за выслугу лет</th>
                                        <th style="text-align: center ; vertical-align: middle"> Обязательное страхование от несчастных случаев</th>
                                        <th style="text-align: center ; vertical-align: middle"> Прочие затраты</th>
                                        <th style="text-align: center ; vertical-align: middle"> Отчисления в инновационный фонд </th>
                                        <th style="text-align: center ; vertical-align: middle">Отчисления на соц. страхование </th>
                                        <th style="text-align: center ; vertical-align: middle">  С/х налог</th>
                                        <th style="text-align: center ; vertical-align: middle"> Налоги и отчисления </th>
                                        <th style="text-align: center ; vertical-align: middle"> Планово-расчетная цена машиночаса </th>
                                        <th style="text-align: center ; vertical-align: middle">Единый платёж в местные целевые бюджетные и республиканские фонды </th>
                                        <th style="text-align: center ; vertical-align: middle">  НДС</th>
                                        <th style="text-align: center ; vertical-align: middle"> Планово-расчетная цена машиночаса с налогами</th>



                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    require_once 'connectSQL.php';


                                    IF( $conn ) {
                                        $result = sqlsrv_query($conn, "SELECT  * FROM actual_values ");
                                        while ($myrow = sqlsrv_fetch_array($result)) { ?>
                                            <tr style="text-align: center">
                                                <td> <?php echo $myrow[0]?> </td>
                                                <td> <?php  $myrow[1]=$myrow[1]->format('d/m/Y'); echo $myrow[1] ?> </td>
                                                <?php for($i=2;$i<38;$i++){ ?>
                                                <td> <?php echo $myrow[$i]?> </td>
                                                <?php  }?>
                                            </tr>
                                        <?php }
                                    }
                                    ELSE
                                    {
                                        echo "Connection could not be established.\n";
                                        DIE(print_r(sqlsrv_errors(), true));
                                    }

                                    ?>

                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>



                                </tbody>
                            </table>
        </section>
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