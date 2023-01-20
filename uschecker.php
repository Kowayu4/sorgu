<?php

$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>'

);

$page_title = 'US CC Checker';
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
<div class="card-body">
    <div class="md-form">
        <div class="col-md-12">
            <center>
                <div class="md-form">
                    <h4 class="card-title mb-4"><i class="fas fa-user-circle"></i> US CC Checker</h4>
                    <p>Bu bölümden kartlarınızı kolaylıkla checkleyebilirsiniz!</p>
                    <strong>Örnek format: </strong> <a>4785002819186569|05|2025|271</a>
                    <textarea type="text" style="text-align: center; background-color: rgba(255, 255, 255, .1);color:white ;" placeholder="Hesaplarınızı buraya giriniz." ; id="lista" class="md-textarea form-control" rows="4"></textarea>
                    <center class="nw">
                    <div class="mb-3 mt-3"><label class="form-label"></label>
                        <button id="testar" onclick="wizort()" type="button" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Başlat</button>
                        <button id="stoper" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-stop"></i> Durdur</button>
                        <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Temizle</button>
                    </center>
                    </div>
                </div>
        </div>
        </center>
    </div>

    <div class="card-body">

        <div class="col-lg-12">
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <center>
                        <h5 class="my-0 text-success"><b>Onaylananlar</b> </h5>
                        </center>
                    <div style="position: absolute; top:10px; right: 10px;"></div>
                </div>
                <div class="card-body">
                    <div class="collapse show card-body" id="aprovadas">
                        <div style="font-size: 13.5px;">
                            <span id="aprovadas" class="aprovadas">

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card border border-danger">
                <div class="card-header bg-transparent border-danger">
                    <center>
                        <h5 class="my-0 text-danger"><b>Reddedilenler</b> </h5>
</center>
                </div>
                <div class="card-body">
                    <div class="collapse show card-body" id="reprovadas">
                        <div style="font-size: 13.5px;">
                            <span id="reprovadas" class="reprovadas">

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>

    <script type="text/javascript">
        function wizort() {
            var wizortElement = $("#lista").val();
            var wizortData = wizortElement.split("\n");

            for (var i = 0; i < wizortData.length; i++) {
                var wizortCard = wizortData[i].split("|");

                $.ajax({
                    url: "../api/cc/api.php",
                    method: "POST",
                    data: {
                        cc: wizortCard[0],
                        month: wizortCard[1],
                        year: wizortCard[2],
                        cvv: wizortCard[3]
                    },
                    async: true,
                    success: (response) => {
                        if (response.match("payment success")) {
                            aprovadas("<center>" + "🟢 #Aktif 🟢 - " + wizortCard[0] + '|' + wizortCard[1] + '|' + wizortCard[2] + '|' + wizortCard[3] + " - 0.5$ Provizyon İşlemi Başarılı!" + "</center>");
                        } else if (response.match('payment failed')) {
                            reprovadas("<center>" + "🔴 #Red 🔴 - " + wizortCard[0] + '|' + wizortCard[1] + '|' + wizortCard[2] + '|' + wizortCard[3] + " - Kartınız Reddedildi!" + "</center>");
                        }
                    },
                    error: (err) => {
                        if (response.match("unknown error")) {
                            reprovadas("🔴 #Red 🔴 - " + wizortCard[0] + '|' + wizortCard[1] + '|' + wizortCard[2] + '|' + wizortCard[3] + " - Çözüm Sahibiyle İletişime Geçin! Hata Kodu : 0x464");
                        }
                    }
                });
            }
        }

        function aprovadas(str) {
            $("#aprovadas").append(str + "<br>");
        }

        function reprovadas(str) {
            $("#reprovadas").append(str + "<br>");
        }
    </script>
    <br>
    <!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>