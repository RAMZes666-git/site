<?php
///error_reporting(-1);

ini_set('mssql.charset', 'UTF-8');
//mb_internal_encoding("UTF-8");

$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");

$conn = sqlsrv_connect( $serverName, $connectionInfo);
/*
IF( $conn )
{

    $result = sqlsrv_query($conn,"SELECT  *  FROM type_of_cars") ;

                                     /// FOR JSON PATH

  ///  $myrow=array();
   while( $myrow= sqlsrv_fetch_array($result)){

      echo '<option>'.$myrow[1].'</option>';

     //  $json_data = json_encode($myrow);
     //  $array_type_of_cars = json_decode($json_data,true);
   }

}
ELSE
{
echo "Connection could not be established.\n";
DIE( print_r( sqlsrv_errors(), true));
}


//sqlsrv_close( $conn);


$link = mysqli_connect("localhost", "root", "") or die("Нет соединения с MySQL");
mysqli_select_db( $link,"курсовая") or die ("Че то база не выбирается...");


$result = mysqli_query( $link,"SELECT * FROM type_of_machine")or die("Ошибка " . mysqli_error($link));

while($myrow= mysqli_fetch_array($result)){

    echo '<option>'.$myrow[1].'</option>';
}
*/

?>

