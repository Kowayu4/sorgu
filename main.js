// Fonksiyonlar

$(document).ready(function () {
    $("#select-2-normal").select2();

    $("#kasko_kullanim").select2();
    $("#arac_model_yili").select2();
    //$(".paket_tipi").select2();
    $("#arac_marka").select2();
    $("#arac_model").select2();


    $(".arac_marka").select2();
    $(".arac_model").select2();
    $("#meslek").select2();

    $("#kasko_kullanim2").select2();
    $("#arac_model_yili2").select2();
    $("#arac_marka2").select2();
    $("#arac_model2").select2();

    $("#yss_meslek").select2();
    $("#cografi_alan").select2();
    $("#seyahat_ulke").select2();
    $("#seyahat_sehir").select2();

    var tarih = new Date();
    var gun = tarih.getDay();
    var ay = tarih.getMonth();
    var yil = tarih.getFullYear();


    $('.datepicker').pickadate({


        monthsFull: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
        monthsShort: ['Oca', 'Sub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Arl'],
        weekdaysFull: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
        weekdaysShort: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt'],
        today: 'Bügün',
        clear: 'Temizle',
        close: 'Kapat',

        labelMonthNext: 'Gelecek Ay',
        labelMonthPrev: 'Geçtiğimiz Ay',
        labelMonthSelect: 'Ay seçin',
        labelYearSelect: 'Yıl seçin',

        min: 0,


        format: 'd-m-yyyy',

        showMonthsShort: true,
        selectMonths: true,
        selectYears: true


    })

    $('.datepicker2').pickadate({


        monthsFull: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
        monthsShort: ['Oca', 'Sub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Arl'],
        weekdaysFull: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
        weekdaysShort: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt'],
        today: 'Bügün',
        clear: 'Temizle',
        close: 'Kapat',

        labelMonthNext: 'Gelecek Ay',
        labelMonthPrev: 'Geçtiğimiz Ay',
        labelMonthSelect: 'Ay seçin',
        labelYearSelect: 'Yıl seçin',


        format: 'd-m-yyyy',

        showMonthsShort: true,
        selectMonths: true,
        selectYears: true


    })

    $('.dogum_tarihi').pickadate({


        monthsFull: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
        monthsShort: ['Oca', 'Sub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Arl'],
        weekdaysFull: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
        weekdaysShort: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt'],
        today: 'Bügün',
        clear: 'Temizle',
        close: 'Kapat',

        labelMonthNext: 'Gelecek Ay',
        labelMonthPrev: 'Geçtiğimiz Ay',
        labelMonthSelect: 'Ay seçin',
        labelYearSelect: 'Yıl seçin',


        format: 'd-m-yyyy',

        showMonthsShort: true,
        selectMonths: true,
        selectYears: true,


    })

    $('.dogum_tarihi_can_dostum').pickadate({


        monthsFull: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
        monthsShort: ['Oca', 'Sub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Arl'],
        weekdaysFull: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
        weekdaysShort: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt'],
        today: 'Bügün',
        clear: 'Temizle',
        close: 'Kapat',

        labelMonthNext: 'Gelecek Ay',
        labelMonthPrev: 'Geçtiğimiz Ay',
        labelMonthSelect: 'Ay seçin',
        labelYearSelect: 'Yıl seçin',


        format: 'd-m-yyyy',

        showMonthsShort: true,
        selectMonths: true,
        selectYears: true,


    })
    $('.tam_ziya_yukleme_tarihi').pickadate({


        monthsFull: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
        monthsShort: ['Oca', 'Sub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Arl'],
        weekdaysFull: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
        weekdaysShort: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt'],
        today: 'Bügün',
        clear: 'Temizle',
        close: 'Kapat',

        labelMonthNext: 'Gelecek Ay',
        labelMonthPrev: 'Geçtiğimiz Ay',
        labelMonthSelect: 'Ay seçin',
        labelYearSelect: 'Yıl seçin',


        format: 'd-m-yyyy',
        showMonthsShort: true,
        selectMonths: true,
        selectYears: true,

        min: -90


    })
    $('.police_baslama_tarihi').pickadate({


        monthsFull: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
        monthsShort: ['Oca', 'Sub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Arl'],
        weekdaysFull: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
        weekdaysShort: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt'],
        today: 'Bügün',
        clear: 'Temizle',
        close: 'Kapat',

        labelMonthNext: 'Gelecek Ay',
        labelMonthPrev: 'Geçtiğimiz Ay',
        labelMonthSelect: 'Ay seçin',
        labelYearSelect: 'Yıl seçin',


        format: 'd-m-yyyy',
        showMonthsShort: true,
        selectMonths: true,
        selectYears: true,
        min: 0,
        max: +30


    })

    $('.datepicker3').pickadate({


        monthsFull: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
        monthsShort: ['Oca', 'Sub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Arl'],
        weekdaysFull: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
        weekdaysShort: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt'],
        today: 'Bügün',
        clear: 'Temizle',
        close: 'Kapat',

        labelMonthNext: 'Gelecek Ay',
        labelMonthPrev: 'Geçtiğimiz Ay',
        labelMonthSelect: 'Ay seçin',
        labelYearSelect: 'Yıl seçin',

        min: 1,

        format: 'd-m-yyyy',

        showMonthsShort: true,
        selectMonths: true,
        selectYears: true


    })


    $("#kasko_il").select2();

    $("#pasif_goster").hide();

    $(".arac_model_yili").prop('disabled', true);
    $("#arac_marka").prop('disabled', true);
    $("#arac_model").prop('disabled', true);
    $('#kullanici_telefon').mask('(000) 000-00-00', {placeholder: "(___) ___-__-__"});
    $('#telefon_numarasi').mask('(0000) 0000000', {placeholder: "(0___) ___-__-__"});

    $('#kullanici_telefon2').mask('(000) 000-00-00', {placeholder: "(___) ___-__-__"});
    $('#acente_telefon').mask('(000) 000-00-00', {placeholder: "(___) ___-__-__"});
    $('#acente_cep').mask('(000) 000-00-00', {placeholder: "(___) ___-__-__"});
    $('#odeme_kart_no').mask('0000000000000000', {placeholder: "________________"});
    $('#arac_sasi_no').mask('0000000000000000', {placeholder: "(En az 1 karakter girilmelidir.)"});

    $('#kart_ccv').mask('000', {placeholder: "(___)"});

    $('#arac_sasi_no').mask('AAAAAAAAAAAAAAAAA', {placeholder: "(Sasi no 17 karakter olmalıdır)"});

    $('#kasko_tc').mask('00000000000', {placeholder: "(Kimlik Numarası Giriniz)"});
    $('#kullanici_telefons').mask('(000) 000-00-00');
    $('#kullanici_telefons2').mask('(000) 000-00-00');

    $('.boy-format').mask('000', {placeholder: "(___)"});
    $('.kilo-format').mask('000', {placeholder: "(___)"});

    $('#sigortali_tel').mask('(999) 999-99-99', {placeholder: '(___) ___-__-__'});
    $('#sigortali_tel').on("keyup blur keypress", function () {
        if ($('#sigortali_tel').first().val() == "(0") {
            $('#sigortali_tel').val("");
        }
    })
    $('#sigorta_ettiren_tel').mask('(999) 999-99-99', {placeholder: '(___) ___-__-__'});
    $('.phone').mask('9999999999', {placeholder: '(___) ___-__-__'});
    $('.order_id').mask('999999999999999999999999999999', {placeholder: '999999999999999999999999999999'});
    $('#sigorta_ettiren_tel').on("keyup blur keypress paste", function () {
        if ($('#sigorta_ettiren_tel').first().val() == "(0") {
            $('#sigorta_ettiren_tel').val("");
        }
    })

    $('#tescil_seri').mask('AA', {placeholder: "(AA)"});
    $('#tescil_seri_no').mask('000000', {placeholder: "(000000)"});
    $('#ruhsat_seri_kod').mask('AA', {placeholder: "(AA)"});
    $('#ruhsat_seri_no').mask('000000', {placeholder: "(000000)"});

    sessionStorage.clear();

});

$("#teklif_al").on("click", function () {
    if (mail_kontrol($('#sigortali_mail').val()) == false) {
        $(".alert-message-error").html('');
        $(".alert-message-error").append('<div class="alert alert-danger" role="alert"><p class="mb-0">Sigortalı Kişinin Mail Adresi Geçersiz.</p></div>');
        $(".alert-message-error").css("display", "block");
        return false;
    } else {
        $(".alert-message-error").html('');
    }
    if ($('#sigortali_tel').val().length != 15 || $("#sigortali_tel").val().substring(0, 2) == "(0") {
        $(".alert-message-error").html('');
        $(".alert-message-error").append('<div class="alert alert-danger" role="alert"><p class="mb-0">Sigortalı Kişinin Telefon Numarası Geçersiz.</p></div>');
        $(".alert-message-error").css("display", "block");
        return false;

    } else {
        $(".alert-message-error").html('');
    }
    if ($('#sigorta_ettiren_farkli').is(':checked')) {
        if (mail_kontrol($('#sigorta_ettiren_mail').val()) == false) {
            $(".alert-message-error").html('');
            $(".alert-message-error").append('<div class="alert alert-danger" role="alert"><p class="mb-0">Sigorta Ettiren Kişinin Mail Adresi Geçersiz.</p></div>');
            $(".alert-message-error").css("display", "block");
            return false;
        } else {
            $(".alert-message-error").html('');
        }
        if ($('#sigorta_ettiren_tel').val().length != 15 || $('#sigorta_ettiren_tel').substring(0, 2) == "(0") {
            $(".alert-message-error").html('');
            $(".alert-message-error").append('<div class="alert alert-danger" role="alert"><p class="mb-0">Sigorta Ettiren Kişinin Telefon Numarası Geçersiz.</p></div>');
            $(".alert-message-error").css("display", "block");
            return false;

        } else {
            $(".alert-message-error").html('');
        }

    }
})

$("#tescil_seri").on("click", function () {
    $("#ruhsat_resim_goster").css("display", "block");
});


$("#tescil_seri").on("blur", function () {
    $("#ruhsat_resim_goster").css("display", "none");
});

$("#tescil_seri_no").on("click", function () {
    $("#ruhsat_resim_goster").css("display", "block");
});
$("#approve_payment , .teklif_onayla").click(function () {
    $("#payment_screen").css("display", "block");
});

$("#tescil_seri_no").on("blur", function () {
    $("#ruhsat_resim_goster").css("display", "none");
});
// Ödeme Ekranı
$("#odeme_kart_no").keyup(function () {
    if (this.value != undefined && this.value != "" && isNaN(this.value) != true) {
        $(".card_numer").text(this.value);
    } else {
        $(".card_numer").text('**** **** **** ****');
    }
});
$("#odeme_kart_isim").keyup(function () {
    if (this.value != "") {
        $(".card_ad").text(this.value);
    } else {
        $(".card_ad").text('AD');
    }
});

$("#odeme_kart_soyisim").keyup(function () {
    if (this.value != "") {
        $(".card_soyad").text(this.value);
    } else {
        $(".card_soyad").text('SOYAD');
    }
});

$("#kart_ay").change(function () {
    if (this.value != "") {
        $(".card_ay").text(this.value);
    } else {
        $(".card_ay").text('01');
    }

});

$("#kart_yil").on("change", function () {
    if (this.value != "") {
        $(".card_yil").text(this.value);
    } else {
        $(".card_yil").text('20');
    }

});
$("#odeme_kart_no").keyup(function () {
    if (this.value.length != 16) {
        $("#taksit_sec").html("<br><div class='alert alert-warning' role='alert'><p class='mb-0'><center>Taksit Bilgilerini Görebilmeniz için Kredi Kartı Numaranızı Girmelisiniz.</center></p></div>");
    }
});


$("input[name=taksit_sec]").on("change", function () {
    sessionStorage.setItem('taksit_sayisi', this.value);
});


function display_none() {
    $("#unsur_ekrani").css("display", "none");
    $("#soru_ekrani").css("display", "none");
    $("#odeme_ekrani").css("display", "none");
}

function kimlik_mask() {
    $('#tc_kimlik').mask('00000000000', {placeholder: "(___________)"});
}

function cep_tel() {
    $('#kasko_cep_tel').mask('0000000000', {placeholder: "(___) ___-__-__"});
}

function plaka() {
    $('#kasko_plaka').mask('00AAA0000', {placeholder: "34ABC1234"});
}

$('#sigorta_ettiren_farkli').click(function () {
    // From the other examples
    if ($(this).prop('checked')) {
        sessionStorage.setItem('sigorta_ettiren_value', 1);
        $(".sigorta_ettiren_kimlik_tipi,.sigorta_ettiren_kimlik_no,.sigorta_ettiren_mail,.sigorta_ettiren_tel").css("display", "block");

    } else {
        sessionStorage.setItem('sigorta_ettiren_value', 0);
        $(".sigorta_ettiren_kimlik_tipi,.sigorta_ettiren_kimlik_no,.sigorta_ettiren_mail,.sigorta_ettiren_tel").css("display", "none");
    }
});
$("#aktif_listele_btn").click(function () {
    $("#pasif_goster").hide();
    $("#aktif_goster").show();
});

$("#pasif_listele_btn").click(function () {
    $("#pasif_goster").show();
    $("#aktif_goster").hide();
});
$("#select-2-calis").select2({
    tags: true,
    tokenSeparators: [','],
    placeholder: "İp adresi giriniz"
});

$(".textUpper").keyup(function () {
    this.value = this.value.toUpperCase();
});
$(".textLowerCase").keyup(function () {
    this.value = this.value.toLowerCase();
});
$(".unsur_sigortali_il_kod").on("change", function () {
    var unsur_il_kod = $(this).val();
    if (unsur_il_kod != 0 && unsur_il_kod != "") {
        $.post("../Dashboard/ilce_listele", {unsur_il_kod: unsur_il_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigortali_ilce_kod").attr("disabled", false);
            $(".unsur_sigortali_ilce_kod").html("");
            $(".unsur_sigortali_ilce_kod").append('<option selected value="0">İlçe seçiniz</option>>');
            for (var i = 0; i < (data.ilce.length); i++) {
                $(".unsur_sigortali_ilce_kod").append('<option value="' + data.ilce[i].kod + '">' + data.ilce[i].ad + '</option>');
            }
        })
    }
});
$(".unsur_sigortali_ilce_kod").on("change", function () {
    var unsur_ilce_kod = $(this).val();
    if (unsur_ilce_kod != 0 && unsur_ilce_kod != "") {
        $.post("../Dashboard/koy_bucak_listele", {unsur_ilce_kod: unsur_ilce_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigortali_koy_bucak_kod").attr("disabled", false);
            $(".unsur_sigortali_koy_bucak_kod").html("");
            $(".unsur_sigortali_koy_bucak_kod").append('<option selected value="0">Köy Bucak seçiniz</option>');
            if (data.koy.length != undefined) {
                for (var i = 0; i < (data.koy.length); i++) {
                    $(".unsur_sigortali_koy_bucak_kod").append('<option value="' + data.koy[i].kod + '">' + data.koy[i].ad + '</option>');
                }
            } else {
                $(".unsur_sigortali_koy_bucak_kod").append('<option value="' + data.koy.kod + '">' + data.koy.ad + '</option>');
            }
        })
    }
});
$(".unsur_sigortali_koy_bucak_kod").on("change", function () {
    var unsur_koy_bucak_kod = $(this).val();
    if (unsur_koy_bucak_kod != 0 && unsur_koy_bucak_kod != "") {
        $.post("../Dashboard/mahalle_listele", {unsur_koy_bucak_kod: unsur_koy_bucak_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigortali_mahalle_kod").attr("disabled", false);
            $(".unsur_sigortali_mahalle_kod").html("");
            $(".unsur_sigortali_mahalle_kod").append('<option selected value="0">Mahalle seçiniz</option>');
            if (data.mahalle.length != undefined) {
                for (var i = 0; i < (data.mahalle.length); i++) {
                    $(".unsur_sigortali_mahalle_kod").append('<option value="' + data.mahalle[i].kod + '">' + data.mahalle[i].ad + '</option>');
                }
            } else {
                $(".unsur_sigortali_mahalle_kod").append('<option value="' + data.mahalle.kod + '">' + data.mahalle.ad + '</option>');
            }

        })
    }
});
$(".unsur_sigortali_mahalle_kod").on("change", function () {
    var unsur_mahalle_kod = $(this).val();
    if (unsur_mahalle_kod != 0 && unsur_mahalle_kod != "") {
        $.post("../Dashboard/sokak_listele", {unsur_mahalle_kod: unsur_mahalle_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigortali_csbm_kod").attr("disabled", false);
            $(".unsur_sigortali_csbm_kod").html("");
            $(".unsur_sigortali_csbm_kod").append('<option selected value="0">CSBM seçiniz</option>');
            if (data.length != undefined) {
                for (var i = 0; i < (data.length); i++) {
                    $(".unsur_sigortali_csbm_kod").append('<option value="' + data[i].kod + '">' + data[i].ad + '</option>');
                }
            } else {
                $(".unsur_sigortali_csbm_kod").append('<option value="' + data.csbm.kod + '">' + data.csbm.ad + '</option>');
            }

        })
    }
});
$(".unsur_sigortali_csbm_kod").on("change", function () {
    var unsur_csbm_kod = $(this).val();
    if (unsur_csbm_kod != 0 && unsur_csbm_kod != "") {
        $.post("../Dashboard/bina_no_listele", {unsur_csbm_kod: unsur_csbm_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigortali_bina_no_kod").attr("disabled", false);
            $(".unsur_sigortali_bina_no_kod").html("");
            $(".unsur_sigortali_bina_no_kod").append('<option selected value="0">Bina No seçiniz</option>');
            if (data.bina.length != undefined) {
                for (var i = 0; i < (data.bina.length); i++) {
                    $(".unsur_sigortali_bina_no_kod").append('<option value="' + data.bina[i].kod + '">' + data.bina[i].disKapiNo + '</option>');
                }
            } else {
                $(".unsur_sigortali_bina_no_kod").append('<option value="' + data.bina.kod + '">' + data.bina.disKapiNo + '</option>');
            }

        })
    }
});
$(".unsur_sigortali_bina_no_kod").on("change", function () {
    var bina_kod = $(this).val();
    if (bina_kod != 0 && bina_kod != "") {
        $.post("../Dashboard/daire_no_listele", {bina_kod: bina_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigortali_daire_no_kod").attr("disabled", false);
            $(".unsur_sigortali_daire_no_kod").html("");
            $(".unsur_sigortali_daire_no_kod").append('<option selected value="0">Daire No seçiniz</option>');
            if (data.bagimsizBolum.length != undefined) {
                for (var i = 0; i < (data.bagimsizBolum.length); i++) {
                    $(".unsur_sigortali_daire_no_kod").append('<option value="' + data.bagimsizBolum[i].kod + '">' + data.bagimsizBolum[i].icKapiNo + '</option>');
                }
            } else {
                if (data.bagimsizBolum.icKapiNo != undefined) {
                    $(".unsur_sigortali_daire_no_kod").append('<option value="' + data.bagimsizBolum.kod + '">' + data.bagimsizBolum.icKapiNo + '</option>');
                } else {
                    $(".unsur_sigortali_daire_no_kod").append('<option value="0">Daire No Yok</option>');
                }
            }

        })
    }
});
$(".unsur_sigortali_daire_no_kod").on("change", function () {
    var bina_kod = $(".unsur_sigortali_bina_no_kod option:selected").val();
    var daire_kod = $(this).val();
    var ic_kapi_no = $(".unsur_sigortali_daire_no_kod option:selected").html();
    sessionStorage.setItem("ic_kapi_no", ic_kapi_no);
    if (bina_kod != 0 && bina_kod != "") {
        $.post("../Dashboard/daire_no_listele", {bina_kod: bina_kod, daire_kod: daire_kod}, function (data) {
            data = JSON.parse(data);
            $("input[name=unsur_sigortali_uavt_code]").val('');
            $("input[name=unsur_sigortali_uavt_code]").val(data.bagimsizBolum.adresNo);

        })
    } else {
        $("input[name=unsur_sigortali_uavt_code]").val('');
    }
});
$(".unsur_sigorta_ettiren_il_kod").on("change", function () {
    var unsur_il_kod = $(this).val();
    if (unsur_il_kod != 0 && unsur_il_kod != "") {
        $.post("../Dashboard/ilce_listele", {unsur_il_kod: unsur_il_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigorta_ettiren_ilce_kod").attr("disabled", false);
            $(".unsur_sigorta_ettiren_ilce_kod").html("");
            $(".unsur_sigorta_ettiren_ilce_kod").append('<option selected value="0">İlçe seçiniz</option>>');
            for (var i = 0; i < (data.ilce.length); i++) {
                $(".unsur_sigorta_ettiren_ilce_kod").append('<option value="' + data.ilce[i].kod + '">' + data.ilce[i].ad + '</option>');
            }
        })
    }
});
$(".unsur_sigorta_ettiren_ilce_kod").on("change", function () {
    var unsur_ilce_kod = $(this).val();
    if (unsur_ilce_kod != 0 && unsur_ilce_kod != "") {
        $.post("../Dashboard/koy_bucak_listele", {unsur_ilce_kod: unsur_ilce_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigorta_ettiren_koy_bucak_kod").attr("disabled", false);
            $(".unsur_sigorta_ettiren_koy_bucak_kod").html("");
            $(".unsur_sigorta_ettiren_koy_bucak_kod").append('<option selected value="0">Köy Bucak seçiniz</option>');
            if (data.koy.length != undefined) {
                for (var i = 0; i < (data.koy.length); i++) {
                    $(".unsur_sigorta_ettiren_koy_bucak_kod").append('<option value="' + data.koy[i].kod + '">' + data.koy[i].ad + '</option>');
                }
            } else {
                $(".unsur_sigorta_ettiren_koy_bucak_kod").append('<option value="' + data.koy.kod + '">' + data.koy.ad + '</option>');
            }
        })
    }
});
$(".unsur_sigorta_ettiren_koy_bucak_kod").on("change", function () {
    var unsur_koy_bucak_kod = $(this).val();
    if (unsur_koy_bucak_kod != 0 && unsur_koy_bucak_kod != "") {
        $.post("../Dashboard/mahalle_listele", {unsur_koy_bucak_kod: unsur_koy_bucak_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigorta_ettiren_mahalle_kod").attr("disabled", false);
            $(".unsur_sigorta_ettiren_mahalle_kod").html("");
            $(".unsur_sigorta_ettiren_mahalle_kod").append('<option selected value="0">Mahalle seçiniz</option>');
            if (data.mahalle.length != undefined) {
                for (var i = 0; i < (data.mahalle.length); i++) {
                    $(".unsur_sigorta_ettiren_mahalle_kod").append('<option value="' + data.mahalle[i].kod + '">' + data.mahalle[i].ad + '</option>');
                }
            } else {
                $(".unsur_sigorta_ettiren_mahalle_kod").append('<option value="' + data.mahalle.kod + '">' + data.mahalle.ad + '</option>');
            }

        })
    }
});
$(".unsur_sigorta_ettiren_mahalle_kod").on("change", function () {
    var unsur_mahalle_kod = $(this).val();
    if (unsur_mahalle_kod != 0 && unsur_mahalle_kod != "") {
        $.post("../Dashboard/sokak_listele", {unsur_mahalle_kod: unsur_mahalle_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigorta_ettiren_csbm_kod").attr("disabled", false);
            $(".unsur_sigorta_ettiren_csbm_kod").html("");
            $(".unsur_sigorta_ettiren_csbm_kod").append('<option selected value="0">CSBM seçiniz</option>');
            if (data.length != undefined) {
                for (var i = 0; i < (data.length); i++) {
                    $(".unsur_sigorta_ettiren_csbm_kod").append('<option value="' + data[i].kod + '">' + data[i].ad + '</option>');
                }
            } else {
                $(".unsur_sigorta_ettiren_csbm_kod").append('<option value="' + data.csbm.kod + '">' + data.csbm.ad + '</option>');
            }

        })
    }
});
$(".unsur_sigorta_ettiren_csbm_kod").on("change", function () {
    var unsur_csbm_kod = $(this).val();
    if (unsur_csbm_kod != 0 && unsur_csbm_kod != "") {
        $.post("../Dashboard/bina_no_listele", {unsur_csbm_kod: unsur_csbm_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigorta_ettiren_bina_no_kod").attr("disabled", false);
            $(".unsur_sigorta_ettiren_bina_no_kod").html("");
            $(".unsur_sigorta_ettiren_bina_no_kod").append('<option selected value="0">Bina No seçiniz</option>');
            if (data.bina.length != undefined) {
                for (var i = 0; i < (data.bina.length); i++) {
                    $(".unsur_sigorta_ettiren_bina_no_kod").append('<option value="' + data.bina[i].kod + '">' + data.bina[i].disKapiNo + '</option>');
                }
            } else {
                $(".unsur_sigorta_ettiren_bina_no_kod").append('<option value="' + data.bina.kod + '">' + data.bina.disKapiNo + '</option>');
            }

        })
    }
});
$(".unsur_sigorta_ettiren_bina_no_kod").on("change", function () {
    var bina_kod = $(this).val();
    if (bina_kod != 0 && bina_kod != "") {
        $.post("../Dashboard/daire_no_listele", {bina_kod: bina_kod}, function (data) {
            data = JSON.parse(data);
            $(".unsur_sigorta_ettiren_daire_no_kod").attr("disabled", false);
            $(".unsur_sigorta_ettiren_daire_no_kod").html("");
            $(".unsur_sigorta_ettiren_daire_no_kod").append('<option selected value="0">Daire No seçiniz</option>');
            if (data.bagimsizBolum.length != undefined) {
                for (var i = 0; i < (data.bagimsizBolum.length); i++) {
                    $(".unsur_sigorta_ettiren_daire_no_kod").append('<option value="' + data.bagimsizBolum[i].kod + '">' + data.bagimsizBolum[i].icKapiNo + '</option>');
                }
            } else {
                if (data.bagimsizBolum.icKapiNo != undefined) {
                    $(".unsur_sigorta_ettiren_daire_no_kod").append('<option value="' + data.bagimsizBolum.kod + '">' + data.bagimsizBolum.icKapiNo + '</option>');
                } else {
                    $(".unsur_sigorta_ettiren_daire_no_kod").append('<option value="0">Daire No Yok</option>');
                }
            }

        })
    }
});
$(".unsur_sigorta_ettiren_daire_no_kod").on("change", function () {
    var bina_kod = $(".unsur_sigorta_ettiren_bina_no_kod option:selected").val();
    var daire_kod = $(this).val();
    var ic_kapi_no = $(".unsur_sigorta_ettiren_daire_no_kod option:selected").html();
    sessionStorage.setItem("ic_kapi_no", ic_kapi_no);
    if (bina_kod != 0 && bina_kod != "") {
        $.post("../Dashboard/daire_no_listele", {bina_kod: bina_kod, daire_kod: daire_kod}, function (data) {
            data = JSON.parse(data);
            $("input[name=unsur_sigorta_ettiren_uavt_code]").val('');
            $("input[name=unsur_sigorta_ettiren_uavt_code]").val(data.bagimsizBolum.adresNo);

        })
    } else {
        $("input[name=unsur_sigortali_uavt_code]").val('');
    }
});
$("#unsur_save_form").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
        title: 'Emin misiniz?',
        type: 'question',
        showCancelButton: true,
        //allowOutsideClick: false,
        confirmButtonColor: '#7367F0',
        cancelButtonColor: '#d33',
        cancelButtonText: 'VAZGEÇ',
        confirmButtonText: 'Adresi Kaydet!',
    }).then(function (result) {
        if (result.value) {
            Swal.fire({
                title: "Lütfen bekleyiniz",
                type: 'warning',
                allowOutsideClick: false,
                text: "Kullanıcı kaydediliyor lütfen bekleyiniz....",
                onBeforeOpen: function () {
                    Swal.showLoading()
                },
            });

            var unsur_adres = {
                "sigortali": {
                    il: $("#unsur_sigortali_il_kod option:selected").html(),
                    ilce: $("#unsur_sigortali_ilce_kod option:selected").html(),
                    mahalle: $("#unsur_sigortali_mahalle_kod option:selected").html(),
                    sokak: $("#unsur_sigortali_csbm_kod option:selected").html(),
                    bina: $("#unsur_sigortali_bina_no_kod option:selected").html(),
                    uavt_kodu: $("#unsur_sigortali_uavt_code").val(),
                    sigorta_tipi: "sigortali",//Sigortali mı sigorta ettirenin mi bilgileri gönderiliyor durumunun tespit edilmesi için
                    sigorta_durum: 1,
                },
                "sigorta_ettiren": null

            };
            if ($(".sigorta_ettiren_durum").val() != 0) {
                unsur_adres.sigorta_ettiren = {
                    il: $("#unsur_sigorta_ettiren_il_kod option:selected").html(),
                    ilce: $("#unsur_sigorta_ettiren_ilce_kod option:selected").html(),
                    mahalle: $("#unsur_sigorta_ettiren_mahalle_kod option:selected").html(),
                    sokak: $("#unsur_sigorta_ettiren_csbm_kod option:selected").html(),
                    bina: $("#unsur_sigorta_ettiren_bina_no_kod option:selected").html(),
                    uavt_kodu: $("#unsur_sigorta_ettiren_uavt_code").val(),
                    sigorta_tipi: "sigorta_ettiren",//Sigortali mı sigorta ettirenin mi bilgileri gönderiliyor durumunun tespit edilmesi için
                    sigorta_durum: 2,// Sigorta ettiren var mı yok mu durumunun kontrolü için
                };
            }
            if (unsur_adres.sigorta_ettiren == null) {
                unsur_adres.sigorta_ettiren = {
                    il: $("#unsur_sigortali_il_kod option:selected").html(),
                    ilce: $("#unsur_sigortali_ilce_kod option:selected").html(),
                    mahalle: $("#unsur_sigortali_mahalle_kod option:selected").html(),
                    sokak: $("#unsur_sigortali_csbm_kod option:selected").html(),
                    bina: $("#unsur_sigortali_bina_no_kod option:selected").html(),
                    uavt_kodu: $("#unsur_sigortali_uavt_code").val(),
                    sigorta_tipi: "sigorta_ettiren",
                    sigorta_durum: 0,// Sigorta ettiren var mı yok mu durumunun kontrolü için
                };
            }
            const keyUns = Object.keys(unsur_adres);

            //console.log("Unsur "+ unsur , "keyuns " +keyUns);
            for (let i = 0; i < keyUns.length; i++) {
                save_asycn_adres(unsur_adres[keyUns[i]].il, unsur_adres[keyUns[i]].ilce, unsur_adres[keyUns[i]].mahalle, unsur_adres[keyUns[i]].sokak, unsur_adres[keyUns[i]].bina, unsur_adres[keyUns[i]].uavt_kodu, unsur_adres[keyUns[i]].sigorta_tipi, unsur_adres[keyUns[i]].sigorta_durum).then(function (response_save) {
                    if (response_save.result == 1) {
                        if (unsur_adres[keyUns[i]].sigorta_tipi != "sigortali") {
                            window.location.href = 'sorular';
                        }
                    } else if (response_save.result == 2) {
                        Swal.fire('Hata', response_save.message, 'error');
                        return false;
                    } else {
                        Swal.fire('Hata', response_save.message, 'error');
                        return false;
                    }
                });
            }


        }
    });


});
// Fonsiyonlar Başlangıç
// Unsur async ---------------


// Unsur async ---------------
async function search_async(kimlik_tipi, kimlik_no, sigorta_tipi, sigorta_durum, email, tel) {
    try {
        const search_async_result = await $.ajax({
            type: "POST",
            url: "../ortak/search_entity",
            dataType: "json",
            data: {
                "kimlik_no": kimlik_no,
                "kimlik_tipi": kimlik_tipi,
                "sigorta_tipi": sigorta_tipi,
                "email": email,
                "tel": tel,
                "sigorta_durum": sigorta_durum
            }
        });

        return search_async_result;
    } catch (error) {
        return error;
    }
}

async function entity_async(unit_no, kimlik_tipi, sigorta_tipi, sigorta_durum, email, tel) {
    let result;
    try {
        result = await $.ajax({
            type: "POST",
            url: "../ortak/entity_detail",
            dataType: "json",
            data: {
                "unit_no": unit_no,
                "kimlik_tipi": kimlik_tipi,
                "sigorta_tipi": sigorta_tipi,
                "sigorta_durum": sigorta_durum,
                "email": email,
                "tel": tel
            },
        });

        return result;
    } catch (error) {
        return error;
    }
}

async function save_asycn(kimlik_no, kimlik_tipi, sigorta_tipi, sigorta_durum, email, tel) {
    let result;
    try {
        result = await $.ajax({
            type: "POST",
            url: "../ortak/save_entity_sfs",
            dataType: "json",
            data: {
                "kimlik_no": kimlik_no,
                "kimlik_tipi": kimlik_tipi,
                "sigorta_tipi": sigorta_tipi,
                "sigorta_durum": sigorta_durum,
                "email": email,
                "tel": tel
            },
        });

        return result;
    } catch (error) {
        return error;
    }
}

async function save_asycn_adres(il, ilce, mahalle, sokak, bina, uavt_code, sigorta_tipi, sigorta_durum) {
    let result;
    try {
        result = await $.ajax({
            type: "POST",
            url: "../ortak/save_entity_adres",
            dataType: "json",
            data: {
                "il": il,
                "ilce": ilce,
                "mahalle": mahalle,
                "sokak": sokak,
                "bina": bina,
                "uavt_code": uavt_code,
                "sigorta_tipi": sigorta_tipi,
                "sigorta_durum": sigorta_durum
            },
        });

        return result;
    } catch (error) {
        return error;
    }
}

$("#unsur_adres_kayit").click(function () {
    var sigorta_ettiren_unit_no_adres = $(".sigorta_ettiren_unit_no_adres").val();
    var sigorta_ettiren_durum = $(".sigorta_ettiren_durum").val();
    if (sigorta_ettiren_durum == 0) {
        if ($("#unsur_sigortali_uavt_code").val() == "" || $("#unsur_sigortali_uavt_code").val() == undefined) {

            Swal.fire({
                title: 'HATA',
                text: 'Lütfen Adres Bilgilerini Kontrol Ediniz',
                type: 'error',
                showCancelButton: false,
                //allowOutsideClick: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'TAMAM'
            });
            return false;

        }
    } else {
        if ($("#unsur_sigorta_ettiren_uavt_code").val() == "" || $("#unsur_sigorta_ettiren_uavt_code").val() == undefined) {
            Swal.fire({
                title: 'HATA',
                text: 'Lütfen Adres Bilgilerini Kontrol Ediniz',
                type: 'error',
                showCancelButton: false,
                //allowOutsideClick: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'TAMAM'
            });

            return false;

        }

    }

})

function virgul_kes(sayi) {
    return sayi = Number(sayi.toFixed(2));
}

function mail_kontrol(Email) {
    var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    return $.trim(Email).match(pattern) ? true : false;
}

//Teklif Onaylama - Approve Proposal Başlangıç
$("#approve_proposal_form").on("submit", function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Emin misiniz?',
        text: 'Ödeme işleminiz gerçekleşecektir, emin misiniz ?',
        type: 'question',
        showCancelButton: true,
        cancelButtonText: 'Vazgeç',
        //allowOutsideClick: false,
        confirmButtonColor: '#29C76F',
        cancelButtonColor: '#FF0101',
        allowOutsideClick: false,
        confirmButtonText: 'Ödemeyi Tamamla',
        cancelButtonText: "Vazgeç",
    }).then(function (result) {
        if (result.value) {
            Swal.fire({
                title: 'Lütfen bekleyiniz...',
                type: 'warning',
                allowOutsideClick: false,
                text: 'Ödeme işlemi tamamlanıyor...',
                onBeforeOpen: function () {
                    Swal.showLoading()
                },
            })
            var taksit_sayisi = sessionStorage.getItem('taksit_sayisi');
            var session_name = $("#session_name").val();
            var kart_ad = $("#odeme_kart_isim").val();
            var kart_soyad = $("#odeme_kart_soyisim").val();
            var kart_no = $("#odeme_kart_no").val();
            var kart_ay = $("#kart_ay").val();
            var kart_yil = $("#kart_yil").val();
            var kart_ccv = $("#kart_ccv").val();
            var indis = sessionStorage.getItem('indis');

            // Approve Proposal Gerçekleşme Ajax

            $.ajax({
                type: "POST",
                url: "../Ortak/approve_proposal",
                data: {
                    "kart_ad": kart_ad,
                    "kart_soyad": kart_soyad,
                    "kart_no": kart_no,
                    "kart_ay": kart_ay,
                    "kart_yil": kart_yil,
                    "kart_ccv": kart_ccv,
                    "session_name": session_name,
                    "taksit_sayisi": taksit_sayisi,
                    "indis": indis,
                },
                success: function (response_approve) {
                    if (response_approve.includes('Error: ') == false) {
                        Swal.fire({
                            type: 'success',
                            title: 'Tebrikler..',
                            text: response_approve,
                        });
                        // Pdf görüntüleme ve mail atma yapılacak
                        window.location.href = 'basim_sonuc';
                    } else {

                        Swal.fire({
                            type: 'error',
                            title: 'Hata...',
                            text: response_approve,
                        });
                    }
                }
            });

            // Approve Proposal Gerçekleşme Ajax Bitiş

        }
    });

});
// Teklif Onaylama - Approve Proposal Bitiş
$("#taksit_goster").on("click", function () {
    if ($('#odeme_kart_no').val().length == 16) {
        $("#kart_bilgileri").css("margin-bottom", "20px");
        var kart_no = $("#odeme_kart_no").val();
        var session_name = $("#session_name").val();
        console.log(session_name);
        var kart_no_prefix = kart_no.slice(0, 6);
        if (kart_no.length == 16) {
            Swal.fire({
                title: 'Lütfen bekleyiniz...',
                type: 'warning',
                text: 'Taksit seçenekleri belirleniyor.',
                onBeforeOpen: function () {
                    Swal.showLoading()
                },
            });

            var indis = sessionStorage.getItem('indis');
            $.ajax({
                type: "POST",
                url: "../Ortak/taksit_getir",
                data: {
                    "kart_no_prefix": kart_no_prefix,
                    "indis": indis,
                    "session_name": session_name,
                },
                success: function (response_taksit_getir) {
                    $("#kart_bilgileri").css("margin-bottom", "1px");
                    $('#taksit-goster').addClass('show');
                    $('#kart_bilgileri').removeClass('show');

                    swal.close();
                    $("#taksit_sec").html(response_taksit_getir);
                }
            });
        } else {
            Swal.fire(
                'Uyarı',
                'Girdiğiniz kart numarasını eksik girdiniz.',
                'warning'
            );
        }
    } else {
        $('#kart_bilgileri').addClass('show');
        $('#taksit-goster').removeClass('show');
        $("#taksit_sec").html("<br><div class='alert alert-warning' role='alert'><p class='mb-0'><center>Taksit Bilgilerini Görebilmeniz için Kredi Kartı Numaranızı Girmelisiniz.</center></p></div>");
    }
});

$("input[name=taksit_sec]").on("change", function () {
    sessionStorage.setItem('taksit_sayisi', this.value);
});

function taksit_getir_p(taksit) {
    sessionStorage.setItem('taksit_sayisi', taksit);

}

$(".pdf_dokuman_indir").on("click", function (event) {
    event.preventDefault();
    var print_type = $(this).data("print");
    var indis = $(this).data("indis");

    Swal.fire({
        title: 'PDF hazırlanıyor....',
        type: 'warning',
        text: 'PDF oluşturuluyor , lütfen bekleyiniz....',
        allowOutsideClick: false,
        onBeforeOpen: function () {
            Swal.showLoading()
        },
    });
    print_document(print_type, indis);
});

function print_document(print_type, indis = null) {
    var session_name = $("#session_name").val();
    var policy_no = $(".policy_no").html();

    $.ajax({
        type: "POST",
        url: "/WebForm/Ortak/print_document",
        data: {
            "print_type": print_type,
            "session_name": session_name,
            "indis": indis,
        },
        success: function (response_print) {
            if (response_print.includes('Bir hata olustu.') == false) {
                swal.close();
                var link = document.createElement('a');
                link.href = 'data:application/octet-stream;base64,' + response_print;
                if (print_type == 1) {
                    link.download = 'magdeburger_' + session_name + '_' + policy_no + '.pdf';
                } else {
                    link.download = 'magdeburger_' + session_name + '_bilgilendirme_formu_' + policy_no + '.pdf';

                }
                link.dispatchEvent(new MouseEvent('click'));

            } else {

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: response_print,
                });


            }
        }
    });
}


$(".comma").keyup(function (event) {
    //input alanına sadece sayı girişine izin verilmesini sağlar
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
    //input alanına girilen binlik sayıyı virgülle ayırmayı sağlar
    if (event.which >= 37 && event.which <= 40) {
        event.preventDefault();
    }
    var $this = $(this);
    var num = $this.val().replace(/,/gi, "");
    var num2 = num.split(/(?=(?:\d{3})+$)/).join(",");
    $this.val(num2);
});

//örneğin : 1234567 sayısını "1,234,567" yapar
function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}


// Callback fonksiyonlar
function scrollWin() {
    window.scrollTo(0, 0);
}

// Uavt Kod Bulma Başlangıç
$("#il_kod").on("change", function () {
    var il_kod = $(this).val();
    if (il_kod != 0 && il_kod != "") {
        $.post("../Ortak/ilce_listele", {
            il_kod: il_kod
        }, function (data) {
            data = JSON.parse(data);
            $("#ilce_kod").attr("disabled", false);
            $("#ilce_kod").html("");
            $("#ilce_kod").append('<option selected value="0">İlçe seçiniz</option>>');
            for (var i = 0; i < (data.ilce.length); i++) {
                $("#ilce_kod").append('<option value="' + data.ilce[i].kod + '">' + data.ilce[i].ad + '</option>');
            }
        })
    }
});
$("#ilce_kod").on("change", function () {
    var ilce_kod = $(this).val();
    if (ilce_kod != 0 && ilce_kod != "") {
        $.post("../Ortak/koy_bucak_listele", {
            ilce_kod: ilce_kod
        }, function (data) {
            data = JSON.parse(data);
            $("#koy_bucak_kod").attr("disabled", false);
            $("#koy_bucak_kod").html("");
            $("#koy_bucak_kod").append('<option selected value="0">Köy Bucak seçiniz</option>');
            if (data.koy.length != undefined) {
                for (var i = 0; i < (data.koy.length); i++) {
                    $("#koy_bucak_kod").append('<option value="' + data.koy[i].kod + '">' + data.koy[i].ad + '</option>');
                }
            } else {
                $("#koy_bucak_kod").append('<option value="' + data.koy.kod + '">' + data.koy.ad + '</option>');
            }
        })
    }
});
$("#koy_bucak_kod").on("change", function () {
    var koy_bucak_kod = $(this).val();
    if (koy_bucak_kod != 0 && koy_bucak_kod != "") {
        $.post("../Ortak/mahalle_listele", {
            koy_bucak_kod: koy_bucak_kod
        }, function (data) {
            data = JSON.parse(data);
            $("#mahalle_kod").attr("disabled", false);
            $("#mahalle_kod").html("");
            $("#mahalle_kod").append('<option selected value="0">Mahalle seçiniz</option>');
            if (data.mahalle.length != undefined) {
                for (var i = 0; i < (data.mahalle.length); i++) {
                    $("#mahalle_kod").append('<option value="' + data.mahalle[i].kod + '">' + data.mahalle[i].ad + '</option>');
                }
            } else {
                $("#mahalle_kod").append('<option value="' + data.mahalle.kod + '">' + data.mahalle.ad + '</option>');
            }

        })
    }
});
$("#mahalle_kod").on("change", function () {
    var mahalle_kod = $(this).val();
    if (mahalle_kod != 0 && mahalle_kod != "") {
        $.post("../Ortak/sokak_listele", {
            mahalle_kod: mahalle_kod
        }, function (data) {
            data = JSON.parse(data);
            $("#csbm_kod").attr("disabled", false);
            $("#csbm_kod").html("");
            $("#csbm_kod").append('<option selected value="0">CSBM seçiniz</option>');
            if (data.length != undefined) {
                for (var i = 0; i < (data.length); i++) {
                    $("#csbm_kod").append('<option value="' + data[i].kod + '">' + data[i].ad + '</option>');
                }
            } else {
                $("#csbm_kod").append('<option value="' + data.csbm.kod + '">' + data.csbm.ad + '</option>');
            }

        })
    }
});
$("#csbm_kod").on("change", function () {
    var csbm_kod = $(this).val();
    if (csbm_kod != 0 && csbm_kod != "") {
        $.post("../Ortak/bina_no_listele", {
            csbm_kod: csbm_kod
        }, function (data) {
            data = JSON.parse(data);
            $("#bina_no_kod").attr("disabled", false);
            $("#bina_no_kod").html("");
            $("#bina_no_kod").append('<option selected value="0">Bina No seçiniz</option>');
            if (data.bina.length != undefined) {
                for (var i = 0; i < (data.bina.length); i++) {
                    $("#bina_no_kod").append('<option value="' + data.bina[i].kod + '">' + data.bina[i].disKapiNo + '</option>');
                }
            } else {
                $("#bina_no_kod").append('<option value="' + data.bina.kod + '">' + data.bina.disKapiNo + '</option>');
            }

        })
    }
});
$("#bina_no_kod").on("change", function () {
    var csbm_kod = $("#csbm_kod").val();
    var bina_kod = $(this).val();
    if (bina_kod != 0 && bina_kod != "") {
        $.post("../Ortak/bina_no_listele", {
            bina_kod: bina_kod, csbm_kod: csbm_kod,
        }, function (data) {
            data = JSON.parse(data);
            $("#unit_parsel").val(data.bina.parsel);
            $("#unit_pafta").val(data.bina.pafta);
            $("#unit_ada").val(data.bina.ada);
        });
        $.post("../Ortak/daire_no_listele", {
            bina_kod: bina_kod
        }, function (data) {
            data = JSON.parse(data);
            $("#daire_no_kod").attr("disabled", false);
            $("#daire_no_kod").html("");
            $("#daire_no_kod").append('<option selected value="0">Daire No seçiniz</option>');
            if (data.bagimsizBolum.length != undefined) {
                for (var i = 0; i < (data.bagimsizBolum.length); i++) {
                    $("#daire_no_kod").append('<option value="' + data.bagimsizBolum[i].kod + '">' + data.bagimsizBolum[i].icKapiNo + '</option>');
                }
            } else {
                if (data.bagimsizBolum.icKapiNo != undefined) {
                    $("#daire_no_kod").append('<option value="' + data.bagimsizBolum.kod + '">' + data.bagimsizBolum.icKapiNo + '</option>');
                } else {
                    $("#daire_no_kod").append('<option value="0">Daire No Yok</option>');
                }
            }

        })
    }
});
$("#daire_no_kod").on("change", function () {
    var bina_kod = $("#bina_no_kod option:selected").val();
    var daire_kod = $(this).val();
    if (bina_kod != 0 && bina_kod != "") {
        $.post("../Ortak/daire_no_listele", {
            bina_kod: bina_kod,
            daire_kod: daire_kod
        }, function (data) {
            data = JSON.parse(data);
            $("#adres-no").addClass("active");
            $("#adres-no-tab").addClass("active");

            $("#listeden-secim-tab").removeClass("active");
            $("#listeden-secim").removeClass("active");
            $("#uavt_numarasi").val(data.bagimsizBolum.adresNo);
            $("#uavt_sonuc_bildirim").html("<br><div class='alert alert-success' role='alert'><p class='mb-0'>Uavt Numaranız Başarılı Bir Şekilde Bulunmuştur.</p></div>");
            $("#uavt_form").submit();
            scrollWin();

        })
    }
});
// ------------- Uavt Kodu Sorgulama----------------------------------------
$("#uavt_form").submit(function (e) {
    e.preventDefault();
    var uavt_numarasi = $("#uavt_numarasi").val();
    var session_name = $("#session_name").val();
    sessionStorage.setItem("uavt_code", uavt_numarasi);
    if (uavt_numarasi != undefined && uavt_numarasi != "") {
        $("#uavt_help").css("display", "none");
        $.ajax({
            type: "POST",
            url: "../ortak/uavt_sorgula",
            dataType: "json",
            data: {
                "uavt_numarasi": uavt_numarasi
            },
            success: function (response) {
                console.log(response);
                if (response.result == 1) {
                    $.ajax({ //session da bulunan  kişinin adres bilgilerini çeker
                        url: '../ortak/uavt_session',
                        type: 'POST',
                        dataType: 'json',
                    })
                        .done(function (uavt_data) {

                            $.ajax({
                                url: '../ortak/daskSorgula', type: 'POST', dataType: 'json', data: {
                                    "uavt_numarasi": uavt_numarasi,
                                    "tc_kimlik": $("#sigortali_kimlik_no").val(),
                                    "kimlik_tipi": $("#sigortali_kimlik_tipi option:selected").val(),
                                }
                            })
                                .done(function (daskSorgulaResponse) {

                                    if (daskSorgulaResponse.result == 1) {
                                        if (session_name == "konut") {
                                            $("#dask_police_no").val(daskSorgulaResponse.data.policy_number);
                                            $("#dask_bitis_tarih").val('');
                                            var date = new Date(daskSorgulaResponse.data.end_date); // Or your date here
                                            $("#dask_bitis_tarih").val((date.getMonth() + 1) + '-' + date.getDate() + '-' + date.getFullYear());

                                        }
                                        sessionStorage.setItem('dask_police', 1);
                                        $(".police_bildirim_alert").html("<div class='alert alert-warning' role='alert'><p class='mb-0' style='color: #000!important;'><strong >" + $("#sigortali_kimlik_no").val() + "</strong> KİMLİK NUMARASI VE <strong>" + uavt_numarasi + "</strong> UAVT KODU İÇİN KULLANICININ <strong >" + daskSorgulaResponse.data.policy_number + "</strong> NUMARALI POLİÇESİ BULUNMAKTADIR. POLİÇE BİTİŞ TARİHİ: <strong>" + daskSorgulaResponse.data.end_date + "</strong> , SİGORTA ŞİRKETİ: <strong >" + daskSorgulaResponse.data.company_name + "</strong></p></div>")
                                    } else {
                                        sessionStorage.setItem('dask_police', 0);
                                        $(".police_bildirim_alert").html('');

                                        console.log("Mevcut bir dask poliçesi bulunamamıştır.");
                                    }

                                });
                            $("#uavt_numarasi").removeClass("is-invalid");
                            $("#uavt_numarasi").addClass("is-valid");
                            $("#uavt_sonuc_ekrani").css('display', 'block');
                            $("#il_ad").val(uavt_data.ilAd);
                            $("#ilce_ad").val(uavt_data.ilceAd);
                            $("#koy_Ad").val(uavt_data.koyAd);
                            $("#mahalle_ad").val(uavt_data.mahalleAd);
                            $("#csbm_ad").val(uavt_data.csbmAd);
                            $("#bina_no").val(uavt_data.disKapiNo);
                            $("#deprem_bolge_kod").val(uavt_data.depremBolgeKod);
                            $("#bagimsiz_bolum_kod").val(uavt_data.bagimsizBolumKod);
                            $("#daire_no").val(uavt_data.icKapiNo);
                            $("#uavt_sonuc_bildirim").html("<br><div class='alert alert-success' role='alert'><p class='mb-0'>Uavt Numaranız Başarılı Bir Şekilde Bulunmuştur.</p></div>");

                            var bina_kod = uavt_data.binaKod;
                            var csbm_kod = uavt_data.csbmKod;
                            $.ajax({
                                type: "POST",
                                url: "../ortak/bina_no_listele",
                                dataType: "json",
                                data: {
                                    bina_kod: bina_kod, csbm_kod: csbm_kod
                                },
                                success: function (data_parsel_ada_pafta) {
                                    $("#unit_parsel").val(data_parsel_ada_pafta.bina.parsel);
                                    $("#unit_pafta").val(data_parsel_ada_pafta.bina.pafta);
                                    $("#unit_ada").val(data_parsel_ada_pafta.bina.ada);
                                }
                            });
                        });

                } else {
                    $(".police_bildirim_alert").html('');
                    $("#uavt_numarasi").removeClass("is-valid");
                    $("#uavt_numarasi").addClass("is-invalid");
                    $("#uavt_sonuc_ekrani").css('display', 'none');
                    $("#uavt_sonuc_bildirim").html("<br><div class='alert alert-danger' role='alert'><p class='mb-0'>" + response.message + ".</p></div>");

                }
            }
        });
    } else {
        $("#uavt_help").css("display", "block");
    }
});

// Uavt Kod Bulma Bitiş
function goBack() {
    window.history.back();
}
