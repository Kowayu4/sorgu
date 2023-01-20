<?php
$customCSS = array();
$customJAVA = array();
$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
require '../server/baglan.php';
require '../server/admincontrol.php';

$page_title = 'Notice Sharing';

include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

date_default_timezone_set('Europe/Istanbul');
$nowDate = date("d.m.Y");

if (isset($_POST['sil'])) {
    $sil = htmlspecialchars($_POST['sil']);
    $query = "DELETE FROM `sh_duyuru` WHERE id='$sil'";
    if ($conn->query($query) === TRUE) {
        $success = 'DUYURU BAŞARIYLA SİLİNDİ';
        header('location: /notice');
    } else {
        header("Location: /notice");
    }
}

if (isset($_POST['icerik'])) {
    $icerik = htmlspecialchars($_POST['icerik']);
    $uzunluk = strlen($icerik);
    if ($uzunluk > "60") {
        $error = '60 Karakterden Fazla giremezsiniz!';
    }
    $queryy = "SELECT * FROM sh_duyuru";

    if ($result = mysqli_query($conn, $queryy)) {

        $rowcount = mysqli_num_rows($result);
        $rowcount;
    }
    if ($rowcount >= "4") {
        $error2 = '4 DUYURUDAN FAZLA GİREMEZSİN!';
    } else {
        $query = "INSERT `sh_duyuru` SET d_icerik='$icerik',d_time='$nowDate'";

        if ($conn->query($query) === TRUE) {
            $success = 'DUYURU BAŞARIYLA EKLENDİ';
            header('location: /notice');
        } else {
            header("Location: /notice");
        }
    }
}

$success2 = "";

if (isset($error)) {
    $success2 = $error;
} else {
    if (isset($error2)) {
        $success2 = $error2;
    } else {
        if (isset($success)) {
            $success2 = $success;
        } else {
            $success2 = 'Duyuru İçeriği Giriniz.';
        }
    }
}

?>
<div class="overlay">
        <video id="myvideo" autoplay="true" loop muted >
            <source src="../assets/images/matrix.mp4" type="video/mp4">
        </video>
    </div>
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><img style="width: 30px;height: auto;" src="/assets/images/notice.png" alt="">&nbsp;Notice Sharing</h4>
                    <br>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" role="tabpanel">

                            <form method="post">

                                <input class="form-control" type="text" name="icerik" id="icerik" placeholder="<?php echo $success2; ?>"><br>
                        </div>

                        <center>
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Paylaş </button> </form>
                        </center>
                        <br>
                        <div class="table-responsive">

                            <table id="zero-conf" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Duyuru İçeriği</th>
                                        <th>Yayın Tarihi</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM `sh_duyuru`");
                                while ($getvar = mysqli_fetch_assoc($query)) {
                                    echo '
								<tr><td>' . $getvar['d_icerik'] . '</td>
								<td>' . $getvar['d_time'] . '</td>
								<td><a href="editnotice/' . $getvar['id'] . '"><button type="button" class="btn btn-outline-danger">Editle</button></a></td>
								<td><form method="POST"><button class="btn btn-outline-danger type="submit" name="sil" value="' . $getvar['id'] . '">Sil</button></form></td>
								';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>