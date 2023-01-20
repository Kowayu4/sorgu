<?php
$customCSS = array();
$customJAVA = array(
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'
);
$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);

require '../server/baglan.php';
require '../server/admincontrol.php';
require '../server/authcontrol.php';

$page_title = 'User Settings';

include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

$id = intval(preg_replace("/[^0-9]+/", "", htmlspecialchars($_GET["id"])));
if (!isset($id) || empty($id)) {
    header("Location: /users");
    die();
}

$zortSQL = "SELECT * FROM `sh_kullanici` WHERE `id`='$id'";
$zortResult = $conn->query($zortSQL);
if ($zortResult == false) {
    header("Location: /users");
    die();
} else {
    $zortFetch = $zortResult->fetch_assoc();
    $zortData = $zortFetch;
    $zortAdi = $zortData["k_adi"];
}

$yetkii = strip_tags(htmlspecialchars($_POST["yetkii"]));

if (isset($yetkii) && !isset($_POST["sil"])) {
    if ($yetkii === "0" || $yetkii === "2") {
        if ($yetkii === "0") {
            $newDate = 1;
            wizortbook($kullaniciURL, "Kullanıcı Denetleyicisi", "Üyelik Paketi Değiştirildi", "**$kadi** isimli yönetici bir kullanıcının üyelik paketini sildi! Üyelik bilgileri; **ID: $id, Kullanıcı Adı: $zortAdi**");
        } else {
            date_default_timezone_set('Europe/Istanbul');

            $date = htmlspecialchars($_POST["date"]);
            echo $date;
            if (isset($date) && !empty($date)) {
                $date = date("Y-m-d", strtotime($date));

                if (strtotime($date) < strtotime(date("Y-m-d"))) {
                    header("Location: /edituser/" . $id);
                    exit;
                }
            } else {
                $date = strtotime("+30 day", strtotime(date("Y-m-d")));
                $date = date("Y-m-d", $date);
            }

            $nowDate = date("Y-m-d");
            $newDate = strtotime($date);
            $newDate = date('Y-m-d', $newDate);
            wizortbook($kullaniciURL, "Kullanıcı Denetleyicisi", "Üyelik Paketi Değiştirildi", "**$kadi** isimli yönetici bir kullanıcının üyelik paketini yükseltti! Üyelik bilgileri; **ID: $id, Kullanıcı Adı: $zortAdi**");
        }

        $query = "UPDATE `sh_kullanici` SET k_rol='$yetkii', u_time='$newDate' WHERE id=$id";

        if ($conn->query($query) !== TRUE) {
            echo $conn->error;
        } else {
            header('location: /edituser/' . $id);
        }
    }
}

if ($_POST["sil"] === "sil") {
    $sql = "DELETE FROM `sh_kullanici` WHERE `id`='$id'";
    if ($conn->query($sql) === TRUE) {
        wizortbook($kullaniciURL, "Kullanıcı Denetleyicisi", "Üyelik Silindi", "**$kadi** isimli yönetici bir kullanıcıyı sildi! Üyelik bilgileri; **ID: $id, Kullanıcı Adı: $zortAdi**");
        header('location: /users');
    }
}

?>
<style>
    input[type="checkbox"].ios8-switch {
        position: absolute;
        margin: 8px 0 0 16px;
    }

    input[type="checkbox"].ios8-switch+label {
        position: relative;
        padding: 5px 0 0 50px;
        line-height: 2.0em;
    }

    input[type="checkbox"].ios8-switch+label:before {
        content: "";
        position: absolute;
        display: block;
        left: 0;
        top: 0;
        width: 40px;
        /* x*5 */
        height: 24px;
        /* x*3 */
        border-radius: 16px;
        /* x*2 */
        background: #fff;
        border: 1px solid #d9d9d9;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }

    input[type="checkbox"].ios8-switch+label:after {
        content: "";
        position: absolute;
        display: block;
        left: 0px;
        top: 0px;
        width: 24px;
        /* x*3 */
        height: 24px;
        /* x*3 */
        border-radius: 16px;
        /* x*2 */
        background: #fff;
        border: 1px solid #d9d9d9;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }

    input[type="checkbox"].ios8-switch+label:hover:after {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    input[type="checkbox"].ios8-switch:checked+label:after {
        margin-left: 16px;
    }

    input[type="checkbox"].ios8-switch:checked+label:before {
        background: #55D069;
    }
</style>
<script>
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName("yetkii")
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>
<script>
    function active(id) {
        $.ajax({
            url: "/admin/func/userscontrols.php",
            type: "POST",
            data: {
                id: id,
                islem: "active"
            },
            success: (response) => {
                var json = JSON.parse(response);
                if (json.success == true) {
                    location.reload();
                } else if (json.success == false) {
                    alert("Kullanıcı düzenlenemedi!");
                }
            },
            error: () => {
                alert("Kullanıcı düzenlenemedi!");
            }
        })
    }

    function deactive(id) {
        $.ajax({
            url: "/admin/func/userscontrols.php",
            type: "POST",
            data: {
                id: id,
                islem: "deactive"
            },
            success: (response) => {
                var json = JSON.parse(response);
                if (json.success == true) {
                    location.reload();
                } else if (json.success == false) {
                    alert("Kullanıcı düzenlenemedi!");
                }
            },
            error: () => {
                alert("Kullanıcı düzenlenemedi!");
            }
        })
    }
</script>
<center>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <br>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM `sh_kullanici` WHERE id='$id'");
    if ($query->num_rows < 1) {
        header("Location: /users");
    }
    while ($getvar = mysqli_fetch_assoc($query)) { ?>
<div class="overlay">
        <video id="myvideo" autoplay="true" loop muted >
            <source src="../assets/images/matrix.mp4" type="video/mp4">
        </video>
    </div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <li class="w3-bar" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    
                        <span>Anahtar: <b>
                                <?php
                                if ($getvar["k_rol"] == "1") {
                                    $getvar["k_key"] = "***************";
                                }

                                echo $getvar["k_key"];
                                ?>
                            </b></span>
                        <br>
                        <span>Üyelik: <b>
                                <?php
                                $rol = $getvar['k_rol'];
                                switch ($rol) {
                                    case '0':
                                        $yetki = "Freemium";
                                        break;
                                    case '1':
                                        $yetki = "Admin";
                                        break;
                                    case '2':
                                        $yetki = "Premium";
                                        break;
                                }
                                echo $yetki;
                                ?>
                            </b>
                        </span>
                        <br>
                        <span>
                            <?php
                            if ($getvar["k_verified"] === "true") {
                                $color = "green";
                            } else {
                                $color = "red";
                            }
                            ?>
                            Üyelik Durumu: <b style="color: <?= $color; ?>">
                                <?php
                                $durum = "";
                                if ($getvar["k_verified"] === "true") {
                                    $durum = "Aktif";
                                } else {
                                    $durum = "Pasif";
                                }
                                echo $durum;
                                ?>
                            </b>
                        </span>
                        <br>
                        <span>
                            Üyelik Bitiş Tarihi: <b>
                                <?php
                                $uyetarih = $getvar['u_time'];
                                if ($uyetarih != "1") {
                                    $nowDate = date("Y-m-d");
                                    $d1 = new DateTime($nowDate);
                                    $d2 = new DateTime($uyetarih);
                                    $gun = $d1->diff($d2)->days;
                                    $uyeliktarih = $uyetarih;
                                } else if ($uyetarih == "1") {
                                    $uyeliktarih = "Üyelik Yok";
                                    $gun = "Üyelik Yok";
                                }
                                if (!empty($uyeliktarih)) {
                                    echo $uyeliktarih;
                                }
                                ?>
                            </b>
                        </span>
                        <br>
                        <span>
                            Tarayıcı: <b>
                                <?php
                                echo $getvar["k_browser"];
                                ?>
                            </b>
                        </span>
                        <br>
                        <span>
                            IP: <b>
                                <?php
                                if (empty($getvar["k_log"])) {
                                    $ekleyen = "Bilinmiyor";
                                } else {
                                    $ekleyen = $getvar["k_log"];
                                }

                                echo $ekleyen;
                                ?>
                            </b>
                        </span>
                    </div>
                    <?php
                    if ($checkID === $id) {
                    ?>
                        <h4 style="color: red;">Kendi profilini düzenleyemez veya silemezsin!</h4>
                    <?php
                    } else if ($id !== $checkID && $k_rol !== $rol) {
                    ?>
                        <form method="POST" action="">
                            <br>
                            <input style="background-color: #181821; color: white;" type="date" name="date" value="<?php echo $getvar["u_time"]; ?>">
                            <br> <br>
                            <input class="ios8-switch" onChange="this.form.submit()" <?php if ($rol === "0") echo "checked" ?> id="checkbox-1" type="checkbox" name="yetkii" value="0" onclick="onlyOne(this)" <?php if ($getvar["k_verified"] == "false") {
                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                } ?>>
                            <label for="checkbox-1" style="display: inline;">Freemium</label>
                            <input class="ios8-switch" onChange="this.form.submit()" <?php if ($rol === "2") echo "checked" ?> id="checkbox-2" type="checkbox" name="yetkii" value="2" onclick="onlyOne(this)" <?php if ($getvar["k_verified"] == "false") {
                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                } ?>>
                            <label for="checkbox-2" style="display: inline;">Premium (Aylık)</label>
                            <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                                <button onclick="this.form.submit()" name="sil" value="sil" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 30px; height: 30px; outline: none; margin-left: 5px; display: flex; justify-content: center; align-items: center;"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </form>
                        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center; margin-top: 5px;">
                            <button onclick="active(<?php echo $getvar['id']; ?>)" class="btn waves-effect waves-light btn-rounded btn-success" style="width: 30px; height: 30px; outline: none; margin-left: 5px; display: flex; justify-content: center; align-items: center;"><i class="fas fa-check"></i></button>
                            <button onclick="deactive(<?php echo $getvar['id']; ?>)" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 30px; height: 30px; outline: none; margin-left: 5px; display: flex; justify-content: center; align-items: center;"><i class="fas fa-ban"></i></button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <h4 style="color: red;">Kendinle aynı yetkideki bir kullanıcıyı düzenleyemez veya silemezsin!</h4>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    <?php } ?>
</center>


<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>