<?php

$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">',
    '<link href="/assets/css/customoption.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'
);

$page_title = 'Sınıf Sorgu';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

error_reporting(0);

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
                    <h4 class="card-title mb-4">Sınıf Sorgu</h4>
                    <p class="mb-1">
                        Sınıf liste bilgisini öğrenmek istediğiniz bilgileri girin.
                    </p>
                    <br>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <center>
                                <div style="width: 100%;" class="select">
                                    <select style="width: 100%;" name="format" id="iller" onchange="wizort2(this)">
                                        <option selected disabled>Lütfen İl Seçin</option>
                                    </select>
                                </div>
                                <br>
                                <div style="width: 100%; margin-bottom: 20px;" class="select">
                                    <select style="width: 100%;" name="format" id="ilceler">
                                        <option selected disabled>Lütfen İlçe Seçin</option>
                                    </select>
                                </div>
                            </center>
                            <input required class="form-control okul" type="text" placeholder="Okul Adı" list="okullar" onkeyup="wizort1(this)"><br>
                            <datalist id="okullar"></datalist>
                            <input required class="form-control sinif" type="text" placeholder="Sınıf/Şube"><br>
                            <br>
                            <center class="nw">
                                <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula </button>
                                <button onclick="clearResults()" id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Sıfırla </button>
                                <button onclick="printTable()" id="yazdirTable" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button><br><br>
                            </center>
                            <div class="table-responsive">

                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>T.C.</th>
                                            <th>Ad</th>
                                            <th>Soyad</th>
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
            window.addEventListener("load", () => {
                wizort3();
            });

            function clearResults() {
                $("#jojjoojj").html('<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>');
                $("#tcno").val("");
            }

            function checkNumber() {
                /*
                return Swal.fire({
                    icon: "warning",
                    title: "Oooooopss...",
                    text: "Bu çözüm şu an bakımdadır!"
                });*/

                var roleNumber = "<?= $k_rol ?>";

                if (parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2) {
                    $.Toast.showToast({
                        "title": "Sorgulanıyor...",
                        "icon": "loading",
                        "duration": 60000
                    });
                    var okulAdi = $('.okul').val();
                    var sinif = $('.sinif').val();
                    var ilKodu = $('#iller').val();
                    var ilceKodu = $('#ilceler').val();

                    if (ilKodu == 0 || ilceKodu == 0 || sinif == '' || okulAdi == '') {
                        $.Toast.hideToast();
                        $('.results').empty();
                        return Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Lütfen boş alan bırakmayın!',
                        })
                    }

                    $.ajax({
                        url: '../api/sinif/api.php',
                        data: {
                            method: "sorgula",
                            kurum: okulAdi,
                            ilKodu: ilKodu,
                            ilceKodu: ilceKodu,
                            sube: sinif
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            var json = data;

                            $.Toast.hideToast();

                            if (json.message === "cooldown error") {
                                return Swal.fire({
                                    icon: 'warning',
                                    title: 'Ooooopss...',
                                    text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                                })
                            }

                            data = data.aaData;

                            if (data.length < 1) {
                                return Swal.fire({
                                    icon: 'error',
                                    title: 'Başarısız',
                                    text: 'Sonuç bulunamadı!',
                                });
                            }

                            $('tbody').html("");
                            $.each(data, function(key, value) {
                                $('tbody').append('<tr><td>' + value['TcNo'] + '</td>' + '<td>' + value['Adi'] + '</td>' + '<td>' + value['Soyadi'] + '</td>' + '<tr>');
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bu çözümü kullanman için yeterli yetkin bulunmuyor!',
                    })
                }
            }

            function wizort1(e) {
                var okulAdi = $(e).val();
                var ilKodu = $('#iller').val();
                var ilceKodu = $('#ilceler').val();

                if (ilKodu == 0 || ilceKodu == 0) {
                    $('#okullar').empty();
                    return alert('Lütfen İl ve İlçe Seçiniz');
                }

                $.ajax({
                    url: '../api/sinif/api.php',
                    type: 'POST',
                    data: {
                        method: "okulAdi",
                        text: okulAdi,
                        ilKodu: ilKodu,
                        ilceKodu: ilceKodu
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#okullar').empty();
                        $.each(data, function(key, value) {
                            $('#okullar').append('<option value="' + value.Text + '">' + value.Text + '</option>');
                        });
                    }
                });
            }

            function wizort2(e) {
                var ilKodu = $(e).val();
                $.ajax({
                    url: '../api/sinif/api.php',
                    type: 'POST',
                    data: {
                        method: "ilceListesi",
                        ilKodu: ilKodu
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#ilceler').empty();
                        $.each(data, function(key, value) {
                            $('#ilceler').append('<option value="' + value.Value + '">' + value.Text + '</option>');
                        });
                    }
                });
            }

            function wizort3() {
                $.ajax({
                    url: '../api/sinif/api.php',
                    type: 'POST',
                    data: {
                        method: "ilListesi"
                    },
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#iller').append('<option value="' + value.Value + '">' + value.Text + '</option>');
                        });
                    }
                });
            }
        </script>
    </div>
</div>
<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>