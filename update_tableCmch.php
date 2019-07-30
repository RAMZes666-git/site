<?php
$id_brand=$_REQUEST['id_brand'];
$perem=$_REQUEST['peremnay'];

$znach=$_REQUEST['znach'];


$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
IF( $conn ) {

    if($perem==1){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET H='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==2){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET Hstart='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==3){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET Hend='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==4){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [shift duration]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==5){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [working time of the current year, days]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==6){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [shift factor]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==7){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [number of drivers]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==8){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [average distance of relocation, km]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==9){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [Number of relocations per year]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==10){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [number of scaffold riders]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==11){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [average relocation rate, km / h]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==12){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [loading time, man hours]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==13){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [coefficient of change in operating conditions]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==14){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [number of TO-1]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==15){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [number of TO-2]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==16){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [number of current repairs (T)]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==17){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [number of seasonal services (SS)]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==18){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [normative labor input of TO-1, man. hour]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==19){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [normative labor input of TO-2, man. hour]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==20){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [standard labor intensity T, man. hour]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==21){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [normative labor input SS, man hours]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==22){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [normative labor input of capital repairs (K), man hours]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==23){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [periodicity of the TO-1]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==24){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [periodicity of the TO-2]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==25){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [periodicity of execution T]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==26){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [periodicity of K]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==27){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [duration of TO-1, days]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==28){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [duration of TO-2, days]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==29){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [duration T, days]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==30){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [duration of CO, days]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==31){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [duration K, days]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==32){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [average monthly working time, h]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==33){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [linear rate of diesel fuel consumption per 100 km, l.]='$znach'  WHERE Id_brand='$id_brand' ");
    }
    if($perem==34){
        $result = sqlsrv_query($conn, "UPDATE performance_ch SET [consumption rate of diesel fuel in the summer for 1 machine hour]='$znach'  WHERE Id_brand='$id_brand' ");
    }
}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}