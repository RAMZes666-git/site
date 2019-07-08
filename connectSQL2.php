<?php
$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
IF( $conn )
{
//echo "Connection established.\n";
    $result = sqlsrv_query($conn,"SELECT * FROM type_of_cars") ;

    $myrow = array();
    while($myrow[]= sqlsrv_fetch_array($result));
    $json_data = json_encode($myrow);
    $array_type_of_cars = json_decode($json_data,true);
}