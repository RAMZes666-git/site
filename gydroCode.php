<?php

include 'connection.php';
include 'connection_1.php';
require_once('excelphp-master/PHPExcel.php');
$Count1= $_REQUEST['gydro'];
if( empty($Count1) ){
    $Count1=2;
} else $Count1= $_REQUEST['gydro'];


$titls = array(
    array('name' => 'Н', 'cell' => 'A'),
    array('name' => 'Кп', 'cell' => 'B'),
    array('name' => 'Кc', 'cell' => 'C'),
    array('name' => 'Кпх', 'cell' => 'D'),
    array('name' => 'Пт', 'cell' => 'E'),
    array('name' => 'Пэ', 'cell' => 'F'),
    array('name' => 'Смч', 'cell' => 'G'),
    array('name' => 'Сепр', 'cell' => 'H'),
    array('name' => 'Ст-Сепр', 'cell' => 'I'),
    array('name' => 'П', 'cell' => 'J'),
);
$phpexcel = new PHPExcel();
for ($j = 0; $j < count($titls); $j++) {
    $string = $titls[$j]['name'];
    //$string=mb_convert_encoding($string);
    $cellletter = $titls[$j]['cell'] . 1;
    $phpexcel->getActiveSheet()->setCellValueExplicit($cellletter, $string, PHPExcel_Cell_DataType::TYPE_STRING);
}


$Hok = array();
$step = 1000;
$H=0;
$smeschenie_osi_Y=0;
$Global_Profit = 0;
$Hopt=0;
$Hglobal=0;
$mass = array();
$mass1 = array();

for ($i = 0; $i < 4; $i++) {
    $Hglobal = $Hglobal + $H;
    $H = 0;

    $Profit=-$array_1[$i]['стоим_КР'];

    do {
        $Kc = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * $H;
        $Kp = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * $H;
        $Cmch = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * $H;
        // Пэ = Пт * Кп * Кс * Кпх
        $Operating_performance = $array[$i]['Пт'] * $Kp * $Kc * $array[$i]['Кпх'];
        $Ce_pr = ($Cmch * $array[$i]['Кн']) / $Operating_performance;
        // П   = ( Ст     - Сепр)  *             Пт            * Кс  * Kpx  * H - Cu
        $Profit = ($array[$i]['Ст'] - $Ce_pr) * $array[$i]['Пт'] * $Kc * $array[$i]['Кпх'] * $H - $array_1[$i]['стоим_КР'];


        if ($H == 0  ) { //and (($Hglobal + $H) % $step) == 0

                $arr = $Hglobal + $H;
                $arr1 = 0;
            }
        else {
            $arr = $Hglobal + $H;
            $arr1 = $Profit+$smeschenie_osi_Y;
        }
        array_push($mass, $arr);
        array_push($mass1, $arr1);

        $H = $H + 1;
    } while ($Profit <= 0);
    array_push($mass, $arr);
   array_push($mass1, $arr1);

    echo 'H=' . $Hglobal . '  Hok=' . $H . ' П=' . $Profit . '</br>';


    array_push($Hok, $H );

    $Profit_1 = 0;

    while ( $Profit >= $Profit_1) {
        $Kc1 = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * ($H-1);
        $Kp1 = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * ($H-1);
        $Cmch1 = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * ($H-1);

        $Operating_performance1 = $array[$i]['Пт'] * $Kp1 * $Kc1 * $array[$i]['Кпх'];
        $Ce_pr1 = ($Cmch1 * $array[$i]['Кн']) / $Operating_performance1;
        $Profit_1 = ($array[$i]['Ст'] - $Ce_pr1) * $array[$i]['Пт'] * $Kc1 * $array[$i]['Кпх'] * ($H-1 - $Hok[$i]);

        $Kc = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * $H;
        $Kp = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * $H;
        $Cmch = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * $H;

        $Operating_performance = $array[$i]['Пт'] * $Kp * $Kc * $array[$i]['Кпх'];
        $Ce_pr = ($Cmch * $array[$i]['Кн']) / $Operating_performance;
        $Profit = ($array[$i]['Ст'] - $Ce_pr) * $array[$i]['Пт'] * $Kc * $array[$i]['Кпх'] * ($H - $Hok[$i]);

        $arr = $Hglobal + $H;
        $arr1 = $Profit +$smeschenie_osi_Y;

        array_push($mass, $arr);
        array_push($mass1, $arr1);

        $H = $H + 1;
    }
    array_push($mass, $arr);
    array_push($mass1, $arr1);


    echo 'Hglobal=' . $Hglobal . '  Hопт=' . $H . ' П=' . $Profit . '</br>';
    $arr = $Hglobal + $H;
    $arr1 = $Profit ;
    array_push($mass, $arr);
    array_push($mass1, $arr1);
    $arr = $Hglobal + $H;
     $arr1 = 0 ;
     array_push($mass, $arr);
     array_push($mass1, $arr1);
  //$smeschenie_osi_Y = $Profit + $smeschenie_osi_Y;
    $Hopt=$H;
    $Global_Profit = $Global_Profit + $Profit;

    do{
        $Kc = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * ($H-$Hopt);
        $Kp = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * $H;
        $Cmch = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * $H;

        $Operating_performance = $array[$i]['Пт'] * $Kp * $Kc * $array[$i]['Кпх'];
        $Ce_pr = ($Cmch * $array[$i]['Кн']) / $Operating_performance;
        $Profit = ($array[$i]['Ст'] - $Ce_pr) * $array[$i]['Пт'] * $Kc * $array[$i]['Кпх'] * ($H-$Hopt) -$array_1[$i]['стоим_КР_гидр'];
        $arr = $Hglobal + $H;
        $arr1 = $Profit +$smeschenie_osi_Y;
        array_push($mass, $arr);
        array_push($mass1, $arr1);

        $H=$H+1;
    }while($Profit<=0);
   array_push($mass, $arr);
    array_push($mass1, $arr1);
    echo 'Hglobal=' . $Hglobal . '  Hok=' . $H . ' П=' . $Profit . '</br>';

    array_push($Hok, $H );
   // $Profit_1=0;

    while ($Profit>$Profit_1){
        $Kc1 = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * ($H-$Hopt-1);
        $Kp1 = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * ($H-1);
        $Cmch1 = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * ($H-1);
        $Operating_performance1 = $array[$i]['Пт'] * $Kp1 * $Kc1 * $array[$i]['Кпх'];
        $Ce_pr1 = ($Cmch1 * $array[$i]['Кн']) / $Operating_performance1;
        $Profit_1 = ($array[$i]['Ст'] - $Ce_pr1) * $array[$i]['Пт'] * $Kc1 * $array[$i]['Кпх'] * ($H-1-$Hok[$i]);

        $Kc = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * ($H-$Hopt);
        $Kp = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * $H;
        $Cmch = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * $H;
        $Operating_performance = $array[$i]['Пт'] * $Kp * $Kc * $array[$i]['Кпх'];
        $Ce_pr = ($Cmch * $array[$i]['Кн']) / $Operating_performance;
        $Profit = ($array[$i]['Ст'] - $Ce_pr) * $array[$i]['Пт'] * $Kc * $array[$i]['Кпх'] * ($H-$Hok[$i]);

        $arr = $Hglobal + $H;
        $arr1 = $Profit+ $smeschenie_osi_Y ;
        array_push($mass, $arr);
        array_push($mass1, $arr1);

        $H=$H+1;
    }
    array_push($mass, $arr);
    array_push($mass1, $arr1);
    echo 'Hglobal=' . $Hglobal . '  Hопт=' . $H . ' П=' . $Profit . '</br>';

    $arr = $Hglobal + $H;
    $arr1 = $Profit ;
    array_push($mass, $arr);
    array_push($mass1, $arr1);
    $arr = $Hglobal + $H;
     $arr1 = 0 ;
     array_push($mass, $arr);
     array_push($mass1, $arr1);
   //$smeschenie_osi_Y = $Profit + $smeschenie_osi_Y;
    $Hopt=$H;
    $Global_Profit = $Global_Profit + $Profit;
}
array_push($mass, $arr);
array_push($mass1, $arr1);


echo 'П. ' . ($Global_Profit - $array_1[0]['стоим_КР']) . 'руб.' . '</br>';
echo 'H= ' . ($Hglobal + $H) . 'моточас ' . '</br>';
echo 'П на 1 мтч ' . (($Global_Profit - $array_1[0]['стоим_КР']) / ($Hglobal + $H)) . ' руб/моточас ' . '</br>';
echo 'Global_Profit = ' . $Global_Profit;

?>

