<?php

$id_perf=$_REQUEST['id_perf'];

$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

IF( $conn ) {

    $result = sqlsrv_query($conn, " DELETE FROM performance_ch  WHERE Id_perf_ch='$id_perf' ");

}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}