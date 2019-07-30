
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
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
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <script src="lib/chart-master/Chart.js"></script>

    <link rel="stylesheet" href="ion.rangeSlider.min.css"/>
    <script src="jquery.min.js"></script>
    <script src="ion.rangeSlider.min.js"></script>
   <!-- <script src="jquery-1.7.1.min" ></script> -->
    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
    <style>
        .zakrep{
            position: fixed;
            right: 5px;
            top: 30%;
            padding: 5px;
            border: 1px solid #333;
            background: #ffe;

            width: 340px;
            ;
        }
    </style>


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
                        <li><a href="basic_table_1v.php">Basic Table</a> </li>
                        <li<a href="view_tableCmch.php">Информация о машинах</a></li>
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
                        <li><a href="morris.php">стандарт</a></li>
                        <li><a href="chartjs.php">стандарт(суммарный)</a></li>
                        <li><a href="flot_chart.php">капитальный(стандарт)</a></li>
                        <li><a href="xchart.php">капитальный(суммарный)</a></li>
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
                        <li><a href="CalcDBsite.php">Расчёт</a></li>
                        <li class="active"><a href="DbsiteCode.php">Калькулятор</a></li>

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
        <form class="wrapper" role="form" action="DBsiteCode.php" method="post">
            <div class="row ">
              <div class="col-lg-12">


                        <h4>Выберите машину</h4>

                    <select name="SelectOption" id="SelectOption1" class="form-control" style="width: 40% " onclick="calculateResult()" >     <!-- onchange="getValue()" -->
                      <option selected disabled>выберите машину</option>    <!--Экскаватор Амкодор 732 Погрузчик Амкодор 702 Каток HAMM 3414 VIO Автогрейдер Титан 8220 -->
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
                  </select>

            </div>

            </div>

            <!-- /row -->
            <!-- <form role="form" class="form-horizontal style-form" action="DBsiteCode.php" method="post">-->
            <div class="row ">
                <div class="col-lg-12">
                    <h4>Стоимость машины</h4>
                    <div class="col-lg-7">
                    <input type="text" class="js-range-slider" name="my_range" value="" />
                        <input  type="text"  id="sliders" class="js-input-from"  name="carcost"  size="10"   style="height:34px"     value="0"  onkeyup="this.value = minmax(this.value, 10000, 500000)"  />
                    </div>
                </div>
            </div>

                <div class="row ">
                    <div class="col-lg-12">
                        <h4> Зарплата машиниста перебазируемой техники</h4>
                        <div class="col-lg-7">
                            <input type="text" class="js-range-slider1" name="my_range1" value="" />
                            <input  id="sliders" type="text" class="js-input-from1" name="Zzpmash"   size="10"   style="height:34px"     value="0" onkeyup="this.value = minmax(this.value, 10, 1000)"  />

                        </div>
                    </div>
                </div>

            <div class="row ">
                <div class="col-lg-12">
                    <h4> Стоимость топлива</h4>
                    <div class="col-lg-7">
                        <input type='button' value='-' class='qtyminus' field='quantity'  />

                        <input  id="sliders" type='text' name='quantity' value='1.67' class="qty" />
                        <input type='button' value='+' class='qtyplus' field='quantity' />
                    </div>
                </div>
            </div>

            <div class="row mt">
                <label class="col-sm-4 text-center"  style="font-size: 14px">Затраты на машину техпомощи </label>
                <label class="col-sm-4 text-center"  style="font-size: 14px">Затраты на тягач </label>
            </div>
            <div class="row mt" style="margin-top: 12px">

                <!--  <label class="col-lg-2"  > Затраты на машину техпомощи</label>-->
                    <div class="col-sm-4 text-center">
                        <input type='button' value='-' class='qtyminus1' field='quantity1'  />
                        <input type='text' name='quantity1' value='0' class='qty1' />
                        <input type='button' value='+' class='qtyplus1' field='quantity1' />
                    </div>


                <!-- <span> Затраты на тягач<>-->
                      <div class="col-sm-4 text-center">
                          <input type='button' value='-' class='qtyminus2' field='quantity2'  />
                          <input type='text' name='quantity2' value='0' class='qty2' />
                          <input type='button' value='+' class='qtyplus2' field='quantity2' />
                      </div>
            </div>
                <div class="row mt" >
                    <label class="col-sm-4 text-center"  style="font-size: 14px">Затраты на прицеп </label>
                    <label class="col-sm-4 text-center"  style="font-size: 14px">Затраты на кран </label>
                </div>
              <!--   <label > Затраты на прицеп</label>-->
                <div class="row mt" style="margin-top: 12px">
              <div class="col-sm-4 text-center">
                    <input type='button' value='-' class='qtyminus3' field='quantity3'  />
                    <input type='text' name='quantity3' value='0' class='qty3' />
                    <input type='button' value='+' class='qtyplus3' field='quantity3' />
                </div>

                <div class="col-sm-4 text-center">
                    <input type='button' value='-' class='qtyminus4' field='quantity4'  />
                    <input type='text' name='quantity4' value='0' class='qty4' />
                    <input type='button' value='+' class='qtyplus4' field='quantity4' />
                </div>
            </div>

      </div>
            <div class="row mt">
                <div class="col-lg-12">

                    <div class="col-lg-7">
                        <h4>
                            <input type="checkbox" value="" id="Kr">
                         Учитывать капитальный ремонт
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <h4> Зарплата рабочих, занятых погрузкой-разгрузкой</h4>
                    <div class="col-lg-7">
                        <input type="text" class="js-range-slider2" name="my_range2" value="" />
                        <input  id="sliders" type="text" class="js-input-from2" name="Zr"   size="10"   style="height:34px"     value="0" onkeyup="this.value = minmax(this.value, 10, 1000)"  />

                    </div>
                </div>
            </div>

            <div class="checkbox" style="font-size: 15px">
                <label>
                    <input type="checkbox" value="" id="Dp">
                    Начисления дополнительного отпуска
                </label>
            </div>
            <div class="checkbox" style="font-size: 15px">
                <label>
                    <input type="checkbox" value="" id="Vl">
                    Выплаты за выслугу лет
                </label>
            </div>
            <div class="checkbox" style="font-size: 15px">
                <label>
                    <input type="checkbox" value="" id="iif">
                    Отчисления в инновационный фонд
                </label>
            </div>

            <div class="checkbox" style="font-size: 15px">
                <label>
                    <input type="checkbox" value="" id="Ssoc" >
                    Отчисления на социальное страхование
                </label>
            </div>
            <div class="checkbox" style="font-size: 15px">
                <label>
                    <input type="checkbox" value=" " id="Cx" >
                    С/х налог
                </label>
            </div>
            <div class="checkbox" style="font-size: 15px">
                <label>
                    <input type="checkbox" value=" " id="Nds" >
                    НДС
                </label>
            </div>

          <div class="row ">
              <div class="zakrep">
                  <h2 id="time">СМЧ - <label id="cmch">0</label> </h2>
                  <h2 id="time">ПРЦ - <label id="prc"></label> </h2>
                  <h2 id="time">ПРЦ с налогами - <label id="prc_tax"></label> </h2>
              </div>
          </div>
        </form>
  </section>
</section>
<!--main content end-->


</section>
<!-- js placed at the end of the document so the pages load faster -->



<script>
    $(".js-range-slider").ionRangeSlider(
        {
            type: "single",
            skin: "big",
            min: 10000,
            max: 500000,
            from: 0,
            grid: true,
            grid_num: 10,
            postfix: 'RUB',
            onStart: updateInputs,
            onChange: updateInputs
        }
    );

    var my_range = $(".js-range-slider").data("ionRangeSlider");

    function updateInputs (data) {
        from = data.from;
        $(".js-input-from").prop("value", from);
        $("#sliders").trigger('change');

    }
    $(".js-input-from").on("input", function () {
        var val = $(this).prop("value");

        my_range.update({
            from: val
        });

    });

    $(".js-range-slider1").ionRangeSlider(
        {
            type: "single",
            skin: "big",
            min: 10,
            max: 1000,
            from: 0,
            grid: true,
            grid_num: 10,

            postfix: 'RUB',
            onStart: updateInputs1,
            onChange: updateInputs1
        }
    );

    var my_range1 = $(".js-range-slider1").data("ionRangeSlider");

    function updateInputs1 (data) {
        from = data.from;
        $(".js-input-from1").prop("value", from);
        $("#sliders").trigger('change');
    }
    $(".js-input-from1").on("input", function () {
        var val1 = $(this).prop("value");

        my_range1.update({
            from: val1
        });

    });

    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseFloat($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 0.01);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();
    });


    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseFloat($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 0.01);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();
    });

    $('.qtyplus1').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();
    });

    $(".qtyminus1").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();
    });

    $('.qtyplus2').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    calculateResult();

    $(".qtyminus2").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();
    });

    $('.qtyplus3').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();
    });

    $(".qtyminus3").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();
    });
    $('.qtyplus4').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();
    });

    $(".qtyminus4").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
        calculateResult();

    });


    $(".js-range-slider2").ionRangeSlider(
        {
            type: "single",
            skin: "big",
            min: 10,
            max: 1000,
            from: 0,
            grid: true,
            grid_num: 10,

            postfix: 'RUB',
            onStart: updateInputs2,
            onChange: updateInputs2
        }
    );

    var my_range2 = $(".js-range-slider2").data("ionRangeSlider");

    function updateInputs2 (data) {
        from = data.from;
        $(".js-input-from2").prop("value", from);
        $("#sliders").trigger('change');
    }
    $(".js-input-from2").on("input", function () {
        var val2 = $(this).prop("value");

        my_range2.update({
            from: val2
        });

    });


    $("#sliders").change(function() {
        calculateResult();
    });

   /* $(".js-input-from1").change(function() {
        calculateResult();
    }); */

    check1=document.getElementById("Dp");
    check1.addEventListener('change', calculateResult);
    check2=document.getElementById("Vl");
    check2.addEventListener('change', calculateResult);
    check3=document.getElementById("iif");
    check3.addEventListener('change', calculateResult);
    check4=document.getElementById("Ssoc");
    check4.addEventListener('change', calculateResult);
    check5=document.getElementById("Cx");
    check5.addEventListener('change', calculateResult);
    check6=document.getElementById("Nds");
    check6.addEventListener('change', calculateResult);
    check7=document.getElementById("Kr");
    check7.addEventListener('change', calculateResult);


    function calculateResult() {

        if((Number(document.getElementsByName("SelectOption")[0].value))==1){
            var Tch=1696;

            var Kso = 0.22;
            var Ztzar=0.16;
            var Zmat=0.86;
            var Kmat=2.6;
        }
        if((Number(document.getElementsByName("SelectOption")[0].value))==2){
            var Tch=1696;

            var Kso = 0.22;
            var Ztzar=0.15;
            var Zmat=1.06;
            var Kmat=3.47;
        }
        if((Number(document.getElementsByName("SelectOption")[0].value))==3){
            var Tch=1802;

            var Kso = 0.19;
            var Ttor=0.33;
            var Ztzar=0.13;
            var Zmat=0.29;
            var Kmat=1.04;
        }
        if((Number(document.getElementsByName("SelectOption")[0].value))==4){
            var Tch=1785;

            var Kso = 0.19;
            var Ttor=0.35;
            var Ztzar=0.15;
            var Zmat=0.57;
            var Kmat=1.9
        }


        var carcost =Number(document.getElementsByName("carcost")[0].value);
        var costtractor=Number(document.getElementsByName("quantity1")[0].value);
        var Zzpmash = Number(document.getElementsByName("Zzpmash")[0].value);

        var Zztg=Number(document.getElementsByName("quantity2")[0].value);
        var Zzpr=Number(document.getElementsByName("quantity3")[0].value);
        var Zzkr=Number(document.getElementsByName("quantity4")[0].value);
        var Zr = Number(document.getElementsByName("Zr")[0].value);
         var fuelcost = Number(document.getElementsByName("quantity")[0].value);

         var Za=(carcost*12.5*1)/(Tch*100);
         var Zzp = 0.41;
        var Ze=((2*20*6)/(100*(8-20/11.2)) + 4.6)*fuelcost *1.12;
        var Zen=Ze*(1+Kso);
        var Zmpt=costtractor/5760*615;

        var Zkrzar=0;
        var Zkrmat=0;
        var Zkr=0;
        var checkbox6=document.getElementById("Kr");
        if(checkbox6.checked == true){
             Zkrzar=0.05;
             Zkrmat=Zkrzar*Kmat*1.91*1.07;
             Zkr=1.1*(Zkrzar+Zkrmat+Zztg/5760);
        } else {Zkr=0}


        var Zto=1.1*(Ztzar+Zmat+Zmpt)+Zkr;
        var Zzpm=Zzpmash/8*(20/11.2*2 + 20/25*1 + 0.8/2);
        var Zmc=costtractor*((20/11.2+20/25)*2+0.8/2);
        var Ztg=Zztg*((20/11.2+20/25)*2+0.8/2);
        var Zpr=Zzpr*((20/11.2+20/25)*2+0.8/2);
        var Zkran=Zzkr*((20/11.2+20/20)*2+0.8/2);
        var Zzr=Zr/8*2*((20/11.2+20/25)*2+0.8/2);
        var Zpm=1*(Zzpm+Zmc+Ztg+Zpr+Zkran+Zzr);
        var Zpb=Zpm*10/Tch;
        var Zos=0;
        var Cmch=Za+Zzp+Zen+Zto+Zpb+Zos;

        var Hr=0.03;
        var Pn=0.04;
        var Dp=0;
        var Vl=0;
        var Ssoc=0;
        var Iif=0;
        var Cx=0;
        var H=0;
        var Prc=0;
        var checkbox1=document.getElementById("Dp");
        if(checkbox1.checked == true){
             Dp=0.04;
        } else  {Dp=0 }
        var checkbox2=document.getElementById("Vl");
        if(checkbox2.checked == true){
             Vl=0.05;
        } else  {Vl=0 }
        var Sns=(Ztzar+Zzp+Zzpm+0.01+0.01+Zkrzar)*0.6/100;
        var Pz=Dp+Vl+Sns;
        var checkbox3=document.getElementById("iif");
        if(checkbox3.checked == true){
             Iif=(Cmch+Hr+Pn)*0.25/100;
        } else  {Iif=0}

        var checkbox4=document.getElementById("Ssoc");
        if(checkbox4.checked ==true){
             Ssoc=(Zzp+Ztzar+Zzpm+Zkrzar)*34/100;  //Zzpmash
        } else  {Ssoc=0}
        var checkbox5=document.getElementById("Cx");
        if(checkbox5.checked == true){
             Cx=(Zzp+Ztzar+Zzpm+Zkrzar)*2/100;
        } else {Cx=0}
         H=Iif+Ssoc+Cx;
         Prc=Cmch+Hr+Pn+Pz+H;

         var Ep=Prc*3/97;
         var Nds=0;
        var checkbox6=document.getElementById("Nds");
        if(checkbox6.checked == true){
            Nds=(Prc+Ep)*18/100;
        } else {Nds=0}

        var Prc_tax =Prc+Ep+Nds;

        document.getElementById('cmch').innerHTML=Cmch.toFixed(2);
        document.getElementById('prc').innerHTML=Prc.toFixed(2);
        document.getElementById('prc_tax').innerHTML=Prc_tax.toFixed(2);
    }

</script>
<script>
    function minmax(value, min, max)
    {
        if(parseInt(value) < min || isNaN(parseInt(value)))
            return min;
        else if(parseInt(value) > max)
            return max;
        else return value;
    }
</script>



<script>
    /*
        $("#SelectOption1").change(function() {

            var perem=$(this).val();

            const sql = require('mssql');
            var config = {
                userName: 'DESKTOP-0F1BV3M\\roma',
                password: '',
                server: 'DESKTOP-0F1BV3M\\SQLKYRS',
                database: 'BDsite'

            };
            var connection = new Connection(config);
            connection.on('connect', function(err) {
                // If no error, then good to proceed.
                console.log("Connected");
                executeStatement();
            });




        });
     */



</script>


<!--<script src="lib/jquery/jquery.min.js"></script> -->

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="lib/gritter-conf.js"></script>
<!--script for this page-->
<script src="lib/sparkline-chart.js"></script>
<script src="lib/zabuto_calendar.js"></script>

</body>

</html>
