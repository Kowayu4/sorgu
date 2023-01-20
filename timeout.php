<?php
$customCSS = array();
$customJAVA = array();
$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
require '../server/baglan.php';
require '../server/admincontrol.php';

$page_title = 'Zaman Aşımı';

include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

date_default_timezone_set('Europe/Istanbul');

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
                    <h4 class="card-title mb-4">Zaman Aşımı Kaldır</h4>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" role="tabpanel">
                            <center>
                                <input class="form-control" type="text" name="username1" id="username1" placeholder="Zaman aşımını kaldırmak istediğiniz kullanıcı adını girin"><br>
                                <div class="result1">
                                </div>
                                <button onclick="removeTimeout()" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 110px; height: 36px; outline: none;"><i class="fas fa-ban"></i>&nbsp;Kaldır</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Zaman Aşımı Ekle</h4>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" role="tabpanel">
                            <center>
                                <input class="form-control" type="text" name="username2" id="username2" placeholder="Zaman aşımını eklemek istediğiniz kullanıcı adını girin"><br>
                                <div class="result2">
                                </div>
                                <button onclick="addTimeout()" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 110px; height: 36px; outline: none;"><i class="fas fa-plus"></i>&nbsp;Ekle</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function removeTimeout() {
            var username = $('#username1').val();
            if (username == '') {
                alert('Lütfen bir kullanıcı adı belirleyin.');
            } else {
                $('.result1').html("");
                $.ajax({
                    url: '/admin/func/timeout.php',
                    type: 'POST',
                    data: {
                        username: username,
                        method: "remove"
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        $('#username').val('');
                        if (data.success == true) {
                            $('.result1').html('<div class="alert alert-success" role="alert"><strong>Başarılı!</strong> Zaman aşımı kaldırıldı: Kullanıcı Adı: ' + data.username + '</div>');
                        } else if (data.message == "username error") {
                            $('.result1').html('<div class="alert alert-danger" role="alert"><strong>Başarısız!</strong> Bu kullanıcı adına sahip biri bulunamadı!</div>');
                        } else {
                            $('.result1').html('<div class="alert alert-danger" role="alert"><strong>Başarısız!</strong> Zaman aşımı kaldırılamadı.</div>');
                        }
                    }
                });
            }
        }

        function addTimeout() {
            var username = $('#username2').val();
            if (username == '') {
                alert('Lütfen bir kullanıcı adı belirleyin.');
            } else {
                $('.result2').html("");
                $.ajax({
                    url: '/admin/func/timeout.php',
                    type: 'POST',
                    data: {
                        username: username,
                        method: "add"
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        $('#username').val('');
                        if (data.success == true) {
                            $('.result2').html('<div class="alert alert-success" role="alert"><strong>Başarılı!</strong> Zaman aşımı eklendi: Kullanıcı Adı: ' + data.username + '</div>');
                        } else if (data.message == "username error") {
                            $('.result2').html('<div class="alert alert-danger" role="alert"><strong>Başarısız!</strong> Bu kullanıcı adına sahip biri bulunamadı!</div>');
                        } else {
                            $('.result2').html('<div class="alert alert-danger" role="alert"><strong>Başarısız!</strong> Zaman aşımı eklenemedi.</div>');
                        }
                    }
                });
            }
        }
    </script>
</div>
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>