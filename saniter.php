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

$page_title = 'CC Derleyici';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');
?>
<!--BAŞLANGIC-->
<div class="overlay">
        
    </div>
<div class="card-body">
    <div class="md-form">
        <div class="col-md-12">
            <center>
                <div class="md-form">
                    <h4 class="card-title mb-4"><i class="fas fa-user-circle"></i> CC Derleyici</h4>
                    <p>Bu bölümden kredi kartlarınızı kolaylıkla kullanılabilir formata getirebilirsiniz.</p>
                    <textarea type="text" style="text-align: center; background-color: rgba(255, 255, 255, .1);color:white ;" placeholder="Düzenlenmiş kart listesinizi buraya girin." ; id="lista" class="md-textarea form-control" rows="4"></textarea>
                    <center class="nw">
                    <div class="mb-3 mt-3"><label class="form-label"></label>
                        <button id="testar" onclick="enviar()" type="button" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Başlat</button>
                        <button id="stoper" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-stop"></i> Durdur</button>
                        <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Temizle</button>
                    </center>
                    </div>
                </div>
        </div>
        </center>
    </div>

    <div class="card-body">
        <div class="alert alert-success" role="alert">DÜZELTİLEN KART <span id="cCharge2"></span></h6>
        </div>
        <div id="bode1"><span id=".aprovadas" class="aprovadas"></span>
        </div>
        <div class="alert alert-danger" role="alert">DÜZELTİLEMEYEN KART <span id="cDie2"></span></h6>
        </div>
        <div id="bode2"><span id=".reprovadas" class="reprovadas"></span>
        </div>
    </div>
</div>
</div>

<script>
    (function(_0x2369ef, _0x41a489) {
        var _0x49b077 = _0x5f3e,
            _0x559788 = _0x2369ef();
        while (!![]) {
            try {
                var _0x5b0b40 = -parseInt(_0x49b077(0x202)) / 0x1 + -parseInt(_0x49b077(0x1fb)) / 0x2 + -parseInt(_0x49b077(0x1ec)) / 0x3 * (parseInt(_0x49b077(0x1f9)) / 0x4) + parseInt(_0x49b077(0x1f0)) / 0x5 + parseInt(_0x49b077(0x1e8)) / 0x6 * (parseInt(_0x49b077(0x1f1)) / 0x7) + parseInt(_0x49b077(0x1ed)) / 0x8 * (parseInt(_0x49b077(0x1fc)) / 0x9) + -parseInt(_0x49b077(0x1fa)) / 0xa * (-parseInt(_0x49b077(0x1f6)) / 0xb);
                if (_0x5b0b40 === _0x41a489) break;
                else _0x559788['push'](_0x559788['shift']());
            } catch (_0x412d4c) {
                _0x559788['push'](_0x559788['shift']());
            }
        }
    }(_0x38d1, 0xc7138));

    function enviar() {
        var _0x41ee9b = _0x5f3e,
            _0x1be9f6 = $('#lista')[_0x41ee9b(0x1eb)](),
            _0x578f07 = _0x1be9f6[_0x41ee9b(0x200)]('\x0a'),
            _0x376d4e = _0x578f07['length'],
            _0x2f10c2 = 0x0,
            _0x2f02d3 = 0x0,
            _0x4becfd;
        _0x578f07[_0x41ee9b(0x1e5)](function(_0x50162f, _0x11e904) {
            setTimeout(function() {
                var _0x490438 = _0x5f3e;
                Array[_0x490438(0x1f3)]['randomElement'] = function() {
                    var _0x1a96bc = _0x490438;
                    return this[Math[_0x1a96bc(0x1fd)](Math['random']() * this[_0x1a96bc(0x203)])];
                }, $[_0x490438(0x1ee)]({
                    'url': _0x490438(0x1f7) + _0x50162f,
                    'async': !![],
                    'success': function(_0x303395) {
                        var _0x15f39c = _0x490438;
                        _0x303395[_0x15f39c(0x1e7)](_0x15f39c(0x1ef)) ? (removelinha(), _0x2f10c2++, aprovadas(_0x303395 + '')) : (removelinha(), _0x2f02d3++, reprovadas(_0x303395 + ''));
                        $(_0x15f39c(0x1e9))[_0x15f39c(0x1ff)](_0x376d4e);
                        var _0x52d759 = parseInt(_0x2f10c2) + parseInt(_0x2f02d3);
                        $(_0x15f39c(0x1f2))['html'](_0x2f10c2), $(_0x15f39c(0x1f4))[_0x15f39c(0x1ff)](_0x2f02d3), $('#total')[_0x15f39c(0x1ff)](_0x52d759), $('#cCharge2')[_0x15f39c(0x1ff)](_0x2f10c2), $(_0x15f39c(0x1f4))[_0x15f39c(0x1ff)](_0x2f02d3);
                    }
                });
            }, 0x64 * _0x11e904);
        });
    }

    function aprovadas(_0x1fcf9f) {
        var _0x2ced6b = _0x5f3e;
        $(_0x2ced6b(0x1ea))['append'](_0x1fcf9f);
    }

    function reprovadas(_0x156589) {
        var _0x208944 = _0x5f3e;
        $(_0x208944(0x1f8))[_0x208944(0x1e6)](_0x156589);
    }

    function removelinha() {
        var _0x56e903 = _0x5f3e,
            _0x5400ce = $(_0x56e903(0x1f5))[_0x56e903(0x1eb)]()[_0x56e903(0x200)]('\x0a');
        _0x5400ce['splice'](0x0, 0x1), $(_0x56e903(0x1f5))['val'](_0x5400ce[_0x56e903(0x1fe)]('\x0a'));
    }

    function _0x5f3e(_0x4123e0, _0x3857ec) {
        var _0x38d1b2 = _0x38d1();
        return _0x5f3e = function(_0x5f3edb, _0x129809) {
            _0x5f3edb = _0x5f3edb - 0x1e5;
            var _0x30eae0 = _0x38d1b2[_0x5f3edb];
            return _0x30eae0;
        }, _0x5f3e(_0x4123e0, _0x3857ec);
    }

    function iloveyou() {
        var _0x103c56 = _0x5f3e;
        alert(_0x103c56(0x201));
    }

    function _0x38d1() {
        var _0x5d4c43 = ['split', 'PEKPEK', '656321IATFvn', 'length', 'forEach', 'append', 'match', '8664buFKzV', '#carregadas', '.aprovadas', 'val', '225zyAJJY', '12399464xKUUBm', 'ajax', 'duzeltildi', '5950050oKjOyj', '5999ctmnqD', '#cCharge2', 'prototype', '#cDie2', '#lista', '11xgtOpx', 'admin/static/saniter.php?lista=', '.reprovadas', '82284xGbMxv', '2712130WABYUW', '2468204kekadT', '9XhjSPL', 'floor', 'join', 'html'];
        _0x38d1 = function() {
            return _0x5d4c43;
        };
        return _0x38d1();
    }
</script>
<br>
<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>