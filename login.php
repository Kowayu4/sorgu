<?php

ini_set("display_errors", 0);
error_reporting(0);

$proxy = "185.254.239.21:80";
$proxyauth = "cyleallah:123456789!cyle";

function Capture($str, $starting_word, $ending_word)
{
    $subtring_start  = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);
    $size            = strpos($str, $ending_word, $subtring_start) - $subtring_start;
    return substr($str, $subtring_start, $size);
};

function getSessionId()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.unicosigorta.com.tr/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $GLOBALS["proxy"]);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $GLOBALS["proxyauth"]);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }

    return "JSESSIONID=" . $cookies["JSESSIONID"] . "; NSC_OFX-xxx.vojdptjhpsub.dpn.us=" . $cookies["NSC_OFX-xxx_vojdptjhpsub_dpn_us"];
}

function login($cookievar)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.unicosigorta.com.tr/online-islemler/authenticate?r=" . mt_rand());
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $GLOBALS["proxy"]);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $GLOBALS["proxyauth"]);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_COOKIE, $cookievar);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ACN202100176&password=Antalya10.&ip=");
    $result = curl_exec($ch);
    curl_close($ch);

    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }

    return $cookievar . "; rememberMe=" . $cookies["rememberMe"];
}

function getToken($cookievar)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.unicosigorta.com.tr/service/get-token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $GLOBALS["proxy"]);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $GLOBALS["proxyauth"]);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_COOKIE, $cookievar);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result, true);
    return $result["tokenForViva"];
}

function getVivaSession($token)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://viva.unicosigorta.com.tr/Login.aspx?ReturnUrl=/NonLife/Customer/Customer.aspx?ALU=$token&ALU=$token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $GLOBALS["proxy"]);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $GLOBALS["proxyauth"]);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "method" => "GET",
        "accept" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
        "accept-encoding" => "gzip, deflate, br",
        "accept-language" => "tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7",
        "cache-control" => "no-cache",
    ));
    $result = curl_exec($ch);
    curl_close($ch);

    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }

    $cookieText = "ASP.NET_SessionId=" . $cookies["ASP_NET_SessionId"] . "; customAuth=" . $cookies["customAuth"] . "; customAuth-1=" . $cookies["customAuth-1"] . "; Uncs=" . $cookies["Uncs"];

    $file = fopen("cookie.txt", "w");
    fwrite($file, $cookieText);
    fclose($file);

    return $cookieText;
}
