<?php
include_once "../server/rolecontrol.php";
$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'
);

$page_title = 'Tapu Sorgu';
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
                    <h4 class="card-title mb-4">Tapu Sorgu</h4>
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
                                            <th>Bilgi</th>
                                            <th>Malik</th>
                                            <th>İl / İlçe</th>
                                            <th>Mahalle / Mevki</th>
                                            <th>TAS İşlem</th>
                                            <th>TAS Alan</th>
                                            <th>Cilt / Sayfa</th>
                                            <th>Nitelik</th>
                                            <th>Pafta</th>
                                            <th>Ada</th>
                                            <th>Parsel</th>
                                            <th>Hisse Pay</th>
                                            <th>Hisse Payda</th>
                                            <th>İşlem Adı</th>
                                            <th>Yevmiye Tarih</th>
                                            <th>Yevmiye No</th>
                                            <th>İST No</th>
                                            <th>Blok</th>
                                            <th>BB</th>
                                            <th>Tip</th>
                                            <th>Kat</th>
                                            <th>Arsa Pay</th>
                                            <th>Arsa Payda</th>
                                            <th>Durum</th>
                                            <th>Terkin</th>
                                            <th>Terkin Tarihi</th>
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
                        url: "../api/tapu/api.php",
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
                            } else if (json.success === "true") {
                                $.Toast.hideToast();
                                var html = [];

                                for (var i = 0; i < json.data.length; i++) {
                                    var data = json.data[i];
                                    var tcno = tc;
                                    var bilgi = data.bilgi;
                                    var malik = data.malik;
                                    var ililce = data.il_ilce;
                                    var mahallemevki = data.mahalle_mevki;
                                    var tasislem = data.tasislem;
                                    var tasalan = data.tas_alan;
                                    var ciltsayfa = data.cilt_sayfa;
                                    var nitelik = data.nitelik;
                                    var pafta = data.pafta;
                                    var ada = data.ada;
                                    var parsel = data.parsel;
                                    var hissepay = data.hisse_pay;
                                    var hissepayda = data.hisse_payda;
                                    var islemadi = data.islem_adi;
                                    var yevmiyetarih = data.yevmiye_tarih;
                                    var yevmiyeno = data.yevmiye_no;
                                    var istno = data.ist_no;
                                    var blok = data.blok;
                                    var bb = data.bb;
                                    var tip = data.tip;
                                    var kat = data.kat;
                                    var arsapay = data.arsa_pay;
                                    var arsapayda = data.arsa_payda;
                                    var durum = data.durum;
                                    var terkin = data.terkin;
                                    var terkintarihi = data.terkin_tarih;

                                    if (terkin == "") {
                                        terkin = "null";
                                    }
                                    if (terkintarihi == "") {
                                        terkintarihi = "null";
                                    }

                                    html.push(
                                        "<tr>" +
                                        "<th>" +
                                        tcno +
                                        "</th>" +
                                        "<th>" +
                                        bilgi +
                                        "</th>" +
                                        "<th>" +
                                        malik +
                                        "</th>" +
                                        "<th>" +
                                        ililce +
                                        "</th>" +
                                        "<th>" +
                                        mahallemevki +
                                        "</th>" +
                                        "<th>" +
                                        tasislem +
                                        "</th>" +
                                        "<th>" +
                                        tasalan +
                                        "</th>" +
                                        "<th>" +
                                        ciltsayfa +
                                        "</th>" +
                                        "<th>" +
                                        nitelik +
                                        "</th>" +
                                        "<th>" +
                                        pafta +
                                        "</th>" +
                                        "<th>" +
                                        ada +
                                        "</th>" +
                                        "<th>" +
                                        parsel +
                                        "</th>" +
                                        "<th>" +
                                        hissepay +
                                        "</th>" +
                                        "<th>" +
                                        hissepayda +
                                        "</th>" +
                                        "<th>" +
                                        islemadi +
                                        "</th>" +
                                        "<th>" +
                                        yevmiyetarih +
                                        "</th>" +
                                        "<th>" +
                                        yevmiyeno +
                                        "</th>" +
                                        "<th>" +
                                        istno +
                                        "</th>" +
                                        "<th>" +
                                        blok +
                                        "</th>" +
                                        "<th>" +
                                        bb +
                                        "</th>" +
                                        "<th>" +
                                        tip +
                                        "</th>" +
                                        "<th>" +
                                        kat +
                                        "</th>" +
                                        "<th>" +
                                        arsapay +
                                        "</th>" +
                                        "<th>" +
                                        arsapayda +
                                        "</th>" +
                                        "<th>" +
                                        durum +
                                        "</th>" +
                                        "<th>" +
                                        terkin +
                                        "</th>" +
                                        "<th>" +
                                        terkintarihi +
                                        "</th>" +
                                        "</tr>"
                                    )
                                }

                                $("#jojjoojj").html(html)
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