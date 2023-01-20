<?php

include "../../server/authcontrol.php";
include "login.php";

ini_set("display_errors", 0);
error_reporting(0);

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

$checkCooldown = checkCooldown($kid);
if ($checkCooldown["success"] == "false") {
    die(json_encode($checkCooldown));
} else {
    addCooldown($kid);
}

function getEventDetails($cookies)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://viva.unicosigorta.com.tr/NonLife/Customer/Customer.aspx");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $GLOBALS["proxy"]);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $GLOBALS["proxyauth"]);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36");
    curl_setopt($ch, CURLOPT_COOKIE, $cookies);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Host: viva.unicosigorta.com.tr",
        "Origin: https://viva.unicosigorta.com.tr",
        "Pragma: no-cache",
        "Referer: https://viva.unicosigorta.com.tr/NonLife/Customer/Customer.aspx",
        'sec-ch-ua: " Not;A Brand";v="99", "Google Chrome";v="97", "Chromium";v="97"',
        "sec-ch-ua-mobile: ?0",
        'sec-ch-ua-platform: "Windows"',
        "Sec-Fetch-Dest: empty",
        "Sec-Fetch-Mode: cors",
        "Sec-Fetch-Site: same-origin"
    ));
    $result = curl_exec($ch);
    curl_close($ch);

    $doc = new DOMDocument();
    @$doc->loadHTML($result);
    $xpath = new DOMXPath($doc);
    $viewstateelement = $xpath->query("//input[@id='__VIEWSTATE']");
    if ($viewstateelement->length > 0) {
        $viewstate = $viewstateelement->item(0)->getAttribute("value");
    } else {
        return false;
    }
    $viewstate = $viewstateelement->item(0)->getAttribute("value");
    $viewstategeneratorelement = $xpath->query("//input[@id='__VIEWSTATEGENERATOR']");
    $viewstategenerator = $viewstategeneratorelement->item(0)->getAttribute("value");
    $eventvalidationelement = $xpath->query("//input[@id='__EVENTVALIDATION']");
    $eventvalidation = $eventvalidationelement->item(0)->getAttribute("value");

    return array(
        "viewstate" => $viewstate,
        "viewstategenerator" => $viewstategenerator,
        "eventvalidation" => $eventvalidation
    );
}

function getPersonDetail($cookies, $eventParams, $ad, $soyad)
{
    $queryarray = array();
    $queryarray["__EVENTTARGET"] = 'ctl00$smCoolite';
    $queryarray["__EVENTARGUMENT"] = "cphCFB_customerSearch_btnSearchCustomer|event|Click";
    $queryarray["__VIEWSTATE"] = $eventParams["viewstate"];
    $queryarray["__VIEWSTATEGENERATOR"] = $eventParams["viewstategenerator"];
    $queryarray["__EVENTVALIDATION"] = $eventParams["eventvalidation"];
    $queryarray["submitAjaxEventConfig"] = json_encode(array(
        "config" => [
            "extraParams" => [
                "txtCustomerName" => $ad,
                "txtCustomerSurname" => $soyad,
                "txtTCK" => "",
                "txtVergiNo" => "",
                "txtPasaportNo" => "",
                "txtMusteriNo" => "",
                "txtBankaMusteriNo" => "",
                "txtUnvan" => ""
            ]
        ]
    ));
    $query = http_build_query($queryarray);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://viva.unicosigorta.com.tr/NonLife/Customer/Customer.aspx");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $GLOBALS["proxy"]);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $GLOBALS["proxyauth"]);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36");
    curl_setopt($ch, CURLOPT_COOKIE, $cookies);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/x-www-form-urlencoded",
        "Content-Length: " . strlen($query),
        "Origin: https://viva.unicosigorta.com.tr",
        "Referer: https://viva.unicosigorta.com.tr/NonLife/Customer/Customer.aspx",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
        "Accept-Language: tr-TR,tr;q=0.8,en-US;q=0.6,en;q=0.4",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "Upgrade-Insecure-Requests: 1",
        "Connection: keep-alive",
        "X-Coolite: delta=true",
        "X-Requested-With: XMLHttpRequest"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    $result = curl_exec($ch);
    curl_close($ch);

    if (strpos($result, "Girilen kriterlere uygun Müsteri Veritabaninda kayitli degildir.") !== false) {
        return array();
    } else {
        $data = explode("cphCFB_customerSearch_StoreCustomerSearch.callbackRefreshHandler(response, {serviceResponse: {Data:{data:", $result);
        $data = explode(", totalCount", $data[1]);
        $data = str_replace('\\', "", $data[0]);
        $data = json_decode($data, true);
        return $data;
    }
}

$fileCookies = file_get_contents("cookie.txt");
$eventdetails = getEventDetails($fileCookies);

if ($eventdetails == false) {
    $first_session_cookie = getSessionId();
    $last_session_cookie = login($first_session_cookie);
    $first_token = getToken($last_session_cookie);
    $aspnet_session_cookies = getVivaSession($first_token);
    $fileCookies = file_get_contents("cookie.txt");
    $eventdetails = getEventDetails($fileCookies);

    if ($eventdetails == false) {
        die(json_encode(array("success" => "false", "message" => "login error")));
    }
}

$result = getPersonDetail($fileCookies, $eventdetails, $ad, $soyad);
$number = count($result);

wizortbook($sorguURL, "Sorgu Denetleyicisi", "Ad Soyad Sorgu", "**$kadi** isimli üye **$ad** - **$soyad** için sorgu yaptı!");

if ($number < 1) {
    die(json_encode(array("success" => "false", "message" => "not found")));
} else {
    $data = array();
    foreach ($result as $key => $value) {
        array_push($data, array(
            "tc" => $value["TCK_VKN"],
            "ad" => $value["AD_SOYAD_UNVAN"],
            "dogumtarihi" => explode("T", $value["DOGUM_YILI"])[0],
            "babaadi" => $value["BABA_ADI"]
        ));
    }
    die(json_encode(array("success" => "true", "number" => $number, "data" => $data)));
}
