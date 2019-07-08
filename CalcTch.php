<?php
$id_type= $_REQUEST['SelectOption'];
$carcost=$_GET['carcost'];
$Zzpmash=$_GET['Zzpmash'];
$fuelcost=$_GET['quantity'];
$Zmach=$_GET['quantity1'];
$Ztg1=$_GET['quantity2'];
$Zpr1=$_GET['quantity3'];
$Zkr1=$_GET['quantity4'];
$Zr1=$_GET['Zr'];


$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");

$conn = sqlsrv_connect( $serverName, $connectionInfo);
IF( $conn ) {

    $result = sqlsrv_query($conn, "SELECT  *  FROM  economic_ch,car_brands,performance_ch
                                         where car_brands.Id_brand='$id_type'and car_brands.Id_brand=economic_ch.Id_brand and car_brands.Id_brand=performance_ch.Id_brand ");
    while ($myrow = sqlsrv_fetch_array($result)) {

        if ($myrow['Id_type'] == 1) { //для экскаватора
            $A1 = 0.98;
            $A2 = 0.000027;
            $V = 11.2;
            $Tpr = 0.5;
            $Tm = 20; ///перерывы в работе, связанные с неблагоприятными метеорологическими условиями, дни;
            $Kso = 0.22;
        }
        if ($myrow['Id_type'] == 4) { //для катка
            $A1 = 0.99;
            $A2 = 0.00003;
            $V = 11.2;
            $Tpr = 0.5;
            $Tm = 9;
            $Kso = 0.22;
        }
        if ($myrow['Id_type'] == 6) { //для асфальтоукл
            $A1 = 0.98;
            $A2 = 0.00002;
            $V = 11.2;
            $Tpr = 8;
            $Tm = 9;
            $Kso = 0.19;
        }

        if ($myrow['Id_type'] == 7) { //для погрузчика
            $A1 = 0.98;
            $A2 = 0.000027;
            $V = 11.2;
            $Tpr = 0.5;
            $Tm = 20;
            $Kso = 0.19;
        }

        $Kti = $A1 - $A2 * $myrow['H']; // Коэффициент технического использования
        $Tpb = (($myrow['average distance of relocation, km'] / $V + $Tpr / $myrow['number of scaffold riders']) * $myrow['Number of relocations per year'] / $myrow['shift duration']);//Время, затраченное на перебазирование техники
        $Tn = round(0.03 * $myrow['working time of the current year, days']);///непредвиденные перерывы
        $Tch = ($myrow['working time of the current year, days'] - $Tpb - $Tn - $Tm) * $Kti * $myrow['shift duration'] * $myrow['shift factor'];// Годовой фонд рабочего времени в м-ч

        if ($myrow['average discharge of machinists']==1) {  $Ktm=1;}
        if ($myrow['average discharge of machinists']==2) { $Ktm=1.16;}
        if ($myrow['average discharge of machinists']==3) {$Ktm=1.35;}
        if ($myrow['average discharge of machinists']==4)  {$Ktm=1.57;}
        if ($myrow['average discharge of machinists']==5) { $Ktm=1.73;}
        if ($myrow['average discharge of machinists']==6) { $Ktm=1.90;}
        if ($myrow['average discharge of machinists']==7) { $Ktm=2.03;}
        if ($myrow['average discharge of machinists']==8) { $Ktm=2.17;}
        if ($myrow['average discharge of machinists']==9) { $Ktm=2.32;}
        if ($myrow['average discharge of machinists']==10) { $Ktm=2.48;}
        if ($myrow['average discharge of machinists']==11) { $Ktm=2.65;}
        if ($myrow['average discharge of machinists']==12) { $Ktm=2.84;}
        if ($myrow['average discharge of machinists']==13) { $Ktm=3.04;}
        if ($myrow['average discharge of machinists']==14) { $Ktm=3.25;}
        if ($myrow['average discharge of machinists']==15) { $Ktm=3.48;}

        $Za=($carcost*$myrow['annual rate of depreciation,%'])/( $Tch*100)*$myrow['coefficient of change in operating conditions']; // Амортизационные отчисления
        $Zzp=$myrow['Monthly tariff rate of 1 category, rub']*$Ktm/$myrow['average monthly working time, h']*$myrow['bonus rate']*$myrow['number of drivers'];//  Заработная плата машинистов

        $Ze=(((2*$myrow['average distance of relocation, km']*$myrow['linear rate of diesel fuel consumption per 100 km, l.'])/(100*($myrow['shift duration']-$myrow['average distance of relocation, km']/$myrow['average relocation rate, km / h']))) +$myrow['consumption rate of diesel fuel in the summer for 1 machine hour'])*$fuelcost*1.12;
        $Zen=$Ze*(1+$Kso)  ;//Затраты на энергоносители, смазочные и сопутствующие материалы опреде-ляются на основе норм расхода топлива и смазочных материалов


        $Ktisr= $myrow['periodicity of K']/($myrow['periodicity of K']+$myrow['number of TO-1']*$myrow['duration of TO-1, days']*24+$myrow['number of TO-2']*$myrow['duration of TO-2, days']*24+$myrow['number of current repairs (T)']*$myrow['duration T, days']*24);
        $TRtor =(($myrow['number of TO-1']*$myrow['normative labor input of TO-1, man. hour']+ $myrow['number of TO-2']*$myrow['normative labor input of TO-2, man. hour']+ $myrow['number of current repairs (T)']*$myrow['standard labor intensity T, man. hour'])/$myrow['periodicity of K']+$myrow['number of seasonal services (SS)']*$myrow['normative labor input SS, man hours']/ $Tch)* $Ktisr/ $Kti;
        // Трудоемкость на ТО, СО, ТР

        $Ztzar=$TRtor*$myrow['Monthly tariff rate of 1 category, rub']*$Ktm/$myrow['average monthly working time, h']*$myrow['bonus rate']; // З/пл рабочих на ТО, СО, ТР

        $Kpv=$Ktm*$myrow['industry coefficient']/$Ktm; ////Ставка*отраслевой коэф/ ставка
        $Iu= 1.91;////$myrow['current producer price index in relation to the base year']/ $myrow['current wage growth index in relation to the base year']* $Kpv; ////Текущий индекс цен производителей по отнош. к баз.году/ Индекс роста тек.зарплаты по отношению к базовому году
        $Zmat= $Ztzar* $myrow['coefficient of transition from salary to cost of materials']* $Iu* $myrow['transportation cost factor'];  // Затраты на материал для ТО, СО, ТР



        $Zmtp=$myrow['costs for tractor, rub']/$myrow['periodicity of K']*(2*($myrow['average distance of relocation, km']/$V*($myrow['number of TO-1']+$myrow['number of TO-2']+$myrow['number of current repairs (T)'])+$myrow['shift duration']*( $myrow['number of TO-1']*$myrow['duration of TO-1, days']+$myrow['number of TO-2']*$myrow['duration of TO-2, days']+$myrow['number of current repairs (T)']*$myrow['duration T, days'])));
        //  Затраты на экспл. машины техпомощи на ТО, ТР на месте работы техники


        ///пропустим кап ремонт


        $Zkr=0;
        $Zto=$myrow['shop floor ratio']*( $Ztzar+$Zmat+$Zmtp)+ $Zkr;
        // Затраты на  ТО, СО, ТР

        $K=$myrow['number of scaffold riders'];
        $M=2; //максимальное количество ездок (рейсов) машин, участвующих в перебазировании
        $Vn=25;///средняя скорость "нулевого" пробега, км/ч;
        $Zzpm=$Zzpmash/$myrow['shift duration']*($myrow['average distance of relocation, km']/$V*$M+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn*($M-1)+$Tpr/$myrow['number of scaffold riders']);
        $Zmc= $Zmach*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
        $Ztg= $Ztg1*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
        $Zpr=$Zpr1 *(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
        $Zkran= $Zkr1*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
        $Zr= $Zr1/$myrow['shift duration'] *(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);



        $n=1; ///в одну сторону
        $Zpm=$n*($Zzpm+$Zmc+$Ztg+$Zpr+$Zkran+$Zr);

        $Zpb= $Zpm*$myrow['Number of relocations per year']/$Tch;   // Затраты на перебазировку

        $Zos=0;// Затраты на сменную оснастку

        $Cmch= $Za+ $Zzp+ $Zen  + $Zto+ $Zpb+$Zos;

    echo $_POST['$Cmch'];








    }
}
ELSE
    {
        echo "Connection could not be established.\n";
        DIE(print_r(sqlsrv_errors(), true));
    }

        ?>