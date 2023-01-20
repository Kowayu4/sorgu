<?php
$customCSS = array(
    '<link href="../assets/css/bootoast.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'

);
$customJAVA = array(
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>',
    '<script src="../assets/js/bootoast.min.js"></script>',
    '<script src="../assets/plugins/jquery.toast/jquery.toast.js"></script>',
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
);

$page_title = 'Vesikalık Sorgu';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');
?>
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
                    <h4 class="card-title mb-4">Kimlik Fotoğrafı Çıkartma</h4>
                    <p class="mb-1">
                    </p>
                    <p>Sorgulanacak Kişinin T.C. Nosunu Giriniz.</p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input require="" maxlength="11" class="form-control" type="text" name="tcno" id="tcno" placeholder="TC"><br>
                            <center class="nw">
                                <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula </button>
                                <button onclick="clearResults()" id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                                <button onclick="printTable()" id="yazdirTable" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button><br><br>
                            </center>
                            <center>
                                <div class="col-xl-2 col-md-6">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 &nbsp;="" class="card-title mb-4"><i class="fas fa-camera"></i> Vesikalık F.</h4>
                                                <img id="KimlikFotograf" src="../upload/profile/default.gif" style="border-radius: 12px;" width="160" height="200" class="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="table-responsive">
                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>Telefon</th>
                                            <th>E-Posta</th>
                                            <th>Doğum Tarihi (Tarih)</th>
                                            <th>Doğum Tarihi (Saat)</th>
                                            <th>Doğum Yeri</th>
                                            <th>Anne Adı</th>
                                            <th>Baba Adı</th>
                                            <th>Açık Adres</th>
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
    </div>
    <script>
        function clearResults() {
            $("#tcno").val("");
            $("#KimlikFotograf").attr("src", "../upload/profile/default.gif");
            $("#jojjoojj").html('<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>');
        }

        function checkNumber() {
            /*
            return Swal.fire({
                icon: "warning",
                title: "Oooooopss...",
                text: "Bu çözüm şu an bakımdadır!"
            });
            */

            var roleNumber = "<?= $k_rol ?>";

            if (parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2) {
                var tc = $("#tcno").val();
                $.Toast.showToast({
                    "title": "Sorgulanıyor...",
                    "icon": "loading",
                    "duration": 86400000
                });
                $.ajax({
                    url: "../api/vesikalik/api.php",
                    type: "POST",
                    data: {
                        tc: tc,
                    },
                    success: (res) => {
                        var json = JSON.parse(res);

                        $.Toast.hideToast();

                        if (json.message === "cooldown error") {
                            return Swal.fire({
                                icon: 'warning',
                                title: 'Ooooopss...',
                                text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                            })
                        }

                        if (json.message === "no query remains") {
                            return Swal.fire({
                                icon: 'warning',
                                title: 'Ooooopss...',
                                text: 'Bu sorguyu kullanmak için hakkınız bulunmamaktadır.',
                            })
                        }

                        if (json.success === "false") {
                            $.Toast.hideToast();
                            Swal.fire({
                                icon: 'error',
                                title: 'Bulunamadı!',
                                text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
                            })
                            return;
                        } else if (json.success === "true") {
                            $.Toast.hideToast();
                            var ad = json.data.ad;
                            var soyad = json.data.soyad;
                            var dogumtarihi_date = json.data.dogumtarihi_date;
                            var dogumtarihi_clock = json.data.dogumtarihi_clock;
                            var dogumyeri = json.data.dogumyeri
                            var anneadi = json.data.anne;
                            var babaadi = json.data.baba;
                            var adres = json.data.adres;
                            var telefon = json.data.telefon;
                            var eposta = json.data.eposta;

                            $("#jojjoojj").html(
                                "<tr>" +
                                "<th>" +
                                ad +
                                "</th>" +
                                "<th>" +
                                soyad +
                                "</th>" +
                                "<th>" +
                                telefon +
                                "</th>" +
                                "<th>" +
                                eposta +
                                "</th>" +
                                "<th>" +
                                dogumtarihi_date +
                                "</th>" +
                                "<th>" +
                                dogumtarihi_clock +
                                "</th>" +
                                "<th>" +
                                dogumyeri +
                                "</th>" +
                                "<th>" +
                                anneadi +
                                "</th>" +
                                "<th>" +
                                babaadi +
                                "</th>" +
                                "<th>" +
                                adres +
                                "</th>" +
                                "</tr>"
                            )
                            $("#KimlikFotograf").attr("src", "data:image/jpeg;base64," + json.data.vesikalik);
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