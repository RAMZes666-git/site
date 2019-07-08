<?php

include 'connection.php';
include 'connection_1.php';
require_once('excelphp-master/PHPExcel.php');

$step=1000;
$H_finish=array(5500,4500,3500,3000);
$Global_Profit=0;
$H=0;
$Hglobal=0;
$CountKp = 4;
$mass = array();
$mass1 = array();
$Hok = array();
for($i=0; $i<$CountKp; $i++)
{
    $Hglobal=$Hglobal+$H;
    $H=0;
    $Profit=-$array_1[$i]['стоим_КР'];
    echo 'Hglobal='.$Hglobal.'  H='.$H.' П='.$Profit.'</br>';
    do
    {
        $Kc = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * $H;
        $Kp = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * $H;
        $Cmch = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * $H;
        // Пэ = Пт * Кп * Кс * Кпх
        $Operating_performance = $array[$i]['Пт'] * $Kp * $Kc * $array[$i]['Кпх'];
        $Ce_pr = ($Cmch * $array[$i]['Кн']) / $Operating_performance;
        // П   = ( Ст     - Сепр)  *             Пт            * Кс  * Kpx  * H - Cu
        $Profit = ($array[$i]['Ст'] - $Ce_pr) * $array[$i]['Пт'] * $Kc * $array[$i]['Кпх'] * $H - $array_1[$i]['стоим_КР'];

        if ($H == 0  ) { //and (($Hglobal + $H) % $step) == 0

            $arr = ($Hglobal + $H);
            $arr1 = $Profit +$smeschenie_osi_Y;
        }
        else {
            $arr = $Hglobal + $H;
            $arr1 = $Profit +$smeschenie_osi_Y;
        }
        array_push($mass, $arr);
        array_push($mass1, $arr1);

        $H=$H+1;
    }while($Profit<=0 or $H > $H_finish[$i]-1);

    echo 'Hglobal='.$Hglobal.'  Hok='.$H.' П='.$Profit.'</br>';


    array_push($Hok, $H );

    for($H=$Hok[$i];$H<$H_finish[$i]-1; $H++)
    {
        $Kc = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * $H;
        $Kp = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * $H;
        $Cmch = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * $H;
        $Kti = $array[$i]['Кти_А1'] - $array[$i]['Кти_А2'] * $H;
        $Operating_performance = $array[$i]['Пт'] * $Kp * $Kc * $array[$i]['Кпх'];
        $Ce_pr = ($Cmch * $array[$i]['Кн']) / $Operating_performance;
        $Profit = ($array[$i]['Ст'] - $Ce_pr) * $array[$i]['Пт'] * $Kc * $array[$i]['Кпх'] * ($H - $Hok[$i]);

        $arr = $Hglobal + $H;
        $arr1 = $Profit+$smeschenie_osi_Y ;
        array_push($mass, $arr);
        array_push($mass1, $arr1);
    }
    array_push($mass, $arr);
    array_push($mass1, $arr1);

    $smeschenie_osi_Y = $Profit + $smeschenie_osi_Y;
    $Global_Profit = $Global_Profit+$Profit;
    echo 'Hglobal='.$Hglobal.'  H='.$H.' П='.$Profit.'</br>';
}

array_push($mass, $arr);
array_push($mass1, $arr1);



echo 'П. ' . ($Global_Profit - $array_1[0]['стоим_КР']) . 'руб.' . '</br>';
echo 'H= ' . ($Hglobal + $H) . 'моточас ' . '</br>';
echo 'П на 1 мтч ' . (($Global_Profit - $array_1[0]['стоим_КР']) / ($Hglobal + $H)) . ' руб/моточас ' . '</br>';
echo 'Global_Profit = ' . $Global_Profit;
?>