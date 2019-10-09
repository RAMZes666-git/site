<?php

$id_type= $_REQUEST['SelectOption1'];

$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");

$conn = sqlsrv_connect( $serverName, $connectionInfo);
IF( $conn ) {

    $result = sqlsrv_query($conn, "SELECT  *  FROM  economic_ch,car_brands,performance_ch
                                         where car_brands.Id_brand='$id_type'and car_brands.Id_brand=economic_ch.Id_brand and car_brands.Id_brand=performance_ch.Id_brand ");
    while ($myrow = sqlsrv_fetch_array($result)) {

        if($myrow['Id_type']==1){ //для экскаватора
            $A1=0.98;
            $A2=0.000027;
            $V=11.2;
            $Tpr=0.5;
            $Tm=20; ///перерывы в работе, связанные с неблагоприятными метеорологическими условиями, дни;
            $Kso=0.22;
            $name=$myrow['Brand name'];
        }
        if($myrow['Id_type']==4){ //для катка
            $A1=0.99;
            $A2=0.00003;
            $V=11.2;
            $Tpr=0.5;
            $Tm=9;
            $Kso=0.22;
            $name=$myrow['Brand name'];
        }
        if($myrow['Id_type']==6){ //для асфальтоукл
            $A1=0.98;
            $A2=0.00002;
            $V=11.2;
            $Tpr=8;
            $Tm=9;
            $Kso=0.19;
            $name=$myrow['Brand name'];
        }

        if($myrow['Id_type']==7){ //для погрузчика
            $A1=0.98;
            $A2=0.000027;
            $V=11.2;
            $Tpr=0.5;
            $Tm=20;
            $Kso=0.19;
            $name=$myrow['Brand name'];
        }

        $Kti=$A1-$A2*$myrow['H']; // Коэффициент технического использования
        $Tpb=(($myrow['average distance of relocation, km']/$V+$Tpr/$myrow['number of scaffold riders'])*$myrow['Number of relocations per year']/$myrow['shift duration']);//Время, затраченное на перебазирование техники
        $Tn=round(0.03*$myrow['working time of the current year, days']);///непредвиденные перерывы
        $Tch=($myrow['working time of the current year, days'] - $Tpb-$Tn-$Tm)*$Kti*$myrow['shift duration']*$myrow['shift factor']; // Годовой фонд рабочего времени в м-ч
///echo 'годовой режим работы СДМ = '.$Tch.'</br>';

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

        $Za=($myrow['book value of equipment, rub']*$myrow['annual rate of depreciation,%'])/( $Tch*100)*$myrow['coefficient of change in operating conditions']; // Амортизационные отчисления
        $Zzp=$myrow['Monthly tariff rate of 1 category, rub']*$Ktm/$myrow['average monthly working time, h']*$myrow['bonus rate']*$myrow['number of drivers'];//  Заработная плата машинистов
 //  echo 'Амортизационные отчисления, приходящиеся на один час эксплуатации = '.$Za.'</br>';
  //    echo  'Затраты на оплату и стимулирование труда машинистов = '.$Zzp.'</br>';

        $Ze=(((2*$myrow['average distance of relocation, km']*$myrow['linear rate of diesel fuel consumption per 100 km, l.'])/(100*($myrow['shift duration']-$myrow['average distance of relocation, km']/$myrow['average relocation rate, km / h']))) +$myrow['consumption rate of diesel fuel in the summer for 1 machine hour'])*$myrow['price of diesel fuel, rub']*1.12;
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
        $Zzpm=$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']*($myrow['average distance of relocation, km']/$V*$M+ $myrow['average distance of relocation, km']/$Vn*($M-1)+$Tpr/$myrow['number of scaffold riders']);
        $Zmc= $myrow['the cost of the car escort, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn)*$M+$Tpr/$K);
        $Ztg= $myrow['costs for tractor, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn)*$M+$Tpr/$K);
        $Zpr= $myrow['costs for trailer, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn)*$M+$Tpr/$K);
        $Zkran= $myrow['crane costs, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn)*$M+$Tpr/$K);
        $Zr= $myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']*$K *(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn)*$M+$Tpr/$K);



        $n=1; ///в одну сторону
        $Zpm=$n*($Zzpm+$Zmc+$Ztg+$Zpr+$Zkran+$Zr);

        $Zpb= $Zpm*$myrow['Number of relocations per year']/$Tch;   // Затраты на перебазировку

        $Zos=0;// Затраты на сменную оснастку

        $Cmch= $Za+ $Zzp+ $Zen  + $Zto+ $Zpb+$Zos;

        $Nr=$myrow['estimated salary in base year prices']*$myrow['percentage of salary overheads']/100*$myrow['index of growth of overheads']*0.996; // Накладные расходы
        $ZPnp=$Nr*$myrow['percentage of salary in overhead']/100;

        $Pn=$myrow['estimated salary in base year prices']*$myrow['percentage of accrual of planned savings from salary']/100*$myrow['growth index of planned savings']*0.96; // Плановые накопления
        $ZPpn=$Pn*$myrow['percentage of salary in planned savings']/100;


        $Dot=$Zzp*$myrow['percentage of accrual of additional leave']/100; // Дополнительные отпуска
        $Vl=$Zzp*$myrow['Percentage of long service pay']/100;  // Выслуга лет


        $Zkrzar=0;

        $Cnc=($Zzp+$Ztzar+$Zkrzar+$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']+$ZPnp+$ZPpn)*$myrow['Accrual percentage required. accident insurance']/100;   // Обяз.страхование Н/СЛ.
        $Pz=$Dot+$Vl+$Cnc;

        $If=($Cmch+$Nr+$Pn)*$myrow['percentage of payments to the innovation fund']/100;  // Инновационный фонд
        $Ssoc= ($Zzp+$Ztzar+$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']) *$myrow['percentage of social insurance accrual']/100; // Соц. страх
        $Ncx= ($Zzp+$Ztzar+$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration'])*$myrow['percentage of accrual of agricultural tax']/100; // С/х налог
        $N=$If+ $Ssoc+ $Ncx;


        $PRC=$Cmch+$Nr+$Pn+$Pz+$N; // ПРЦ

        $Ep= $PRC*$myrow['percentage of single payment accrual']/(100-$myrow['percentage of single payment accrual']);  // Единый платеж

        $NDS=($PRC+$Ep)*$myrow['VAT percentage']/100; //  НДС
        $PRCn=$PRC+$Ep+$NDS;

        echo '<h4 align="center">С учётом старения</h4>';
        /*  echo 'Годовой режим работы СДМ = '.round($Tch,2).'</br>';
        echo 'Амортизационные отчисления, приходящиеся на один час эксплуатации = '.round($Za,2).'</br>';
         echo 'Затраты на оплату и стимулирование труда машинистов = '.round($Zzp,2).'</br>';
         echo 'Затраты на энергоносители, смазочные и сопутствующие материалы = '. round($Zen,2).'</br>';
         echo 'Затраты на заработную плату ремонтных рабочих = '.round($Ztzar,2).'</br>';
         echo 'Затраты на запасные части и ремонтные материалы = '.round($Zmat,2).'</br>';
         echo 'Затраты на машину технической помощи для проведения ТО вне ремонтной базы (на объекте) = '.round($Zmtp,2).'</br>';
         echo 'Определение затрат, приходящихся на один машиночас, для строительной техники, перебазируемой спецсредствами ='.round($Zpb,2).'</br>';
         echo 'Затраты на капремонт ='.round($Zkr,2).'</br>';
         echo 'Затраты на техническое обслуживание, текущий и капитальный ремонты ='.round($Zto,2).'</br>';
         echo 'Затраты на перебазирование строительной техники спецсредствами ='.round($Zpm,2).'</br>';
         echo 'Затраты на заработную плату машиниста перебазируемой техники за время перебазирования ='.round($Zzpm,2).'</br>';
         echo 'Затраты на машину сопровождения ='.round($Zmc,2).'</br>';
         echo 'Затраты на тягач ='.round($Ztg,2).'</br>';
         echo 'Затраты на прицеп или трейлер ='.round($Zpr,2).'</br>';
         echo 'Затраты на кран ='.round($Zkran,2).'</br>';
         echo 'Затраты на оплату труда рабочих, занятых погрузкой-разгрузкой перебазируемой техники ='.round($Zr,2).'</br>';
         echo 'Затраты на сменную оснастку ='.round($Zos,2).'</br>';
         echo 'Себестоимость машиночаса ='. round($Cmch,2).'</br>';

         echo 'Накладные расходы ='.round($Nr,2).'</br>';
         echo 'Заработная плата в накладных расходах ='.round($ZPnp,2).'</br>';
         echo 'Плановые накопления ='.round($Pn,2).'</br>';
         echo 'Заработная плата в плановых накоплениях  ='.round($ZPpn,2).'</br>';
         echo 'Начисления дополнительного отпуска ='.round($Dot,2).'</br>';
         echo 'Выплаты за выслугу лет ='.round($Vl,2).'</br>';
         echo 'Обязательное страхование от несчастных случаев ='.round($Cnc,2).'</br>';
         echo 'Прочие затраты ='.round($Pz,2).'</br>';
         echo 'Отчисления в инновационный фонд ='.round($If,2).'</br>';
         echo 'Отчисления на соц. страхование ='.round($Ssoc,2).'</br>';
         echo 'С/х налог ='.round($Ncx,2).'</br>';
         echo 'Налоги и отчисления ='.round($N,2).'</br>';
         echo 'Планово-расчетная цена машиночаса ='.round($PRC,2).'</br>';
         echo 'Единый платёж в местные целевые бюджетные и республиканские фонды ='.round($Ep,2).'</br>';
         echo 'НДС ='.round($NDS,2).'</br>';
         echo 'Планово-расчетная цена машиночаса с налогами ='.round($PRCn,2).'</br>';
         */
        echo '<hr>';

        $H1=$myrow['Hstart'];
        $H2= $myrow['Hend'];
        $mass = array();
        $mass1 = array();

        for($H=$H1;$H<$H2;$H+=1000){

            $Kti1=$A1-$A2*$H; // Коэффициент технического использования
    $Tpb1=(($myrow['average distance of relocation, km']/$V+$Tpr/$myrow['number of scaffold riders'])*$myrow['Number of relocations per year']/$myrow['shift duration']);//Время, затраченное на перебазирование техники
    $Tn1=round(0.03*$myrow['working time of the current year, days']);///непредвиденные перерывы
    $Tch1=($myrow['working time of the current year, days'] - $Tpb1-$Tn1-$Tm)*$Kti1*$myrow['shift duration']*$myrow['shift factor'];
    $Za1=($myrow['book value of equipment, rub']*$myrow['annual rate of depreciation,%'])/( $Tch1*100)*$myrow['coefficient of change in operating conditions'];
    $Zzp1=$myrow['Monthly tariff rate of 1 category, rub']*$Ktm/$myrow['average monthly working time, h']*$myrow['bonus rate']*$myrow['number of drivers'];
    $Ze1=(((2*$myrow['average distance of relocation, km']*$myrow['linear rate of diesel fuel consumption per 100 km, l.'])/(100*($myrow['shift duration']-$myrow['average distance of relocation, km']/$myrow['average relocation rate, km / h']))) +$myrow['consumption rate of diesel fuel in the summer for 1 machine hour'])*$myrow['price of diesel fuel, rub']*1.12;
    $Zen1=$Ze1*(1+$Kso) ;
    $Ktisr1= $myrow['periodicity of K']/($myrow['periodicity of K']+$myrow['number of TO-1']*$myrow['duration of TO-1, days']*24+$myrow['number of TO-2']*$myrow['duration of TO-2, days']*24+$myrow['number of current repairs (T)']*$myrow['duration T, days']*24);
    $TRtor1 =(($myrow['number of TO-1']*$myrow['normative labor input of TO-1, man. hour']+ $myrow['number of TO-2']*$myrow['normative labor input of TO-2, man. hour']+ $myrow['number of current repairs (T)']*$myrow['standard labor intensity T, man. hour'])/$myrow['periodicity of K']+$myrow['number of seasonal services (SS)']*$myrow['normative labor input SS, man hours']/ $Tch1)* $Ktisr1/ $Kti1;
    $Ztzar1=$TRtor1*$myrow['Monthly tariff rate of 1 category, rub']*$Ktm/$myrow['average monthly working time, h']*$myrow['bonus rate'];
    $Zmat1= $Ztzar1* $myrow['coefficient of transition from salary to cost of materials']* $Iu* $myrow['transportation cost factor'];
    $Zmtp1=$myrow['costs for tractor, rub']/$myrow['periodicity of K']*(2*($myrow['average distance of relocation, km']/$V*($myrow['number of TO-1']+$myrow['number of TO-2']+$myrow['number of current repairs (T)'])+$myrow['shift duration']*( $myrow['number of TO-1']*$myrow['duration of TO-1, days']+$myrow['number of TO-2']*$myrow['duration of TO-2, days']+$myrow['number of current repairs (T)']*$myrow['duration T, days'])));
    $Zkr1=0;
    $Zto1=$myrow['shop floor ratio']*( $Ztzar1+$Zmat1+$Zmtp1)+ $Zkr1;
    $K=$myrow['number of scaffold riders'];
    $M=1; //максимальное количество ездок (рейсов) машин, участвующих в перебазировании
    $Vn=40;///средняя скорость "нулевого" пробега, км/ч;
            $Zzpm1=$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']*($myrow['average distance of relocation, km']/$V*$M+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn*($M-1)+$Tpr/$myrow['number of scaffold riders']);
    $Zmc1= $myrow['the cost of the car escort, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
    $Ztg1= $myrow['costs for tractor, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
    $Zpr1= $myrow['costs for trailer, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
    $Zkran1= $myrow['crane costs, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
    $Zr1= $myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration'] *(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn)*$M+$Tpr/$K);
    $Zpm1=$n*($Zzpm1+$Zmc1+$Ztg1+$Zpr1+$Zkran1+$Zr1);
    $Zpb1= $Zpm*$myrow['Number of relocations per year']/$Tch1;
    $Zos1=0;

    $Cmch1= round($Za1+ $Zzp1+ $Zen1 + $Zto1+ $Zpb1+$Zos1,2) ;

            array_push($mass,$H);
            array_push($mass1, $Cmch1);
}

        array_push($mass,$H);
        array_push($mass1, $Cmch1);


    }
}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}

