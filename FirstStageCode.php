<?php
include 'connection.php';
include 'connection_1.php';
require_once('excelphp-master/PHPExcel.php');

$Hok = array();
$step = 1000;


$Global_Profit = 0;
$H = 0;
$Hglobal=0;
$mass = array();
$mass1 = array();
$mass2 = array();
$mass22 = array();
$mass3 = array();
$mass33 = array();
$mass4 = array();
$mass44 = array();
$mass5 = array();
$mass55 = array();
$mass6 = array();
$mass66 = array();
$mass666 = array();
$mass6666 = array();
$mass7 = array();
$mass77 = array();
$chart = array();
$chart1 = array();
$chart2 = array();
$chart3 = array();
$chart4 = array();
$chart5 = array();
$chart6 = array();
$chart7 = array();
$chart8 = array();
$chart9 = array();
$chart10 = array();
$chart11 = array();

    $Hglobal = $Hglobal + $H;
    $Profit=-$array_1[0]['стоим_КР'];

    do {
        $Kc = $array[0]['Кс_А1'] - $array[0]['Кс_А2'] * $H;
        $Kp = $array[0]['Кп_А1'] - $array[0]['Кп_А2'] * $H;
        $Cmch = $array[0]['Смч_А1'] + $array[0]['Смч_А2'] * $H;
         $Kti = $array[0]['Кти_А1'] - $array[0]['Кти_А2'] * $H;
        // Пэ = Пт * Кп * Кс * Кпх
        $Operating_performance = $array[0]['Пт'] * $Kp * $Kc * $array[0]['Кпх'];
        $Ce_pr = ($Cmch * $array[0]['Кн']) / $Operating_performance;
        // П   = ( Ст     - Сепр)  *             Пт            * Кс  * Kpx  * H - Cu
        $Profit = ($array[0]['Ст'] - $Ce_pr) * $array[0]['Пт'] * $Kc * $array[0]['Кпх'] * $H - $array_1[0]['стоим_КР'];

        if ($H == 0  ) { //and (($Hglobal + $H) % $step) == 0

            $arr = $H;
            $arr1 = 0;
        }
        else {
            $arr =  $H;
            $arr1 = $Profit ;
        }
        array_push($mass, $arr);
        array_push($mass1, $arr1);

        $H = $H + 1;

        $mass2 = $H;
        $mass22 = -$Cmch*$H/$Kti;
        $mass33=$array[0]['Ст']*$array[0]['Пт']*$Kc*$array[0]['Кпх']*$H* $Kti;

        $mass4=$H;
        $mass44=$array[0]['Пт']*$Kc;
        $mass55=$array[0]['Пт']*$Kc*$Kp;

        $mass6=$H;
        $mass66=$Kti;
        $mass666=$Kp;
        $mass6666=$Kc;
    } while ($Profit <= 0);
    array_push($mass, $arr);
    array_push($mass1, $arr1);
    array_push($chart, $mass2);
    array_push($chart1, $mass22);
    array_push($chart2, $mass33);
    array_push($chart3, $mass4);
    array_push($chart4, $mass44);
    array_push($chart5, $mass55);
    array_push($chart6, $mass6);
    array_push($chart7, $mass66);
    array_push($chart8, $mass666);
    array_push($chart9, $mass6666);

    $Hok=$H ;

    for($H=$Hok;$H<6499; $H++)
    {
        $Kc = $array[0]['Кс_А1'] - $array[0]['Кс_А2'] * $H;
        $Kp = $array[0]['Кп_А1'] - $array[0]['Кп_А2'] * $H;
        $Cmch = $array[0]['Смч_А1'] + $array[0]['Смч_А2'] * $H;
        $Kti = $array[0]['Кти_А1'] - $array[0]['Кти_А2'] * $H;
        $Operating_performance = $array[0]['Пт'] * $Kp * $Kc * $array[0]['Кпх'];
        $Ce_pr = ($Cmch * $array[0]['Кн']) / $Operating_performance;
        $Profit = ($array[0]['Ст'] - $Ce_pr) * $array[0]['Пт'] * $Kc * $array[0]['Кпх'] * ($H - $Hok);

        if ($H == 0  ) { //and (($Hglobal + $H) % $step) == 0

            $arr = $H;
            $arr1 = 0;
        }
        else {
            $arr =  $H;
            $arr1 = $Profit ;
        }
        array_push($mass, $arr);
        array_push($mass1, $arr1);

        $mass2 = $H;
        $mass22 = -$Cmch*$H/$Kti;
        $mass33=$array[0]['Ст']*$array[0]['Пт']*$Kc*$array[0]['Кпх']*$H* $Kti;

        $mass4=$H;
        $mass44=$array[0]['Пт']*$Kc;
        $mass55=$array[0]['Пт']*$Kc*$Kp;

        $mass6=$H;
        $mass66=$Kti;
        $mass666=$Kp;
        $mass6666=$Kc;

        $mass7=$H;
        $mass77=$Cmch;

        array_push($mass, $arr);
        array_push($mass1, $arr1);
        array_push($chart, $mass2);
        array_push($chart1, $mass22);
        array_push($chart2, $mass33);
        array_push($chart3, $mass4);
        array_push($chart4, $mass44);
        array_push($chart5, $mass55);
        array_push($chart6, $mass6);
        array_push($chart7, $mass66);
        array_push($chart8, $mass666);
        array_push($chart9, $mass6666);
        array_push($chart10, $mass7);
        array_push($chart11, $mass77);
    }
array_push($mass, $arr);
array_push($mass1, $arr1);
array_push($chart, $mass2);
array_push($chart1, $mass22);
array_push($chart2, $mass33);
array_push($chart3, $mass4);
array_push($chart4, $mass44);
array_push($chart5, $mass55);
array_push($chart6, $mass6);
array_push($chart7, $mass66);
array_push($chart8, $mass666);
array_push($chart9, $mass6666);
array_push($chart10, $mass7);
array_push($chart11, $mass77);
    if ($H == 0  ) { //and (($Hglobal + $H) % $step) == 0

        $arr = $H;
        $arr1 = 0;
    }
    else {
        $arr =  $H;
        $arr1 = $Profit ;
    }

    $mass2 = $H;
    $mass22 = -$Cmch*$H/$Kti;
    $mass33=$array[0]['Ст']*$array[0]['Пт']*$Kc*$array[0]['Кпх']*$H* $Kti;

    $mass4=$H;
    $mass44=$array[0]['Пт']*$Kc;
    $mass55=$array[0]['Пт']*$Kc*$Kp;

    $mass6=$H;
    $mass66=$Kti;
    $mass666=$Kp;
    $mass6666=$Kc;

    $mass7=$H;
    $mass77=$Cmch;

array_push($mass, $arr);
array_push($mass1, $arr1);
array_push($chart, $mass2);
array_push($chart1, $mass22);
array_push($chart2, $mass33);
array_push($chart3, $mass4);
array_push($chart4, $mass44);
array_push($chart5, $mass55);
array_push($chart6, $mass6);
array_push($chart7, $mass66);
array_push($chart8, $mass666);
array_push($chart9, $mass6666);
array_push($chart10, $mass7);
array_push($chart11, $mass77);
?>
