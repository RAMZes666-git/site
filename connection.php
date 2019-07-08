
<?php 
	$link = mysqli_connect("localhost", "root", "") or die("Нет соединения с MySQL"); 
	mysqli_select_db( $link,"курсовая") or die ("Че то база не выбирается...");
	
	
	$result = mysqli_query( $link,"SELECT * FROM additional_data")or die("Ошибка " . mysqli_error($link));
	$myrow = array();  
	while($myrow[]= mysqli_fetch_array($result)); 
	$json_data  = json_encode($myrow);
	$array_1 = json_decode($json_data, true);

