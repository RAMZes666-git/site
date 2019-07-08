<?php

global $info;
Calculate1();
///round(1.95583, 2);/////Функция округления с точностью до энного знака после запятой


// ==================================================================================
// ============================ Исходные данные  для расчета ========================
// ==================================================================================


function Calculate()
{
		$info[0][0]=1;
		$info[0][1]=0.95;
		$info[0][2]=0.000042;
		$info[0][3]=0.82;
		$info[0][4]=0.000037;
		$info[0][5]=1;
		$info[0][6]=0.00007;
		$info[0][7]=0.9;
		$info[0][8]=2200;
		$info[0][9]=41649;
		$info[0][10]=2.9985;
		$info[0][11]=1.15;
		$info[0][12]=210000000;
		$info[0][13]=33894539;
		$info[0][14]=121;

		$info[1][0]=2;
		$info[1][1]=0.89;
		$info[1][2]=0.000039;
		$info[1][3]=0.77;
		$info[1][4]=0.000035;
		$info[1][5]=1;
		$info[1][6]=0.000085;
		$info[1][7]=0.9;
		$info[1][8]=2200;
		$info[1][9]=49979;
		$info[1][10]=3.5983;
		$info[1][11]=1.15;
		$info[1][12]=84000000;
		$info[1][13]=15252543;
		$info[1][14]=109;
		///var_dump($info);
		for ( $i=2 ; $i<=4 ; $i++)
		{
			for($j=0; $j<=14; $j++ )
			{
				$info[$i][$j]=$info[$i-1][$j];
			}
		}
		$info[2][0]=3;
		$info[2][12]=105000000;
		$info[3][12]=126000000;
		$info[4][12]=147000000;

		$info[3][0]=4;
		$info[2][13]=18641996;
		$info[3][13]=22031450;
		$info[4][13]=25420904;

		$info[4][0]=5;
		$info[2][14]=103;
		$info[3][14]=98;
		$info[4][14]=93;

	 /*for($i=0; $i<=4; $i++)
		{
			for($j=0; $j<=14; $j++)
			{
				echo  ' | '.$info[$i][$j] ;
			}
			echo"</br>";
		}
	 */
	// Calculate1();
///}





//function Calculate1()
///{

	$step=1000;
	$H_finish=array(6000,5000,5000,6000);
	//$Hok=array($Hok1,$Hok2,$Hok3,$Hok4,$Hok5); ///// ????
		$Hok=array();
	// Расчет



    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    $Global_Profit=0;
	$H=0;
    $Hgl=0;
	$CountKp = 4; /////////???
	for($i=0; $i<$CountKp; $i++)
	{

		$Hgl=$Hgl+$H;
		$H=0;

        $Profit = -($info[$i][12]);
        ///прибыль ????
		//echo 'Hglobal='.$Hglobal.'  H='.$H.' П='.$Profit.'</br>';
			do
			{
			$Kc=$info[$i][5]-$info[$i][6]*$H;
			$Kp=$info[$i][3]-$info[$i][4]*$H;

			$Cmch=$info[$i][9]+$info[$i][10]*$H;
			// Пэ = Пт * Кп * Кс * Кпх

			$Operating_performance=$info[$i][14]*$Kp*$Kc*$info[$i][7];
			$Ce_pr=($Cmch*$info[$i][11])/$Operating_performance;
			// П   = ( Ст     - Сепр)  *             Пт            * Кс  * Kpx  * H - Cu
			$Profit=($info[$i][8]-$Ce_pr)*$info[$i][14]*$Kc*$info[$i][7]*$H-$info[$i][12];
                if((($Hgl+$H)%$step)==0){
                    $list1 = array ( array($Hgl+$H.';'.$Kp.';'.$Kc.';'.$info[$i][9].';'.$info[$i][14].';'.$Operating_performance.';'.$Cmch.';'.$Ce_pr.';'.$Ce_pr.';'.$Profit));
                        foreach ($list1 as $fields) {
                            fputcsv($fp, $fields);
                            fclose($fp);
                        }
                }
			$H=$H+1;

			}while($Profit>=0 or $H > $H_finish[$i]-1);

		//	echo 'Hglobal='.$Hglobal.'  Hok='.$H.' П='.$Profit.'</br>';

		$Hok[$i]=$H;


		for($H=$Hok[$i];$H<$H_finish[$i]-1; $H++)
		{
			$Kc=$info[$i][5]-$info[$i][6]*$H;
			$Kp=$info[$i][3]-$info[$i][4]*$H;
			$Kti=$info[$i][1]-$info[$i][2]*$H;
			$Cmch=$info[$i][9]+$info[$i][10]*$H;
			$Operating_performance=$info[$i][14]*$Kp*$Kc*$info[$i][7];
			$Ce_pr=($Cmch*$info[$i][11])/$Operating_performance;
			$Profit=($info[$i][8]-$Ce_pr)*$info[$i][14]*$Kc*$info[$i][7]*($H-$Hok[$i]);
		}

		  $Global_Profit = $Global_Profit+$Profit;
		///echo 'Hglobal='.$Hglobal.'  H='.$H.' П='.$Profit.'</br>';
	}
	echo 'П.'.($Global_Profit-$info[0][12]).'руб.'.'</br>';
	echo 'H='.($Hgl+$H).'моточас '.'</br>';
	echo 'П на 1 мтч '.(($Global_Profit-$info[0][12])/($Hgl+$H)).' руб/моточас '.'</br>';
	echo 'Global_Profit ='.$Global_Profit;
}


function Calculate1()
{    include 'connection.php';
	include 'connection_1.php';
    require_once('excelphp-master/PHPExcel.php');
	/*
	$info = array() ;
		
		$info[0][0]=$array[0]['этап'];
		$info[0][1]=$array[0]['Кти_А1'];
		$info[0][2]=$array[0]['Кти_А2'];
		$info[0][3]=$array[0]['Кп_А1'];
		$info[0][4]=$array[0]['Кп_А2'] ;
		$info[0][5]=$array[0]['Кс_А1'];
		$info[0][6]=$array[0]['Кс_А2'];
		$info[0][7]=$array[0]['Смч_А1'];
		$info[0][8]=$array[0]['Смч_А2'];
		$info[0][9]=$array[0]['Кпх'] ;
		$info[0][10]=$array[0]['Кн'];
		$info[0][11]=$array[0]['Ст'];
		$info[0][12]=$array_1[0]['стоим_КР'];
		$info[0][13]=$array_1[0]['стоим_КР_гидр'];
		$info[0][14]=$array[0]['Пт'];
		
		$info[1][0]=$array[1]['этап'];
		$info[1][1]=$array[1]['Кти_А1'];
		$info[1][2]=$array[1]['Кти_А2'];
		$info[1][3]=$array[1]['Кп_А1'];
		$info[1][4]=$array[1]['Кп_А2'] ;
		$info[1][5]=$array[1]['Кс_А1'];
		$info[1][6]=$array[1]['Кс_А2'];
		$info[1][7]=$array[1]['Смч_А1'];
		$info[1][8]=$array[1]['Смч_А2'];
		$info[1][9]=$array[1]['Кпх'] ;
		$info[1][10]=$array[1]['Кн'];
		$info[1][11]=$array[1]['Ст'];
		$info[1][12]=$array_1[1]['стоим_КР'];
		$info[1][13]=$array_1[1]['стоим_КР_гидр'];
		$info[1][14]=$array[1]['Пт'];
		
		for ( $i=2 ; $i<=4 ; $i++)
		{
			for($j=0; $j<=14; $j++ ) 
			{
				$info[$i][$j]=$info[$i-1][$j];
			}
		}
		$info[2][0]=$array[2]['этап'];
		$info[2][12]=$array_1[2]['стоим_КР'];
		$info[3][12]=$array_1[3]['стоим_КР'];
		$info[4][12]=$array_1[4]['стоим_КР'];
		
		$info[3][0]=$array[3]['этап'];;
		$info[2][13]=$array_1[2]['стоим_КР_гидр'];
		$info[3][13]=$array_1[3]['стоим_КР_гидр'];
		$info[4][13]=$array_1[4]['стоим_КР_гидр'];
		
		$info[4][0]=$array[4]['этап'];
		$info[2][14]=$array[2]['Пт'];
		$info[3][14]=$array[3]['Пт'];
		$info[4][14]=$array[4]['Пт'];
		*/
        $titls = array (
        array('name'=>'H', 'cell'=>'A'),
        array ('name'=>'Кп', 'cell'=>'B'),
            array ('name'=>'Кc', 'cell'=>'C'),
        array ('name'=>'Кпх', 'cell'=>'D'),
        array ('name'=>'Пт', 'cell'=>'E'),
        array ('name'=>'Пэ', 'cell'=>'F'),
        array ('name'=>'Смч', 'cell'=>'G'),
        array ('name'=>'Сепр', 'cell'=>'H'),
        array ('name'=>'Ст-Сепр', 'cell'=>'I'),
            array ('name'=>'П', 'cell'=>'J'),
        );
        $phpexcel= new PHPExcel();
        for($i=0;$i<count($titls);$i++){
            $string=$titls[$i]['name'];
            $string=mb_convert_encoding($string,'UTF-8','Windows-1251');
            $cellletter= $titls[$i]['cell'] . 1;
            $phpexcel->getActiveSheet()->setCellValueExplicit($cellletter,$string, PHPExcel_Cell_DataType::Type_String);
        }



		$Hok=array();
		$step=1000;
		$H=0;
		$Hglobal=0;
		$CountKp = 4;
        $Global_Profit=0;
        /*$fp = fopen('file.csv', 'w');
        $list = array ( array('H;Kp;Kc;Kpx;Pt;Pe;Smch;Sepr;(St-Sepr);P'));
            foreach ($list as $fields) {
                fputcsv($fp, $fields);
            }
        */
		for($i=0; $i<$CountKp; $i++)
		{
			$Hglobal=$Hglobal+$H;
			$H=0;

			do
			{
			$Kc=$array[$i]['Кс_А1']-$array[$i]['Кс_А2']*$H;
			$Kp=$array[$i]['Кп_А1']-$array[$i]['Кп_А2']*$H;
			$Cmch=$array[$i]['Смч_А1']+$array[$i]['Смч_А2']*$H;
			// Пэ = Пт * Кп * Кс * Кпх
			$Operating_performance=$array[$i]['Пт']*$Kp*$Kc*$array[$i]['Кпх'];
			$Ce_pr=($Cmch*$array[$i]['Кн'])/$Operating_performance;
			// П   = ( Ст     - Сепр)  *             Пт            * Кс  * Kpx  * H - Cu
			$Profit=($array[$i]['Ст']-$Ce_pr)*$array[$i]['Пт']*$Kc*$array[$i]['Кпх']*$H-$array_1[$i]['стоим_КР'];
                if((($Hglobal+$H)%$step)==0){
                    $data = array (
                        array('Hgl+H'=>$Hglobal+$H, 'Kp'=>$Kp,'Kc'=>$Kc,'Кпх'=>$array[$i]['Кпх'],'Пт'=>$array[$i]['Пт'],'Operating_performance'=>$Operating_performance,'Cmch'=>$Cmch,'Ce_pr*Kn'=>($Ce_pr*$array[$i]['Кн']),'Ст-$Ce_pr'=>($array[$i]['Ст']-$Ce_pr),'Profit'=>$Profit)
                    );
                   $j=2;
                   foreach ( $data as $row){
                       $phpexcel->getActiveSheet()->setCellValue('A$j',$row['Hgl+H']);
                       $phpexcel->getActiveSheet()->setCellValue('B$j',$row['Kp']);
                       $phpexcel->getActiveSheet()->setCellValue('C$j',$row['Kc']);
                       $phpexcel->getActiveSheet()->setCellValue('D$j',$row['Кпх']);
                       $phpexcel->getActiveSheet()->setCellValue('E$j',$row['Пт']);
                       $phpexcel->getActiveSheet()->setCellValue('F$j',$row['Operating_performance']);
                       $phpexcel->getActiveSheet()->setCellValue('G$j',$row['Cmch']);
                       $phpexcel->getActiveSheet()->setCellValue('H$j',$row['Ce_pr*Kn']);
                       $phpexcel->getActiveSheet()->setCellValue('I$j',$row['Ст-$Ce_pr']);
                       $phpexcel->getActiveSheet()->setCellValue('J$j',$row['Profit']);
                   }
                   $page=$phpexcel->setActiveSheetIndex();
                   $page->setTitle('file');
                   $objWriter=PHPExcel_IOFactory::createWriter($phpexcel,'Excel2016');
                    $filename='file.xlsx';
                   if(file_exists(file.xlsx)){
                       unlink(file.xlsx);
                   }
                    $objWriter->save($filename);
                }
			$H=$H+1;
			}while($Profit>=0);
			
				echo 'Hglobal='.$Hglobal.'  Hok='.$H.' П='.$Profit.'</br>';
				
			$Hok[$i]=$H;
			$Profit_1 = $Profit - 1;
		
			while($Profit_1 < $Profit or $Profit = 0)
				{
                    $Kc=$array[$i]['Кс_А1']-$array[$i]['Кс_А2']*$H;
                    $Kp=$array[$i]['Кп_А1']-$array[$i]['Кп_А2']*$H;
                    $Cmch=$array[$i]['Смч_А1']+$array[$i]['Смч_А2']*$H;
				    $Kti=$array[$i]['Кти_А1']-$array[$i]['Кти_А2']*$H;
                    $Operating_performance=$array[$i]['Пт']*$Kp*$Kc*$array[$i]['Кпх'];
                    $Ce_pr=($Cmch*$array[$i]['Кн'])/$Operating_performance;
				$Profit_1 = $Profit;
				$Profit=($array[$i]['Ст']-$Ce_pr)*$array[$i]['Пт']*$Kc*$array[$i]['Кпх']*($H-$Hok[$i]);
/*
                    if((($Hglobal+$H)%$step)==0){
                        $fp = fopen('file.csv', 'w');
                        $list2 = array ( array(($Hglobal+$H).';'.$Kp.';'.$Kc.';'.$array[$i]['Кпх'].';'.$array[$i]['Пт'].';'.$Operating_performance.';'.$Cmch.';'.($Ce_pr*$array[$i]['Кн']).';'.($array[$i]['Ст']-$Ce_pr).';'.$Profit));
                        foreach ($list2 as $fields) {
                            fputcsv($fp, $fields);
                            fclose($fp);
                        }
                    }
*/
				$H=$H+1;
				}

			$Global_Profit=$Global_Profit+$Profit;
			echo 'Hglobal='.$Hglobal.'  H='.$H.' П='.$Profit.'</br>';
			
		}
		
		echo 'П. '.($Global_Profit-$info[0][12]).'руб.'.'</br>';
		echo 'H= '.($Hglobal+$H).'моточас '.'</br>';
		echo 'П на 1 мтч '.(($Global_Profit-$info[0][12])/($Hglobal+$H)).' руб/моточас '.'</br>';
		echo 'Global_Profit = '.$Global_Profit;
}





