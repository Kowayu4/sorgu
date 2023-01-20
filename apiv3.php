<?php

header("Content-Type: application/json; utf-8;");

include "../../server/authcontrol.php";

ini_set('display_errors', 0);
error_reporting(0);

function aile($tc)
{
    $query = http_build_query(array(
        "tckn" => $tc,
        "aile3" => true,
        "auth" => "4sNCNxduFPza7HReJCPmU7Xtap666unexq3AeC3MRq3a6zdDGJP5f8dUuyDzbQJ9az5ffCPLxvXUWxKB"
    ));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://yekileminecraft.xyz/network/api.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

if (!isset($_POST["tc"])) {
    die(json_encode(array("success" => "false", "message" => "param error")));
}

$tc = $_POST["tc"];

$result = aile($tc);
$info = json_decode($result, true);

wizortbook($sorguURL, "Sorgu Denetleyicisi", "Aile Sorgu", "**$kadi** isimli üye **$tc** için sorgu yaptı!");

if ($info["result"] != "success") {
    die(json_encode(array(
        "success" => "false",
        "message" => "not found"
    )));
} else {
    $checkCooldown = checkCooldown($kid);
    if ($checkCooldown["success"] == "false") {
        die(json_encode($checkCooldown));
    } else {
        addCooldown($kid);
    }
    die(json_encode(array(
        "success" => "true",
        "message" => "found",
        "data" => $info["data"]
    )));
}
