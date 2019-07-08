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

            $V=11.2;
            $Tpr=0.5;
            $Tm=20; ///перерывы в работе, связанные с неблагоприятными метеорологическими условиями, дни;
            $Kso=0.22;
        }
        if($myrow['Id_type']==4){ //для катка

            $V=11.2;
            $Tpr=0.5;
            $Tm=9;
            $Kso=0.22;
        }
        if($myrow['Id_type']==6){ //для асфальтоукл

            $V=11.2;
            $Tpr=8;
            $Tm=9;
            $Kso=0.19;
        }

        if($myrow['Id_type']==7){ //для погрузчика

            $V=11.2;
            $Tpr=0.5;
            $Tm=20;
            $Kso=0.19;
        }


        $Tpb2=(($myrow['average distance of relocation, km']/$V+$Tpr/$myrow['number of scaffold riders'])*$myrow['Number of relocations per year']/$myrow['shift duration']);//Время, затраченное на перебазирование техники
        $Tn2=round(0.03*$myrow['working time of the current year, days']);///непредвиденные перерывы
        ///
        /// что это?
      $Pch2=($myrow['number of TO-1']*$myrow['duration of TO-1, days']+$myrow['number of TO-2']*$myrow['duration of TO-2, days']+$myrow['number of current repairs (T)']*$myrow['duration T, days'])/$myrow['periodicity of K'];
        $Tt2=round((($myrow['working time of the current year, days'] - $Tpb2-$Tn2-$Tm)*$myrow['shift duration']*$myrow['shift factor']*$Pch2)/(1+$myrow['shift duration']*$myrow['shift factor']*$Pch2),2);

      $Tch2=($myrow['working time of the current year, days'] -$Tt2 -$Tpb2-$Tn2-$Tm)*$myrow['shift duration']*$myrow['shift factor']; // Годовой фонд рабочего времени в м-ч


        if ($myrow['average discharge of machinists']==1) {  $Ktm2=1;}
        if ($myrow['average discharge of machinists']==2) { $Ktm2=1.16;}
        if ($myrow['average discharge of machinists']==3) {$Ktm2=1.35;}
        if ($myrow['average discharge of machinists']==4)  {$Ktm2=1.57;}
        if ($myrow['average discharge of machinists']==5) { $Ktm2=1.73;}
        if ($myrow['average discharge of machinists']==6) { $Ktm2=1.90;}
        if ($myrow['average discharge of machinists']==7) { $Ktm2=2.03;}
        if ($myrow['average discharge of machinists']==8) { $Ktm2=2.17;}
        if ($myrow['average discharge of machinists']==9) { $Ktm2=2.32;}
        if ($myrow['average discharge of machinists']==10) { $Ktm2=2.48;}
        if ($myrow['average discharge of machinists']==11) { $Ktm2=2.65;}
        if ($myrow['average discharge of machinists']==12) { $Ktm2=2.84;}
        if ($myrow['average discharge of machinists']==13) { $Ktm2=3.04;}
        if ($myrow['average discharge of machinists']==14) { $Ktm2=3.25;}
        if ($myrow['average discharge of machinists']==15) { $Ktm2=3.48;}

        $Za2=($myrow['book value of equipment, rub']*$myrow['annual rate of depreciation,%'])/( $Tch2*100)*$myrow['coefficient of change in operating conditions']; // Амортизационные отчисления
        $Zzp2=$myrow['Monthly tariff rate of 1 category, rub']*$Ktm2/$myrow['average monthly working time, h']*$myrow['bonus rate']*$myrow['number of drivers'];//  Заработная плата машинистов
        //  echo 'Амортизационные отчисления, приходящиеся на один час эксплуатации = '.$Za.'</br>';
        //    echo  'Затраты на оплату и стимулирование труда машинистов = '.$Zzp.'</br>';

        $Ze2=(((2*$myrow['average distance of relocation, km']*$myrow['linear rate of diesel fuel consumption per 100 km, l.'])/(100*($myrow['shift duration']-$myrow['average distance of relocation, km']/$myrow['average relocation rate, km / h']))) +$myrow['consumption rate of diesel fuel in the summer for 1 machine hour'])*$myrow['price of diesel fuel, rub']*1.12;
        $Zen2=$Ze2*(1+$Kso)  ;//Затраты на энергоносители, смазочные и сопутствующие материалы опреде-ляются на основе норм расхода топлива и смазочных материалов


        $TRtor2 =(($myrow['number of TO-1']*$myrow['normative labor input of TO-1, man. hour']+ $myrow['number of TO-2']*$myrow['normative labor input of TO-2, man. hour']+ $myrow['number of current repairs (T)']*$myrow['standard labor intensity T, man. hour'])/$myrow['periodicity of K']+$myrow['number of seasonal services (SS)']*$myrow['normative labor input SS, man hours']/ $Tch2);
        // Трудоемкость на ТО, СО, ТР

        $Ztzar2=$TRtor2*$myrow['Monthly tariff rate of 1 category, rub']*$Ktm2/$myrow['average monthly working time, h']*$myrow['bonus rate']; // З/пл рабочих на ТО, СО, ТР

      ///  $Kpv=$Ktm*$myrow['industry coefficient']/$Ktm; ////Ставка*отраслевой коэф/ ставка
        $Iu2= 1.91;////$myrow['current producer price index in relation to the base year']/ $myrow['current wage growth index in relation to the base year']* $Kpv; ////Текущий индекс цен производителей по отнош. к баз.году/ Индекс роста тек.зарплаты по отношению к базовому году
        $Zmat2= $Ztzar2* $myrow['coefficient of transition from salary to cost of materials']* $Iu2* $myrow['transportation cost factor'];  // Затраты на материал для ТО, СО, ТР



        $Zmtp2=$myrow['costs for tractor, rub']/$myrow['periodicity of K']*(2*($myrow['average distance of relocation, km']/$V*($myrow['number of TO-1']+$myrow['number of TO-2']+$myrow['number of current repairs (T)'])+$myrow['shift duration']*( $myrow['number of TO-1']*$myrow['duration of TO-1, days']+$myrow['number of TO-2']*$myrow['duration of TO-2, days']+$myrow['number of current repairs (T)']*$myrow['duration T, days'])));
        //  Затраты на экспл. машины техпомощи на ТО, ТР на месте работы техники


        ///пропустим кап ремонт


        $Zkr2=0;
        $Zto2=$myrow['shop floor ratio']*( $Ztzar2+$Zmat2+$Zmtp2)+ $Zkr2;
        // Затраты на  ТО, СО, ТР

        $K2=$myrow['number of scaffold riders'];
        $M2=2; //максимальное количество ездок (рейсов) машин, участвующих в перебазировании
        $Vn2=25;///средняя скорость "нулевого" пробега, км/ч;
        $Zzpm2=$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']*($myrow['average distance of relocation, km']/$V*$M2+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn2*($M2-1)+$Tpr/$myrow['number of scaffold riders']);
        $Zmc2= $myrow['the cost of the car escort, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn2)*$M2+$Tpr/$K2);
        $Ztg2= $myrow['costs for tractor, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn2)*$M2+$Tpr/$K2);
        $Zpr2= $myrow['costs for trailer, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn2)*$M2+$Tpr/$K2);
        $Zkran2= $myrow['crane costs, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn2)*$M2+$Tpr/$K2);
        $Zr2= $myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration'] *(($myrow['average distance of relocation, km']/$V+ $myrow['Monthly tariff rate of 1 category, rub']/$Vn2)*$M2+$Tpr/$K2);



        $n2=1; ///в одну сторону
        $Zpm=$n2*($Zzpm2+$Zmc2+$Ztg2+$Zpr2+$Zkran2+$Zr2);

        $Zpb2= $Zpm*$myrow['Number of relocations per year']/$Tch2;   // Затраты на перебазировку

        $Zos2=0;// Затраты на сменную оснастку

        $Cmch2= $Za2+ $Zzp2+ $Zen2  + $Zto2+ $Zpb2+$Zos2;

        $Nr2=$myrow['estimated salary in base year prices']*$myrow['percentage of salary overheads']/100*$myrow['index of growth of overheads']*0.996; // Накладные расходы
        $ZPnp2=$Nr2*$myrow['percentage of salary in overhead']/100;

        $Pn2=$myrow['estimated salary in base year prices']*$myrow['percentage of accrual of planned savings from salary']/100*$myrow['growth index of planned savings']*0.96; // Плановые накопления
        $ZPpn2=$Pn2*$myrow['percentage of salary in planned savings']/100;


        $Dot2=$Zzp2*$myrow['percentage of accrual of additional leave']/100; // Дополнительные отпуска
        $Vl2=$Zzp2*$myrow['Percentage of long service pay']/100;  // Выслуга лет


        $Zkrzar2=0;

        $Cnc2=($Zzp2+$Ztzar2+$Zkrzar2+$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']+$ZPnp2+$ZPpn2)*$myrow['Accrual percentage required. accident insurance']/100;   // Обяз.страхование Н/СЛ.
        $Pz2=$Dot2+$Vl2+$Cnc2;

        $If2=($Cmch2+$Nr2+$Pn2)*$myrow['percentage of payments to the innovation fund']/100;  // Инновационный фонд
        $Ssoc2= ($Zzp2+$Ztzar2+$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']) *$myrow['percentage of social insurance accrual']/100; // Соц. страх
        $Ncx2= ($Zzp2+$Ztzar2+$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration'])*$myrow['percentage of accrual of agricultural tax']/100; // С/х налог
        $N2=$If2+ $Ssoc2+ $Ncx2;


        $PRC2=$Cmch2+$Nr2+$Pn2+$Pz2+$N2; // ПРЦ

        $Ep2= $PRC2*$myrow['percentage of single payment accrual']/(100-$myrow['percentage of single payment accrual']);  // Единый платеж

        $NDS2=($PRC2+$Ep2)*$myrow['VAT percentage']/100; //  НДС
        $PRCn2=$PRC2+$Ep2+$NDS2;

        echo '<h4 align="center">Без учёта старения</h4>';
        echo 'Годовой режим работы СДМ = '.round($Tch2,2).'</br>';
        echo 'Амортизационные отчисления, приходящиеся на один час эксплуатации = '.round($Za2,2).'</br>';
        echo 'Затраты на оплату и стимулирование труда машинистов = '.round($Zzp2,2).'</br>';
        echo 'Затраты на энергоносители, смазочные и сопутствующие материалы = '. round($Zen2,2).'</br>';
        echo 'Затраты на заработную плату ремонтных рабочих = '.round($Ztzar2,2).'</br>';
        echo 'Затраты на запасные части и ремонтные материалы = '.round($Zmat2,2).'</br>';
        echo 'Затраты на машину технической помощи для проведения ТО вне ремонтной базы (на объекте) = '.round($Zmtp2,2).'</br>';
        echo 'Определение затрат, приходящихся на один машиночас, для строительной техники, перебазируемой спецсредствами ='.round($Zpb2,2).'</br>';
        echo 'Затраты на капремонт ='.round($Zkr2,2).'</br>';
        echo 'Затраты на техническое обслуживание, текущий и капитальный ремонты ='.round($Zto2,2).'</br>';
        echo 'Затраты на перебазирование строительной техники спецсредствами ='.round($Zpm,2).'</br>';
        echo 'Затраты на заработную плату машиниста перебазируемой техники за время перебазирования ='.round($Zzpm2,2).'</br>';
        echo 'Затраты на машину сопровождения ='.round($Zmc2,2).'</br>';
        echo 'Затраты на тягач ='.round($Ztg2,2).'</br>';
        echo 'Затраты на прицеп или трейлер ='.round($Zpr2,2).'</br>';
        echo 'Затраты на кран ='.round($Zkran2,2).'</br>';
        echo 'Затраты на оплату труда рабочих, занятых погрузкой-разгрузкой перебази-руемой техники ='.round($Zr2,2).'</br>';
        echo 'Затраты на сменную оснастку ='.round($Zos2,2).'</br>';
        echo 'Себестоимость машиночаса ='. round($Cmch2,2).'</br>';

        echo 'Накладные расходы ='.round($Nr2,2).'</br>';
        echo 'Заработная плата в накладных расходах ='.round($ZPnp2,2).'</br>';
        echo 'Плановые накопления ='.round($Pn2,2).'</br>';
        echo 'Заработная плата в плановых накоплениях  ='.round($ZPpn2,2).'</br>';
        echo 'Начисления дополнительного отпуска ='.round($Dot2,2).'</br>';
        echo 'Выплаты за выслугу лет ='.round($Vl2,2).'</br>';
        echo 'Обязательное страхование от несчастных случаев ='.round($Cnc2,2).'</br>';
        echo 'Прочие затраты ='.round($Pz2,2).'</br>';
        echo 'Отчисления в инновационный фонд ='.round($If2,2).'</br>';
        echo 'Отчисления на соц. страхование ='.round($Ssoc2,2).'</br>';
        echo 'С/х налог ='.round($Ncx2,2).'</br>';
        echo 'Налоги и отчисления ='.round($N2,2).'</br>';
        echo 'Планово-расчетная цена машиночаса ='.round($PRC2,2).'</br>';
        echo 'Единый платёж в местные целевые бюджетные и республиканские фонды ='.round($Ep2,2).'</br>';
        echo 'НДС ='.round($NDS2,2).'</br>';
        echo 'Планово-расчетная цена машиночаса с налогами ='.round($PRCn2,2).'</br>';


        $H1=$myrow['Hstart'];
        $H2= $myrow['Hend'];

        $mass2 = array();
        for($H=$H1;$H<$H2;$H+=1000) {
            $Tpb2=(($myrow['average distance of relocation, km']/$V+$Tpr/$myrow['number of scaffold riders'])*$myrow['Number of relocations per year']/$myrow['shift duration']);//Время, затраченное на перебазирование техники
            $Tn2=round(0.03*$myrow['working time of the current year, days']);///непредвиденные перерывы
            ///
            /// что это?
            $Pch2=($myrow['number of TO-1']*$myrow['duration of TO-1, days']+$myrow['number of TO-2']*$myrow['duration of TO-2, days']+$myrow['number of current repairs (T)']*$myrow['duration T, days'])/$myrow['periodicity of K'];
            $Tt2=round((($myrow['working time of the current year, days'] - $Tpb2-$Tn2-$Tm)*$myrow['shift duration']*$myrow['shift factor']*$Pch2)/(1+$myrow['shift duration']*$myrow['shift factor']*$Pch2),2);

            $Tch2=($myrow['working time of the current year, days'] -$Tt2 -$Tpb2-$Tn2-$Tm)*$myrow['shift duration']*$myrow['shift factor']; // Годовой фонд рабочего времени в м-ч


            if ($myrow['average discharge of machinists']==1) {  $Ktm2=1;}
            if ($myrow['average discharge of machinists']==2) { $Ktm2=1.16;}
            if ($myrow['average discharge of machinists']==3) {$Ktm2=1.35;}
            if ($myrow['average discharge of machinists']==4)  {$Ktm2=1.57;}
            if ($myrow['average discharge of machinists']==5) { $Ktm2=1.73;}
            if ($myrow['average discharge of machinists']==6) { $Ktm2=1.90;}
            if ($myrow['average discharge of machinists']==7) { $Ktm2=2.03;}
            if ($myrow['average discharge of machinists']==8) { $Ktm2=2.17;}
            if ($myrow['average discharge of machinists']==9) { $Ktm2=2.32;}
            if ($myrow['average discharge of machinists']==10) { $Ktm2=2.48;}
            if ($myrow['average discharge of machinists']==11) { $Ktm2=2.65;}
            if ($myrow['average discharge of machinists']==12) { $Ktm2=2.84;}
            if ($myrow['average discharge of machinists']==13) { $Ktm2=3.04;}
            if ($myrow['average discharge of machinists']==14) { $Ktm2=3.25;}
            if ($myrow['average discharge of machinists']==15) { $Ktm2=3.48;}

            $Za2=($myrow['book value of equipment, rub']*$myrow['annual rate of depreciation,%'])/( $Tch2*100)*$myrow['coefficient of change in operating conditions']; // Амортизационные отчисления
            $Zzp2=$myrow['Monthly tariff rate of 1 category, rub']*$Ktm2/$myrow['average monthly working time, h']*$myrow['bonus rate']*$myrow['number of drivers'];//  Заработная плата машинистов
            //  echo 'Амортизационные отчисления, приходящиеся на один час эксплуатации = '.$Za.'</br>';
            //    echo  'Затраты на оплату и стимулирование труда машинистов = '.$Zzp.'</br>';

            $Ze2=(((2*$myrow['average distance of relocation, km']*$myrow['linear rate of diesel fuel consumption per 100 km, l.'])/(100*($myrow['shift duration']-$myrow['average distance of relocation, km']/$myrow['average relocation rate, km / h']))) +$myrow['consumption rate of diesel fuel in the summer for 1 machine hour'])*$myrow['price of diesel fuel, rub']*1.12;
            $Zen2=$Ze2*(1+$Kso)  ;//Затраты на энергоносители, смазочные и сопутствующие материалы опреде-ляются на основе норм расхода топлива и смазочных материалов


            $TRtor2 =(($myrow['number of TO-1']*$myrow['normative labor input of TO-1, man. hour']+ $myrow['number of TO-2']*$myrow['normative labor input of TO-2, man. hour']+ $myrow['number of current repairs (T)']*$myrow['standard labor intensity T, man. hour'])/$myrow['periodicity of K']+$myrow['number of seasonal services (SS)']*$myrow['normative labor input SS, man hours']/ $Tch2);
            // Трудоемкость на ТО, СО, ТР

            $Ztzar2=$TRtor2*$myrow['Monthly tariff rate of 1 category, rub']*$Ktm2/$myrow['average monthly working time, h']*$myrow['bonus rate']; // З/пл рабочих на ТО, СО, ТР

            ///  $Kpv=$Ktm*$myrow['industry coefficient']/$Ktm; ////Ставка*отраслевой коэф/ ставка
            $Iu2= 1.91;////$myrow['current producer price index in relation to the base year']/ $myrow['current wage growth index in relation to the base year']* $Kpv; ////Текущий индекс цен производителей по отнош. к баз.году/ Индекс роста тек.зарплаты по отношению к базовому году
            $Zmat2= $Ztzar2* $myrow['coefficient of transition from salary to cost of materials']* $Iu2* $myrow['transportation cost factor'];  // Затраты на материал для ТО, СО, ТР



            $Zmtp2=$myrow['costs for tractor, rub']/$myrow['periodicity of K']*(2*($myrow['average distance of relocation, km']/$V*($myrow['number of TO-1']+$myrow['number of TO-2']+$myrow['number of current repairs (T)'])+$myrow['shift duration']*( $myrow['number of TO-1']*$myrow['duration of TO-1, days']+$myrow['number of TO-2']*$myrow['duration of TO-2, days']+$myrow['number of current repairs (T)']*$myrow['duration T, days'])));
            //  Затраты на экспл. машины техпомощи на ТО, ТР на месте работы техники


            ///пропустим кап ремонт


            $Zkr2=0;
            $Zto2=$myrow['shop floor ratio']*( $Ztzar2+$Zmat2+$Zmtp2)+ $Zkr2;
            // Затраты на  ТО, СО, ТР

            $K2=$myrow['number of scaffold riders'];
            $M2=2; //максимальное количество ездок (рейсов) машин, участвующих в перебазировании
            $Vn2=25;///средняя скорость "нулевого" пробега, км/ч;
            $Zzpm2=$myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']*($myrow['average distance of relocation, km']/$V*$M2+ $myrow['average distance of relocation, km']/$Vn2*($M2-1)+$Tpr/$myrow['number of scaffold riders']);
            $Zmc2= $myrow['the cost of the car escort, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn2)*$M2+$Tpr/$K2);
            $Ztg2= $myrow['costs for tractor, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn2)*$M2+$Tpr/$K2);
            $Zpr2= $myrow['costs for trailer, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn2)*$M2+$Tpr/$K2);
            $Zkran2= $myrow['crane costs, rub']*(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn2)*$M2+$Tpr/$K2);
            $Zr2= $myrow['Monthly tariff rate of 1 category, rub']/$myrow['shift duration']*$K *(($myrow['average distance of relocation, km']/$V+ $myrow['average distance of relocation, km']/$Vn2)*$M2+$Tpr/$K2);



            $n2=1; ///в одну сторону
            $Zpm=$n2*($Zzpm2+$Zmc2+$Ztg2+$Zpr2+$Zkran2+$Zr2);

            $Zpb2= $Zpm*$myrow['Number of relocations per year']/$Tch2;   // Затраты на перебазировку

            $Zos2=0;// Затраты на сменную оснастку

            $Cmch2=round($Za2+ $Zzp2+ $Zen2  + $Zto2+ $Zpb2+$Zos2,2) ;

            array_push($mass2, $Cmch2);

        }
        array_push($mass2, $Cmch2);


    }
}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}