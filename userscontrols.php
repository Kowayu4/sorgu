<?php

include "../../server/authcontrol.php";
include "../../server/baglan.php";

if (isset($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']);
    $islem = htmlspecialchars($_POST['islem']);

    if ($islem != "active" && $islem != "deactive") {
        echo json_encode(array("success" => false));
        die();
    } else {
        $sql = "SELECT * FROM `sh_kullanici` WHERE `id`=?";
        $res = $conn->prepare($sql);
        $res->bind_param("s", $id);
        $res->execute();
        $result = $res->get_result();

        if ($res->errno > 0) {
            echo json_encode(array("success" => false));
            die();
        } else {
            if ($result->num_rows < 1) {
                echo json_encode(array("success" => false));
                die();
            } else {
                $queryArray = $result->fetch_array();
                $kullaniciAdi = $queryArray["k_adi"];
                $kullaniciKeyi = $queryArray["k_key"];
                if ($islem == "active") {
                    $islem = "true";
                    $sql = "UPDATE `sh_kullanici` SET `k_verified`=?, `k_lastlogin`='' WHERE `id`=?";
                    $res = $conn->prepare($sql);
                    $res->bind_param("ss", $islem, $id);
                    $res->execute();
                    $result = $res->get_result();

                    if ($res->errno > 0) {
                        echo json_encode(array("success" => false));
                        die();
                    } else {
                        echo json_encode(array("success" => true));
                        wizortbook($kullaniciURL, "Kullanıcı Denetleyicisi", "Üye Ayarları Değiştirildi", "**$kadi** isimli yönetici bir kullanıcının üyelik durumunu aktif hale getirdi! Üyelik bilgileri; **Kullanıcı Adı: $kullaniciAdi** - **Anahtar: $kullaniciKeyi**");
                        die();
                    }
                } else if ($islem == "deactive") {
                    $islem = "false";
                    $sql = "UPDATE `sh_kullanici` SET `k_verified`=? WHERE `id`=?";
                    $res = $conn->prepare($sql);
                    $res->bind_param("ss", $islem, $id);
                    $res->execute();
                    $result = $res->get_result();

                    if ($res->errno > 0) {
                        echo json_encode(array("success" => false));
                        die();
                    } else {
                        echo json_encode(array("success" => true));
                        wizortbook($kullaniciURL, "Kullanıcı Denetleyicisi", "Üye Ayarları Değiştirildi", "**$kadi** isimli yönetici bir kullanıcının üyelik durumunu pasif hale getirdi! Üyelik bilgileri; **Kullanıcı Adı: $kullaniciAdi** - **Anahtar: $kullaniciKeyi**");
                        die();
                    }
                }
            }
        }
    }
} else {
    echo json_encode(array("success" => false));
    die();
}
