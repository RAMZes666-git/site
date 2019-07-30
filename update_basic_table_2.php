<?php
$id_mash=$_REQUEST['id_mash'];
$cost_mash=$_REQUEST['cost_mash'];
$cost_Kr=$_REQUEST['cost_Kr'];
$cost_Kr_gidr=$_REQUEST['cost_Kr_gidr'];


$link = mysqli_connect("localhost", "root", "") or die("Нет соединения с MySQL");
mysqli_select_db( $link,"курсовая") or die ("Че то база не выбирается...");
$result = mysqli_query( $link,"UPDATE additional_data SET стоим_нов_маш='$cost_mash' , стоим_КР='$cost_Kr', стоим_КР_гидр='$cost_Kr_gidr'
                                          where id='$id_mash'  ")or die("Ошибка " . mysqli_error($link));