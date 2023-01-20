<?php
require_once('../../server/authcontrol.php');

error_reporting(E_ERROR | E_PARSE);

$lista = htmlspecialchars($_GET["lista"]);
$listav2 = $lista;

$listav2 = str_replace(array(":", ";", ",", "|", "»", "/"," ", "\\"), "|", $listav2);
$listav2 = str_replace(array("||", "-", "/", " \ ", ".", ",", "|||"), "|", $listav2);
$listav2 = str_replace(array("||", "|||"), "|", $listav2);
$listav2 = str_replace(array("||", "|||"), "|", $listav2);
$listav2 = str_replace(array("||", "|||"), "|", $listav2);
$listav2 = str_replace(array("|19|"), "|2019|", $listav2);
$listav2 = str_replace(array("|20|"), "|2020|", $listav2);
$listav2 = str_replace(array("|21|"), "|2021|", $listav2);
$listav2 = str_replace(array("|22|"), "|2022|", $listav2);
$listav2 = str_replace(array("|23|"), "|2023|", $listav2);
$listav2 = str_replace(array("|24|"), "|2024|", $listav2);
$listav2 = str_replace(array("|25|"), "|2025|", $listav2);
$listav2 = str_replace(array("|26|"), "|2026|", $listav2);
$listav2 = str_replace(array("|27|"), "|2027|", $listav2);
$listav2 = str_replace(array("|28|"), "|2028|", $listav2);
$listav2 = str_replace(array("|29|"), "|2029|", $listav2);
$listav2 = str_replace(array("|01|"), "|01|", $listav2);
$listav2 = str_replace(array("|02|"), "|02|", $listav2);
$listav2 = str_replace(array("|03|"), "|03|", $listav2);
$listav2 = str_replace(array("|04|"), "|04|", $listav2);
$listav2 = str_replace(array("|05|"), "|05|", $listav2);
$listav2 = str_replace(array("|06|"), "|06|", $listav2);
$listav2 = str_replace(array("|07|"), "|07|", $listav2);
$listav2 = str_replace(array("|08|"), "|08|", $listav2);
$listav2 = str_replace(array("|09|"), "|09|", $listav2);

$separa = explode("|", $listav2);
$cc = trim($separa[0]);
$mes = trim($separa[1]);
$ano = trim($separa[2]);
$cvv = trim($separa[3]);

$saycc = strlen($cc);
$saymes = strlen($mes);
$sayano = strlen($ano);
$saycvv = strlen($cvv);
$paylas = "";
$tamamlandi = 0;



if($saycc == '16'){
$paylas .= "$cc|";
	$tamamlandi++;
}

if($saymes == '2' or $saymes == '1'){
$paylas .= "$mes|";
	$tamamlandi++;
}

if($sayano == '2' or $sayano == '4'){
$paylas .= "$ano|";
	$tamamlandi++;
}

if($saycvv == '3' && is_numeric($cvv)){
$paylas .= "$cvv";
	$tamamlandi++;
}

if($tamamlandi == 4){
echo "&nbsp;&nbsp;&nbsp;&nbsp;<span class='duzeltildi'>$paylas</br>";
}else{
echo "&nbsp;&nbsp;&nbsp;&nbsp;<span class='duzeltilemedi'>$lista</br>";
}