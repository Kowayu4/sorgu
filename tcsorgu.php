<?php
include_once "../server/rolecontrol.php";
$customCSS = array('<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
'<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'
);

$page_title = 'TC Sorgu';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

?>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
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
                    <h4 class="card-title mb-4">TC Sorgu</h4>
                    <p class="mb-1">
                    <p>Sorgulanacak Kişinin T.C. Nosunu Giriniz.</p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">

                            <input require maxlength="11" class="form-control" type="text" name="tcno" id="tcno" placeholder="TC"><br>
                            <center class="nw">
                                <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula </button>
                                <button onclick="clearResults()" id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                                <button onclick="printTable()" id="yazdirTable" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button><br><br>
                            </center>
                            <div class="table-responsive">

                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Kimlik No</th>
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>Doğum Tarihi</th>
                                            <th>Cinsiyet</th>
                                            <th>Telefon</th>
                                            <th>Açık Adres</th>
                                            <!--<th>Anne Adı</th>
                                            <th>Baba Adı</th>
                                            <th>Doğum Yeri</th>
                                            <th>Medeni Hâli</th>
                                            <th>Cilt No</th>
                                            <th>Aile No</th>
                                            <th>Sıra No</th>
                                            <th>Nüfus İl</th>
                                            <th>Nüfus İlçe</th>
                                            <th>Nüfus Mahalle</th>-->
                                        </tr>
                                    </thead>
                                    <tbody id="jojjoojj">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function clearResults() {
                $("#jojjoojj").html('<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>');
                $("#tcno").val("");
            }

            function checkNumber() {
                /*return Swal.fire({
                    icon: "warning",
                    title: "Oooooopss...",
                    text: "Bu çözüm şu an bakımdadır!"
                });*/

                var roleNumber = "<?= $k_rol ?>";

                if (parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2) {
                    var tc = $("#tcno").val();
                    var captcha = $("#captcha").val();
                    $.Toast.showToast({
                        "title": "Sorgulanıyor...",
                        "icon": "loading",
                        "duration": 60000
                    });
                    $.ajax({
                        url: "../api/check/api.php",
                        type: "POST",
                        data: {
                            tc: tc,
                            method: "full"
                        },
                        success: (res) => {
                            var json = res;

                            $.Toast.hideToast();

                            if (json.message === "cooldown error") {
                                return Swal.fire({
                                    icon: 'warning',
                                    title: 'Ooooopss...',
                                    text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                                })
                            }

                            if (json.status === "false" || json.status === "error") {
                                $.Toast.hideToast();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Bulunamadı!',
                                    text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
                                })
                                return;
                            } else if (json.status === "success") {
                                $.Toast.hideToast();
                                var tcno = tc;
                                var name = json.person.ad;
                                var surname = json.person.soyad;
                                var birthdate = json.person.dogumTarihi;
                                var gender = json.person.cinsiyet;
                                var telefon = json.person.telefon;
                                var acikAdres = json.person.acikAdres;
                                /*
                                var anneadi = json.annead;
                                var babaadi = json.babaad;
                                var dogumyeri = json.dogumyer;
                                var medenihali = json.medenihal;
                                var ciltno = json.ciltno;
                                var ailesirano = json.ailesirano;
                                var sirano = json.sirano;
                                var nufusmahalle = json.nufusmahalle;
                                var nufusilce = json.nufusilce;
                                var nufusil = json.nufusil;
                                */

                                $("#jojjoojj").html(
                                    "<tr>" +
                                    "<th>" +
                                    tc +
                                    "</th>" +
                                    "<th>" +
                                    name +
                                    "</th>" +
                                    "<th>" +
                                    surname +
                                    "</th>" +
                                    "<th>" +
                                    birthdate +
                                    "</th>" +
                                    "<th>" +
                                    gender +
                                    "</th>" +
                                    "<th>" +
                                    telefon +
                                    "</th>" +
                                    "<th>" +
                                    acikAdres +
                                    "</th>" +
                                    /*
                                    "<th>" +
                                    anneadi +
                                    "</th>" +
                                    "<th>" +
                                    babaadi +
                                    "</th>" +
                                    "<th>" +
                                    dogumyeri +
                                    "</th>" +
                                    "<th>" +
                                    medenihali +
                                    "</th>" +
                                    "<th>" +
                                    ciltno +
                                    "</th>" +
                                    "<th>" +
                                    ailesirano +
                                    "</th>" +
                                    "<th>" +
                                    sirano +
                                    "</th>" +
                                    "<th>" +
                                    nufusil +
                                    "</th>" +
                                    "<th>" +
                                    nufusilce +
                                    "</th>" +
                                    "<th>" +
                                    nufusmahalle +
                                    "</th>" +
                                    */
                                    "</tr>"
                                )
                            } else {
                                $.Toast.hideToast();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Bulunamadı!',
                                    text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
                                })
                                return;
                            }
                        },
                        error: () => {
                            $.Toast.hideToast();
                            Swal.fire({
                                icon: 'error',
                                title: "Sunucu hatası!",
                                text: 'Lütfen yönetici ile iletişime geçin.'
                            })
                            return;
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bu çözümü kullanman için yeterli yetkin bulunmuyor!',
                    })
                }
            }
        </script>


    </div>
    <!--BİTİŞ-->
    <?php
    include('inc/footer_native.php');
    include('inc/footer_main.php');
    ?>