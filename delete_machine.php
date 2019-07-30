<?php

$Id_mach=$_REQUEST['idmach'];

$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

IF( $conn ) {

    $result = sqlsrv_query($conn, " DELETE FROM  car_brands WHERE Id_brand='$Id_mach' ");

}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}