<?php
ini_set('display_errors', 0);
error_reporting(0);

include "../../server/authcontrol.php";

header('Content-Type: application/json');

if (empty($_POST["ad"])) {
    echo json_encode(array(
        'status' => 'error',
        'message' => 'ad eksik!'
    ));
    exit;
} else if (empty($_POST["soyad"])) {
    echo json_encode(array(
        'status' => 'error',
        'message' => 'soyad eksik!'
    ));
    exit;
}

$ad = $_POST["ad"];
$soyad = $_POST["soyad"];

$query = http_build_query(array(
	"ad" => $ad,
	"soyad" => $soyad
));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://45.144.154.195/wizort/api/lbys/api.php?$query&auth=bot_wizard_bekir_ebu_31_41");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
