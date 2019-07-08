<?php


include 'connection.php';
include 'connection_1.php';
require_once('excelphp-master/PHPExcel.php');

$Count1= $_REQUEST['sum'];
if( empty($Count1) ){
    $Count1=4;
} else $Count1= $_REQUEST['sum'];

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


$Global_Profit = 0;


$mass = array();
$mass1 = array();

for ($i = 0; $i < $Count1; $i++) {
    $Hglobal = $Hglobal + $H;
    $H = 0;

    $Profit=-$array_1[$i]['стоим_КР'];
    echo 'Hglobal=' . $Hglobal . '  H=' . $H . ' П=' . $Profit . '</br>';
    do {
        $Kc = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * $H;
        $Kp = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * $H;
        $Cmch = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * $H;
        // Пэ = Пт * Кп * Кс * Кпх
        $Operating_performance = $array[$i]['Пт'] * $Kp * $Kc * $array[$i]['Кпх'];
        $Ce_pr = ($Cmch * $array[$i]['Кн']) / $Operating_performance;
        // П   = ( Ст     - Сепр)  *             Пт            * Кс  * Kpx  * H - Cu
        $Profit = ($array[$i]['Ст'] - $Ce_pr) * $array[$i]['Пт'] * $Kc * $array[$i]['Кпх'] * $H - $array_1[$i]['стоим_КР'];
        $data = array(
            array('Hgl+H' => $Hglobal + $H, 'Kp' => $Kp, 'Kc' => $Kc, 'Кпх' => $array[$i]['Кпх'], 'Пт' => $array[$i]['Пт'], 'Operating_performance' => $Operating_performance, 'Cmch' => $Cmch, 'Ce_pr*Kn' => ($Ce_pr * $array[$i]['Кн']), 'Ст-$Ce_pr' => ($array[$i]['Ст'] - $Ce_pr), 'Profit' => $Profit)
        );

        if ((($Hglobal + $H) % $step) == 0) {

            $j = 2;
            foreach ($data as $row) {
                $phpexcel->getActiveSheet()->setCellValue("A$j", $row['Hgl+H']);
                $phpexcel->getActiveSheet()->setCellValue("B$j", $row['Kp']);
                $phpexcel->getActiveSheet()->setCellValue("C$j", $row['Kc']);
                $phpexcel->getActiveSheet()->setCellValue("D$j", $row['Кпх']);
                $phpexcel->getActiveSheet()->setCellValue("E$j", $row['Пт']);
                $phpexcel->getActiveSheet()->setCellValue("F$j", $row['Operating_performance']);
                $phpexcel->getActiveSheet()->setCellValue("G$j", $row['Cmch']);
                $phpexcel->getActiveSheet()->setCellValue("H$j", $row['Ce_pr*Kn']);
                $phpexcel->getActiveSheet()->setCellValue("I$j", $row['Ст-$Ce_pr']);
                $phpexcel->getActiveSheet()->setCellValue("J$j", $row['Profit']);
                $j++;

            }
            $page = $phpexcel->setActiveSheetIndex();
            $page->setTitle("file");
            $objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            $filename = 'file.xlsx';
            if (file_exists($filename)) {
                unlink($filename);
            }
            $objWriter->save($filename);

        }
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

        $H = $H + 1;
    } while ($Profit <= 0);
    array_push($mass, $arr);
    array_push($mass1, $arr1);

    echo 'Hglobal=' . $Hglobal . '  Hok=' . $H . ' П=' . $Profit . '</br>';

    // $Hok[$i] = $H;
    array_push($Hok, $H );

    $Profit_1 = $Profit - 1;

    while ($Profit_1 < $Profit or $Profit == 0) {
        $Kc = $array[$i]['Кс_А1'] - $array[$i]['Кс_А2'] * $H;
        $Kp = $array[$i]['Кп_А1'] - $array[$i]['Кп_А2'] * $H;
        $Cmch = $array[$i]['Смч_А1'] + $array[$i]['Смч_А2'] * $H;
        $Kti = $array[$i]['Кти_А1'] - $array[$i]['Кти_А2'] * $H;
        $Operating_performance = $array[$i]['Пт'] * $Kp * $Kc * $array[$i]['Кпх'];
        $Ce_pr = ($Cmch * $array[$i]['Кн']) / $Operating_performance;
        $Profit_1 = $Profit;
        $Profit = ($array[$i]['Ст'] - $Ce_pr) * $array[$i]['Пт'] * $Kc * $array[$i]['Кпх'] * ($H - $Hok[$i]);

        if ((($Hglobal + $H) % $step) == 0) {
            $data = array(
                array('Hgl+H' => $Hglobal + $H, 'Kp' => $Kp, 'Kc' => $Kc, 'Кпх' => $array[$i]['Кпх'], 'Пт' => $array[$i]['Пт'], 'Operating_performance' => $Operating_performance, 'Cmch' => $Cmch, 'Ce_pr*Kn' => ($Ce_pr * $array[$i]['Кн']), 'Ст-$Ce_pr' => ($array[$i]['Ст'] - $Ce_pr), 'Profit' => $Profit)
            );

            foreach ($data as $row) {
                $phpexcel->getActiveSheet()->setCellValue("A$j", $row['Hgl+H']);
                $phpexcel->getActiveSheet()->setCellValue("B$j", $row['Kp']);
                $phpexcel->getActiveSheet()->setCellValue("C$j", $row['Kc']);
                $phpexcel->getActiveSheet()->setCellValue("D$j", $row['Кпх']);
                $phpexcel->getActiveSheet()->setCellValue("E$j", $row['Пт']);
                $phpexcel->getActiveSheet()->setCellValue("F$j", $row['Operating_performance']);
                $phpexcel->getActiveSheet()->setCellValue("G$j", $row['Cmch']);
                $phpexcel->getActiveSheet()->setCellValue("H$j", $row['Ce_pr*Kn']);
                $phpexcel->getActiveSheet()->setCellValue("I$j", $row['Ст-$Ce_pr']);
                $phpexcel->getActiveSheet()->setCellValue("J$j", $row['Profit']);
                $j++;
            }
            $page = $phpexcel->setActiveSheetIndex();
            $page->setTitle("file");
            $objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            $filename = 'file.xlsx';
            if (file_exists($filename)) {
                unlink($filename);
            }
            $objWriter->save($filename);

        }

        $arr = $Hglobal + $H;
        $arr1 = $Profit+$smeschenie_osi_Y ;
        array_push($mass, $arr);
        array_push($mass1, $arr1);

        $H = $H + 1;
    }
    array_push($mass, $arr);
    array_push($mass1, $arr1);


    $smeschenie_osi_Y = $Profit + $smeschenie_osi_Y;

    $Global_Profit = $Global_Profit + $Profit;
    echo 'Hglobal=' . $Hglobal . '  H=' . $H . ' П=' . $Profit . '</br>';

}
array_push($mass, $arr);
array_push($mass1, $arr1);

echo 'П. ' . ($Global_Profit - $array_1[$i]['стоим_КР']) . 'руб.' . '</br>';
echo 'H= ' . ($Hglobal + $H) . 'моточас ' . '</br>';
echo 'П на 1 мтч ' . (($Global_Profit - $array_1[$i]['стоим_КР']) / ($Hglobal + $H)) . ' руб/моточас ' . '</br>';
echo 'Global_Profit = ' . $Global_Profit;

?>

