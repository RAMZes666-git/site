<?php

$id_econom=$_REQUEST['id_econom'];

$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

IF( $conn ) {

    $result = sqlsrv_query($conn, " DELETE FROM  economic_ch WHERE Id_ecomomic_ch='$id_econom' ");

}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}