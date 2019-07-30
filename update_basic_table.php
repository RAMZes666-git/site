<?php
$stage= $_REQUEST['stage'];
$kti_a1= $_REQUEST['kti_a1'];
$kti_a2= $_REQUEST['kti_a2'];
$kp_a1=$_REQUEST['kp_a1'];
$kp_a2=$_REQUEST['kp_a2'];
$ks_a1=$_REQUEST['ks_a1'];
$ks_a2 =$_REQUEST['ks_a2'];
$cmch_a1=$_REQUEST['cmch_a1'];
$cmch_a2=$_REQUEST['cmch_a2'];
$kpx=$_REQUEST['kpx'];
$kn=$_REQUEST['kn'];
$st=$_REQUEST['st'];
$pt=$_REQUEST['pt'];


$link = mysqli_connect("localhost", "root", "") or die("Нет соединения с MySQL");
	mysqli_select_db( $link,"курсовая") or die ("Че то база не выбирается...");
    $result = mysqli_query( $link,"UPDATE stages SET  Кти_А1='$kti_a1', Кти_А2='$kti_a2',Кп_А1='$kp_a1',Кп_А2='$kp_a2',Кс_А1='$ks_a1',Кс_А2='$ks_a2',
                                          Смч_А1='$cmch_a1' ,Смч_А2='$cmch_a2', Кпх='$kpx',Кн='$kn', Ст='$st',Пт='$pt'
                                          where этап='$stage'  ")or die("Ошибка " . mysqli_error($link));


