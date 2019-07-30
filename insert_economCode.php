<?php

$Id_mach=$_REQUEST['Id_mach'];
$p1=$_REQUEST['p1'];
$p2=$_REQUEST['p2'];
$p3=$_REQUEST['p3'];
$p4=$_REQUEST['p4'];
$p5=$_REQUEST['p5'];
$p6=$_REQUEST['p6'];
$p7=$_REQUEST['p7'];
$p8=$_REQUEST['p8'];
$p9=$_REQUEST['p9'];
$p10=$_REQUEST['p10'];
$p11=$_REQUEST['p11'];
$p12=$_REQUEST['p12'];
$p13=$_REQUEST['p13'];
$p14=$_REQUEST['p14'];
$p15=$_REQUEST['p15'];
$p16=$_REQUEST['p16'];
$p17=$_REQUEST['p17'];
$p18=$_REQUEST['p18'];
$p19=$_REQUEST['p19'];
$p20=$_REQUEST['p20'];
$p21=$_REQUEST['p21'];
$p22=$_REQUEST['p22'];
$p23=$_REQUEST['p23'];
$p24=$_REQUEST['p24'];
$p25=$_REQUEST['p25'];
$p26=$_REQUEST['p26'];
$p27=$_REQUEST['p27'];
$p28=$_REQUEST['p28'];
$p29=$_REQUEST['p29'];
$p30=$_REQUEST['p30'];
$p31=$_REQUEST['p31'];
$p32=$_REQUEST['p32'];
$p33=$_REQUEST['p33'];
$p34=$_REQUEST['p34'];
$p35=$_REQUEST['p35'];
$p36=$_REQUEST['p36'];
$p37=$_REQUEST['p37'];
$p38=$_REQUEST['p38'];
$p39=$_REQUEST['p39'];
$p40=$_REQUEST['p40'];
$p41=$_REQUEST['p41'];



$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

IF( $conn ) {

    $result = sqlsrv_query($conn, " INSERT INTO economic_ch
                                              VALUES ( '$Id_mach' , '$p1' ,'$p2', '$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14', '$p15',
                                              '$p16','$p17', '$p18','$p19','$p20','$p21','$p22' ,'$p23','$p24','$p25','$p26','$p27' ,'$p28','$p29','$p30',
                                              '$p31','$p32','$p33','$p34', '$p35','$p36' ,'$p37','$p38','$p39','$p40','$p41'   ) ");

}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}