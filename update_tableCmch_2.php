<?php

$id_brand=$_REQUEST['id_brand2'];
$perem=$_REQUEST['peremnay2'];

$znach=$_REQUEST['znach2'];



$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
IF( $conn ) {


    if($perem==3){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [average discharge of machinists]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==4){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [book value of equipment, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==5){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [annual rate of depreciation,%]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==6){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [estimated salary in base year prices]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==7){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [price of diesel fuel, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==8){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [price of gasoline, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==9){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [Monthly tariff rate of 1 category, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==10){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [average level of repair workers]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==11){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [coefficient of transition from salary to cost of materials]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==12){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [industry coefficient]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==13){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [transportation cost factor]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==14){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [shop floor ratio]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==15){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [conversion factor from weight to machine area]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==16){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [the cost of painting in the prices of the base year, rub / 100 sq. m.]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==17){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [current wage growth index in relation to the base year]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==18){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [current index of changes in the cost of construction work]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==19){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [averaged price increase index for build. materials]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==20){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [current producer price index in relation to the base year]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==21){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [Transition factor to TCM]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==22){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [PRC machine technical assistance]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==23){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [the cost of the car escort, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==24){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [costs for tractor, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==25){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [costs for trailer, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==26){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [crane costs, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==27){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [Promatomnadzor rate for construction equipment testing, rub]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==28){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [the term of the conclusion of the Promatomnadzor, years]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==29){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of salary overheads]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==30){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [index of growth of overheads]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==31){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of salary in overhead]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==32){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of accrual of planned savings from salary]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==33){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [growth index of planned savings]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==34){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of salary in planned savings]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==35){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of accrual of additional leave]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==36){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [Percentage of long service pay]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==37){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [Accrual percentage required. accident insurance]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==38){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of payments to the innovation fund]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==39){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of social insurance accrual]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==40){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of accrual of agricultural tax]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==41){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [percentage of single payment accrual]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==42){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [VAT percentage]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==43){
        $result = sqlsrv_query($conn, "UPDATE economic_ch SET [bonus rate]='$znach'  WHERE Id_brand='$id_brand' ");
    }

}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}