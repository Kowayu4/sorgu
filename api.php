<?php

include "../../server/authcontrol.php";

ini_set("display_errors", 0);
error_reporting(0);

if (empty($_POST["tc"])) {
    die(json_encode(array("success" => "false", "message" => "param error")));
}

$tc = $_POST["tc"];

$query = http_build_query(array(
    "tc" => $tc,
    "auth" => "f9OqyqPRmGhuZZJWjIzP0cikrNlUsImDZGJkYWyCj6DRmm1tU91ubGFTeNKmn8e9l5tmtmVbWRwkpZug4l9gIaxfI1X0aCknlepm8eg1YyEeJ3Yo8akmRiZl9hkGxvnJpnaWiFi5melKnLZWiVnWBsag"
));

$checkCooldown = checkCooldown($kid);
if ($checkCooldown["success"] == "false") {
    die(json_encode($checkCooldown));
} else {
    addCooldown($kid);
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://141.98.1.98/wizort/api/osym/api.php?$query");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;

wizortbook($sorguURL, "Sorgu Denetleyicisi", "Vesikalık Sorgu", "**$kadi** isimli üye **$tc** için sorgu yaptı!");