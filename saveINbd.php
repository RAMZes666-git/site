<?php

$id_mash=$_REQUEST['id_mash'];
$gd_rejim = $_REQUEST['gd_rejim'];
$armotiz=$_REQUEST['armotiz'];
$zatraty_machinistov=$_REQUEST['zatraty_machinistov'];
$ztr_energo=$_REQUEST['ztr_energo'];
$ztr_zarplaty=$_REQUEST['ztr_zarplaty'];
$ztr_mat=$_REQUEST['ztr_mat'];
$zatraty_tex=$_REQUEST['zatraty_tex'];
$zatr_mach_h=$_REQUEST['zatr_mach_h'];
$zatr_kapremont=$_REQUEST['zatr_kapremont'];
$zatr_to=$_REQUEST['zatr_to'];
$zatr_perebaz=$_REQUEST['zatr_perebaz'];
$zatr_zarpl_mash=$_REQUEST['zatr_zarpl_mash'];
$zatr_soprov=$_REQUEST['zatr_soprov'];
$zatr_tygach=$_REQUEST['zatr_tygach'];
$zatr_pricep=$_REQUEST['zatr_pricep'];
$zatr_kran=$_REQUEST['zatr_kran'];
$zatr_zarplata=$_REQUEST['zatr_zarplata'];
$zatr_osnastka=$_REQUEST['zatr_osnastka'];
$cmch1=$_REQUEST['cmch1'];
$nakladnye=$_REQUEST['nakladnye'];
$zarplata_nakladnye=$_REQUEST['zarplata_nakladnye'];
$planovye=$_REQUEST['planovye'];
$zarplata_planovye=$_REQUEST['zarplata_planovye'];
$otpysk=$_REQUEST['otpysk'];
$vyslyga_let=$_REQUEST['vyslyga_let'];
$ns=$_REQUEST['ns'];
$prochie_zatraty=$_REQUEST['prochie_zatraty'];
$inov_fond=$_REQUEST['inov_fond'];
$soc_straxovanie=$_REQUEST['soc_straxovanie'];
$cx_nalog=$_REQUEST['cx_nalog'];
$nalogi=$_REQUEST['nalogi'];
$prc2=$_REQUEST['prc2'];
$edinyi_platej=$_REQUEST['edinyi_platej'];
$nds1=$_REQUEST['nds1'];
$prc_nalog=$_REQUEST['prc_nalog'];

$serverName = "DESKTOP-0F1BV3M\SQLKYRS";
$connectionInfo = ARRAY("Database"=>"BDsite");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

IF( $conn ) {

    $result = sqlsrv_query($conn, " INSERT INTO actual_values
                                        VALUES ( GETDATE(),'$id_mash','$gd_rejim','$armotiz','$zatraty_machinistov', '$ztr_energo','$ztr_zarplaty','$ztr_mat','$zatraty_tex','$zatr_mach_h','$zatr_kapremont',
                                        '$zatr_to','$zatr_perebaz','$zatr_zarpl_mash','$zatr_soprov','$zatr_tygach','$zatr_pricep','$zatr_kran','$zatr_zarplata','$zatr_osnastka',
                                        '$cmch1','$nakladnye','$zarplata_nakladnye','$planovye','$zarplata_planovye','$otpysk','$vyslyga_let','$ns','$prochie_zatraty','$inov_fond',
                                        '$soc_straxovanie','$cx_nalog','$nalogi','$prc2','$edinyi_platej','$nds1','$prc_nalog' ) ");


    echo '<script> window.alert('.'"'.'Успешно сохранено'.'"'.') </script>';
?>

<script>
    document.location.href="CalcDBsite.php"
</script>

<?php
}
ELSE
{
    echo "Connection could not be established.\n";
    DIE(print_r(sqlsrv_errors(), true));
}

?>

