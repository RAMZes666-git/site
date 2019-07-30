<?php
$tip=$_REQUEST['tip'];

$id_tip=$_REQUEST['id_tip'];

$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

IF( $conn ) {

    $result = sqlsrv_query($conn, " INSERT INTO car_brands
                                              VALUES ( '$id_tip' ,'$tip' ) ");


}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}