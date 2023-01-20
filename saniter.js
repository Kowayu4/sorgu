
function clearData() {
    document.getElementById("datas").value = '';
}

function checkPlease() {
    var datas = $("#datas").val();
    if (datas != '') {
        control();

        function control() {
            $("#baslatButon").attr("disabled", true);
            $("#durdurButon").attr("disabled", false);
            $("#temizleButon").attr("disabled", true);
            boslarisil();
            document.getElementById('datas').disabled = true;
            var datas = document.getElementById("datas").value;
            var array = datas.split("\n");
            inputLine();
            var ccdat = array[0];
            if (array.length !== 0 && ccdat !== "") {
                sendData(ccdat);
                delete array[0];
            } else {
                $("#baslatButon").attr("disabled", false);
                $("#durdurButon").attr("disabled", false);
                $("#temizleButon").attr("disabled", false);
                document.getElementById('datas').disabled = false;
                satirsil();
                delete array[0];
            }

            function sendData(data) {
                $.ajax({
                    type: "POST",
                    url: "/admin/static/saniter.php",
                    dataType: "JSON",
                    data: {
                        datachecker: data
                    },
                    success: function(response) {

                        if (response.status == "true") {
                            insertLive(html(gelen_cevap));
                            countLive++;
                        } else {
                            insertLive(html(gelen_cevap));
                            countLive++;
                        }
                        satirsil();
                        control();
                        $("#countLive").html(countLive);
                        $("#countDec").html(countDec);
                    },
                    error: function(response) {

                        insertDec(response.data);
                        countDec++;
                        satirsil();
                        control();
                        $("#countLive").html(countLive);
                        $("#countDec").html(countDec);

                    }
                });
            }

            function unique(array) {
                return array.filter(function(el, index, arr) {
                    return index == arr.indexOf(el);
                });
            }

            function boslarisil() {
                var array = $("#datas").val().split('\n');
                array = unique(array);
                for (i = 0; i < array.length; i++) {
                    array[i] = array[i].trim();
                    array[i] = array[i].replace('   ', '');
                    if (array[i].length === 0) {
                        array.splice(i, 1);
                    }

                }

                $("#datas").val(array.join("\n"));
            }

            function satirsil() {
                var lines = $("#datas").val().split('\n');
                lines.splice(0, 1);
                $("#datas").val(lines.join("\n"));
            }

            function insertLive(str) {
                $(".live").append(str + "<br>");
            }

            function insertDec(str) {
                $(".dec").append(str + "<br>");
            }
        }
    }

}