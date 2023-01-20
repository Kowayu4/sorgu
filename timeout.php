<?php

include "../../server/authcontrol.php";
include "../../server/baglan.php";

if (isset($_POST['username']) && isset($_POST['method'])) {
    $username = htmlspecialchars($_POST['username']);
    $method = $_POST['method'];

    $sql = "SELECT * FROM `sh_kullanici` WHERE `k_adi`='$username'";
    $res = $conn->query($sql);

    if ($conn->errno > 0) {
        echo json_encode(array("success" => false));
        die();
    }

    if ($res->num_rows < 1) {
        echo json_encode(array("success" => false, "message" => "username error"));
        die();
    }

    if ($method == "add") {
        $sql = "UPDATE `sh_kullanici` SET `k_cooldown_bypass` = 'false' WHERE `k_adi` = '$username'";
        $result = $conn->query($sql);

        if ($result) {
            echo json_encode(array("success" => true, "username" => $username));
            wizortbook($kullaniciURL, "Kullanıcı Denetleyicisi", "Zaman Aşımı Eklendi", "**$kadi** isimli yönetici bir üyeye zaman aşımı ekledi! Üye bilgileri; **Kullanıcı Adı: $username**");
            die();
        } else {
            echo json_encode(array("success" => false));
            die();
        }
    } else if ($method == "remove") {
        $sql = "UPDATE `sh_kullanici` SET `k_cooldown_bypass` = 'true' WHERE `k_adi` = '$username'";
        $result = $conn->query($sql);

        if ($result) {
            echo json_encode(array("success" => true, "username" => $username));
            wizortbook($kullaniciURL, "Kullanıcı Denetleyicisi", "Zaman Aşımı Kaldırıldı", "**$kadi** isimli yönetici bir üyenin zaman aşımını kaldırdı! Üye bilgileri; **Kullanıcı Adı: $username**");
            die();
        }
    } else {
        echo json_encode(array("success" => false));
        die();
    }
} else {
    echo json_encode(array("success" => false));
    die();
}
