// YSS JS
// Genel Sayfa yüklendiğinde çalışacak komutlar
$(document).ready(function () {
    // Unsur Arama Kısmı Kimlik Tipi , Kimlik No , Email , Telefon
    $(".unsur_sorgula").on("submit", function (event) { 
        event.preventDefault();
        Swal.fire({
            title: 'Lütfen bekleyiniz...',
            type: 'warning',
            text: 'Kullanıcı aranıyor lütfen bekleyiniz....',
            allowOutsideClick: false,
            onBeforeOpen: function () {
                Swal.showLoading()
            },
        });

        var unsur = {
            "sigortali": {
                kimlik_tipi: $("#sigortali_kimlik_tipi option:selected").val(),
                kimlik_no: $("#sigortali_kimlik_no").val(),
                email: $("#sigortali_mail").val(),
                tel: $("#sigortali_tel").val(),
                sigorta_tipi: "sigortali",//Sigortali mı sigorta ettirenin mi bilgileri gönderiliyor durumunun tespit edilmesi için
                sigorta_durum: 1,
            },
            "sigorta_ettiren": null

        };

        if ($('#sigorta_ettiren_farkli').is(':checked')) {
            unsur.sigorta_ettiren = {
                kimlik_tipi: $("#sigorta_ettiren_kimlik_tipi option:selected").val(),
                kimlik_no: $("#sigorta_ettiren_kimlik_no").val(),
                email: $("#sigorta_ettiren_mail").val(),
                tel: $("#sigorta_ettiren_tel").val(),
                sigorta_tipi: "sigorta_ettiren",//Sigortali mı sigorta ettirenin mi bilgileri gönderiliyor durumunun tespit edilmesi için
                sigorta_durum: 2,// Sigorta ettiren var mı yok mu durumunun kontrolü için
            };
        }


        const keyUns = Object.keys(unsur);
        if (unsur.sigorta_ettiren !== null) {
            for (let i = 0; i < keyUns.length; i++) {
                search_async(unsur[keyUns[i]].kimlik_tipi, unsur[keyUns[i]].kimlik_no, unsur[keyUns[i]].sigorta_tipi, unsur[keyUns[i]].sigorta_durum, unsur[keyUns[i]].email, unsur[keyUns[i]].tel).then(function (response_search) {
                    // Search Entity
                    if (response_search.result == 1) {
                        entity_async(response_search.unit_no, unsur[keyUns[i]].kimlik_tipi, unsur[keyUns[i]].sigorta_tipi, unsur[keyUns[i]].sigorta_durum, unsur[keyUns[i]].email, unsur[keyUns[i]].tel).then(function (response_entity) {
                            // Entity Detail
                            if (response_entity.result == 1) {
                                if (unsur[keyUns[i]].sigorta_tipi !== "sigortali") {
                                    window.location.href = '../Candostum/sorular';
                                }
                            } else {
                                Swal.fire('Hata', sonuc_entity.message, 'error');
                                return false;
                            }
                        }).catch(e => {
                            console.log(e);
                        });
                        ;
                    } else if (response_search.result == 0) {
                        // Save Entity
                        save_asycn(unsur[keyUns[i]].kimlik_no, unsur[keyUns[i]].kimlik_tipi, unsur[keyUns[i]].sigorta_tipi, unsur[keyUns[i]].sigorta_durum, unsur[keyUns[i]].email, unsur[keyUns[i]].tel).then(function (response_save) {
                            if (response_save.result == 1) {
                                if (unsur[keyUns[i]].sigorta_tipi != "sigortali") {
                                    window.location.href = '../Candostum/sorular';
                                }
                            } else if (response_save.result == 2) {
                                Swal.fire('Hata', response_save.message, 'error');
                                return false;
                            } else {
                                Swal.fire('Hata', response_save.message, 'error');
                                return false;
                            }
                        });
                    } else {
                        if (unsur[keyUns[i]].sigorta_durum !== 0) {
                            Swal.fire('Hata', response_search.message, 'error');
                            return false;
                        }
                    }
                });
            }
        } else {
            search_async(unsur[keyUns[0]].kimlik_tipi, unsur[keyUns[0]].kimlik_no, unsur[keyUns[0]].sigorta_tipi, unsur[keyUns[0]].sigorta_durum, unsur[keyUns[0]].email, unsur[keyUns[0]].tel).then(function (response_search) {
                // Search Entity
                if (response_search.result == 1) {
                    entity_async(response_search.unit_no, unsur[keyUns[0]].kimlik_tipi, unsur[keyUns[0]].sigorta_tipi, unsur[keyUns[0]].sigorta_durum, unsur[keyUns[0]].email, unsur[keyUns[0]].tel).then(function (response_entity) {
                        // Entity Detail
                        if (response_entity.result == 1) {
                            window.location.href = '../Candostum/sorular';
                        } else {
                            Swal.fire('Hata', sonuc_entity.message, 'error');
                            return false;
                        }
                    }).catch(e => {
                        console.log(e);
                    });
                    ;
                } else if (response_search.result == 0) {
                    // Save Entity
                    save_asycn(unsur[keyUns[0]].kimlik_no, unsur[keyUns[0]].kimlik_tipi, unsur[keyUns[0]].sigorta_tipi, unsur[keyUns[0]].sigorta_durum, unsur[keyUns[0]].email, unsur[keyUns[0]].tel).then(function (response_save) {
                        if (response_save.result == 1) {
                            window.location.href = '../Candostum/sorular';
                        } else if (response_save.result == 2) {
                            Swal.fire('Hata', response_save.message, 'error');
                            return false;
                        } else {
                            Swal.fire('Hata', response_save.message, 'error');
                            return false;
                        }
                    });
                } else {
                    if (unsur[keyUns[0]].sigorta_durum !== 0) {
                        Swal.fire('Hata', response_search.message, 'error');
                        return false;
                    }
                }
            });
        }
    });
    /* */
// Teklif Oluşturma - Create Proposal Başlangıç

    $("#create_prosal_form").on("submit", function (e) {


        var paket_tipi = $(".paket_tipi").val();
        e.preventDefault();
        Swal.fire({
            title: 'Emin misiniz?',
            text: 'Teklifiniz oluşturalacaktır, onaylıyor musunuz?',
            type: 'question',
            showCancelButton: true,
            cancelButtonText: 'Vazgeç',
            //allowOutsideClick: false,
            confirmButtonColor: '#28c76f',
            cancelButtonColor: '#ea5455',
            confirmButtonText: 'Teklif oluştur'
        }).then(function(result) {
            if (result.value) {

                Swal.fire(
                    {
                        title: 'Lütfen bekleyiniz...',
                        type: 'warning',
                        text: 'İşlem gerçekleştiriliyor.',
                        onBeforeOpen: function () {
                            Swal.showLoading()
                        },
                    })
                var data = $('.create_prosal_form').serializeArray();
                data.push({
                    name: 'beg_date',
                    value: $("#beg_date").val(),
                });
                // Create Proposal
                $.ajax({
                    type: "POST",
                    url: "../Candostum/create_proposal",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        swal.close();
                        if (response.result == 1) {
                            window.location.href = '../Candostum/odeme_ekrani';
                        } else {

                            Swal.fire(
                                'Uyarı',
                                response.message,
                                'error'
                            );


                        }
                    }
                });
                // Create Proposal Gerçekleşme Ajax Bitiş

            }
        });
    });

// Teklif Oluşturma - Create Proposal Bitiş

// Teklif Düzenleme - Edit Proposal Ajax Başlangıç
    $("#edit_prosal_form").on("submit", function (e) {

        e.preventDefault();

        Swal.fire(
            {
                title: 'Emin misiniz?',
                text: 'Teklifiniz düzenlenecektir,onaylıyor musunuz?',
                type: 'question',
                showCancelButton: true,
                //allowOutsideClick: false,
                confirmButtonColor: '#29C76F',
                cancelButtonColor: '#FF0101',
                confirmButtonText: 'Teklif düzenle',
                cancelButtonText: "Vazgeç",
            }).then(function(result) {
            if (result.value) {

                Swal.fire(
                    {
                        title: 'Lütfen bekleyiniz...',
                        type: 'warning',
                        text: 'İşlem gerçekleştiriliyor.',
                        onBeforeOpen: function () {
                            Swal.showLoading()
                        },
                    })
                var data = $('.edit_prosal_form').serializeArray();
                data.push({
                    name: 'beg_date',
                    value: $("#beg_date").val(),
                });
                // Create Proposal Gerçekleşme Ajax
                $.ajax({
                    type: "POST",
                    url: "../Candostum/edit_proposal",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        swal.close();
                        if (response.result == 1) {
                            window.location.href = '../Candostum/odeme_ekrani';
                        } else {

                            Swal.fire(
                                'Uyarı',
                                response.message,
                                'error'
                            );


                        }
                    }
                });


            }
        });
    });


    $(".cins").change(function(){
        $.ajax({
            type: "POST",
            url: "../Candostum/irk",
            data: {'irk' : this.value},
            success: function (response) {
                $('option', this).remove();
                $(".irk").find('option').remove();
                $(".irk").append("<option selected value=''>Irk seçiniz.</option>");
                $(".irk").append(response);
            }
        });
    });

    $(".irk").change(function(){
        console.log(this.value);
        if(this.value == 999){
            $(".diger_irk").css("display","block");
        }else{
            $(".diger_irk").css("display","none");
        }
    });


// Teklif Düzenleme - Edit Proposal Ajax Bitiş


});