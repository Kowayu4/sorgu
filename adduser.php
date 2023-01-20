<?php

include "../../server/authcontrol.php";
include "../../server/baglan.php";

if (isset($_POST['username'])) {
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $key = generateRandomString(32);
    $username = htmlspecialchars($_POST['username']);
    $date = date("Y-m-d H:i:s");
    $ekleyen = $_SESSION["k_adi"];

    $sql = "SELECT * FROM `sh_kullanici` WHERE `k_adi`='$username'";
    $res = $conn->query($sql);
    
    if ($conn->errno > 0) {
        echo json_encode(array("success" => false));
        die();
    }

    if ($res->num_rows > 0) {
        echo json_encode(array("success" => false, "message" => "username error"));
        die();
    }

    $sql = "INSERT INTO `sh_kullanici` (`k_key`, `k_adi`, `k_verified`, `k_time`, `k_ekleyen`) VALUES ('$key', '$username', 'true', '$date', '$ekleyen')";
    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(array("success" => true, "key" => $key, "username" => $username));
        wizortbook($kullaniciURL, "Kullanıcı Denetleyicisi", "Kullanıcı Eklendi", "**$kadi** isimli yönetici sisteme yeni üye ekledi! Üye bilgileri; **Kullanıcı Adı: $username** - **Anahtar: $key**");
        die();
    } else {
        echo json_encode(array("success" => false));
        die();
    }
} else {
    echo json_encode(array("success" => false));
    die();
}
