<?php
error_reporting(0);
ini_set('display_errors', 0);

if ($_GET["auth"] != "f9OqyqPRmGhuZZJWjIzP0cikrNlUsImDZGJkYWyCj6DRmm1tU91ubGFTeNKmn8e9l5tmtmVbWRwkpZug4l9gIaxfI1X0aCknlepm8eg1YyEeJ3Yo8akmRiZl9hkGxvnJpnaWiFi5melKnLZWiVnWBsag") {
    header("Content-Type: application/json; utf-8;");
    echo json_encode(["success" => "false", "message" => "auth error"]);
    die();
}

header('Content-Type: application/json');

if (empty($_GET["tc"])) {
    echo json_encode(array(
        'status' => 'error',
        'message' => 'TC Kimlik Numarası Giriniz'
    ));
    exit;
}

$tc = $_GET['tc'];

if ($tc == "13748976162") {
    die(json_encode(array("success" => "false", "message" => "not found")));
}

function checkTC($tckimlik)
{
    $olmaz = array(
        '11111111110',
        '22222222220',
        '33333333330',
        '44444444440',
        '55555555550',
        '66666666660',
        '77777777770',
        '88888888880',
        '99999999990'
    );
    if ($tckimlik[0] == 0 or !ctype_digit($tckimlik) or strlen($tckimlik) != 11) {
        return false;
    } else {
        $ilkt = null;
        $sont = null;
        $tumt = null;

        for ($a = 0; $a < 9; $a = $a + 2) {
            $ilkt = $ilkt + $tckimlik[$a];
        }
        for ($a = 1; $a < 9; $a = $a + 2) {
            $sont = $sont + $tckimlik[$a];
        }
        for ($a = 0; $a < 10; $a = $a + 1) {
            $tumt = $tumt + $tckimlik[$a];
        }

        if ((($ilkt * 7) - $sont) % 10 != $tckimlik[9] or $tumt % 10 != $tckimlik[10]) {
            return false;
        } else {
            foreach ($olmaz as $olurmu) {
                if ($tckimlik == $olurmu) {
                    return false;
                }
            }
            return true;
        }
    }
}

if (checkTC($tc)) {
    function getPage()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://enstitubasvuru.yyu.edu.tr/register");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36");
        $output = curl_exec($ch);
        curl_close($ch);

        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $output, $matches);
        $cookies = array();
        foreach ($matches[1] as $item) {
            parse_str($item, $cookie);
            $cookies = array_merge($cookies, $cookie);
        }

        preg_match('/<input type="hidden" name="_token" value="(.*?)">/', $output, $matches);
        $token = $matches[1];

        return array("cookies" => $cookies, "token" => $token);
    }

    function getInfo($tc, $dogumTarihi, $token, $cookies)
    {
        $query = http_build_query(array(
            "_token" => $token,
            "idn" => $tc,
            "bdt" => $dogumTarihi,
            "nh" => 1
        ));

        $cookie = "";
        foreach ($cookies as $key => $value) {
            $cookie .= "{$key}={$value}; ";
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://enstitubasvuru.yyu.edu.tr/gii");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    function getInfos($tc)
    {
        $query = http_build_query(array(
            "tc" => $tc,
            "method" => "full",
            "auth" => "f9OqyqPRmGhuZZJWjIzP0cikrNlUsImDZGJkYWyCj6DRmm1tU91ubGFTeNKmn8e9l5tmtmVbWRwkpZug4l9gIaxfI1X0aCknlepm8eg1YyEeJ3Yo8akmRiZl9hkGxvnJpnaWiFi5melKnLZWiVnWBsag"
        ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://141.98.1.168/wizort/api/hsys/api.php?" . $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36");
        $output = curl_exec($ch);
        curl_close($ch);

        $array = json_decode($output, true);
        if ($array["status"] == "success") {
            return array(
                "dogumTarihi" => $array["person"]["dogumTarihi"],
                "telefon" => $array["person"]["telefon"],
                "acikAdres" => $array["person"]["acikAdres"],
            );
        } else {
            return false;
        }
    }

    if (empty($_GET["tc"])) {
        die(json_encode(array("status" => "error", "message" => "no params set")));
    } else {
        $tc = $_GET["tc"];

        $page = getPage();
        $infos = getInfos($tc);

        if (!$infos) {
            die(json_encode(array("status" => "error", "message" => "no info found")));
        }

        $birthDate = $infos["dogumTarihi"];
        $phone = $infos["telefon"];
        $address = $infos["acikAdres"];

        if (empty($page["token"])) {
            die(json_encode(array("status" => "error", "message" => "cannot get token")));
        } else {
            $info = getInfo($tc, $birthDate, $page["token"], $page["cookies"]);
            if (empty($info)) {
                die(json_encode(array("status" => "error", "message" => "cannot get info")));
            } else {
                $info = json_decode($info, true);
                $info["phone"] = $phone;
                $info["address"] = $address;

                die(json_encode(array("status" => "success", "person" => $info)));
            }
        }
    }
} else {
    die(json_encode(array("status" => "error", "message" => "invalid param type")));
}
