<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>

<style>
    .icon-prov {
        background-repeat: no-repeat;
        background-size: 20px auto;
        padding-left: 35px;
        font-size: 18px;
        background-position: center left;
        position: relative;
    }

    .icon-prov.prov-01 {
        background-image: url(/home/assets/img/icon-prov/aceh.png);
    }

    .icon-prov.prov-02 {
        background-image: url(/home/assets/img/icon-prov/bali.png);
    }

    .icon-prov.prov-03 {
        background-image: url(/home/assets/img/icon-prov/kepulauan-bangka-belitung.png);
    }

    .icon-prov.prov-04 {
        background-image: url(/home/assets/img/icon-prov/banten.png);
    }

    .icon-prov.prov-05 {
        background-image: url(/home/assets/img/icon-prov/bengkulu.png);
    }

    .icon-prov.prov-06 {
        background-image: url(/home/assets/img/icon-prov/di-yogyakarta.png);
    }

    .icon-prov.prov-07 {
        background-image: url(/home/assets/img/icon-prov/dki-jakarta.png);
    }

    .icon-prov.prov-08 {
        background-image: url(/home/assets/img/icon-prov/gorontalo.png);
    }

    .icon-prov.prov-09 {
        background-image: url(/home/assets/img/icon-prov/jambi.png);
    }

    .icon-prov.prov-10 {
        background-image: url(/home/assets/img/icon-prov/jawa-barat.png);
    }

    .icon-prov.prov-11 {
        background-image: url(/home/assets/img/icon-prov/jawa-tengah.png);
    }

    .icon-prov.prov-12 {
        background-image: url(/home/assets/img/icon-prov/jawa-timur.png);
    }

    .icon-prov.prov-13 {
        background-image: url(/home/assets/img/icon-prov/kalimantan-barat.png);
    }

    .icon-prov.prov-14 {
        background-image: url(/home/assets/img/icon-prov/kalimantan-selatan.png);
    }

    .icon-prov.prov-15 {
        background-image: url(/home/assets/img/icon-prov/kalimantan-tengah.png);
    }

    .icon-prov.prov-16 {
        background-image: url(/home/assets/img/icon-prov/kalimantan-timur.png);
    }

    .icon-prov.prov-17 {
        background-image: url(/home/assets/img/icon-prov/kalimantan-utara.png);
    }

    .icon-prov.prov-18 {
        background-image: url(/home/assets/img/icon-prov/kepulauan-riau.png);
    }

    .icon-prov.prov-19 {
        background-image: url(/home/assets/img/icon-prov/lampung.png);
    }

    .icon-prov.prov-20 {
        background-image: url(/home/assets/img/icon-prov/maluku.png);
    }

    .icon-prov.prov-21 {
        background-image: url(/home/assets/img/icon-prov/maluku-utara.png);
    }

    .icon-prov.prov-22 {
        background-image: url(/home/assets/img/icon-prov/nusa-tenggara-barat.png);
    }

    .icon-prov.prov-23 {
        background-image: url(/home/assets/img/icon-prov/nusa-tenggara-timur.png);
    }

    .icon-prov.prov-24 {
        background-image: url(/home/assets/img/icon-prov/papua.png);
    }

    .icon-prov.prov-25 {
        background-image: url(/home/assets/img/icon-prov/papua-barat.png);
    }

    .icon-prov.prov-26 {
        background-image: url(/home/assets/img/icon-prov/riau.png);
    }

    .icon-prov.prov-27 {
        background-image: url(/home/assets/img/icon-prov/sulawesi-barat.png);
    }

    .icon-prov.prov-28 {
        background-image: url(/home/assets/img/icon-prov/sulawesi-selatan.png);
    }

    .icon-prov.prov-29 {
        background-image: url(/home/assets/img/icon-prov/sulawesi-tengah.png);
    }

    .icon-prov.prov-30 {
        background-image: url(/home/assets/img/icon-prov/sulawesi-tenggara.png);
    }

    .icon-prov.prov-31 {
        background-image: url(/home/assets/img/icon-prov/sulawesi-utara.png);
    }

    .icon-prov.prov-32 {
        background-image: url(/home/assets/img/icon-prov/sumatera-barat.png);
    }

    .icon-prov.prov-33 {
        background-image: url(/home/assets/img/icon-prov/sumatera-selatan.png);
    }

    .icon-prov.prov-34 {
        background-image: url(/home/assets/img/icon-prov/sumatera-utara.png);
    }

    .icon-prov.prov-35 {
        background-image: url(/home/assets/img/icon-prov/ibukota-indonesia.png);
    }
</style>


<main id="main">
    <section class="container">
        <div class="card p-4 box-shadow">
            <div class="prakicu-kabkota tab-v1">
                <h2 id="jdl" class="text-center">INFORMASI</h2>
                <div class="prakicu-kabkota tab-v1">
                    <h2 id="jdl" class="text-center">Prakiraan Cuaca Esok Hari</h2>

                    <img class="d-block mx-auto" id="img_prakicu">



                    <div class="headline">
                        <h4>Pilih Kabupaten</h4>
                    </div>
                    <div id="listkab" class="row list-cuaca-provinsi md-margin-bottom-10"></div>
                </div>
            </div>
    </section>


</main>
<?php require('../../layout/footer.php') ?>



<?php

require('../../layout/libraryJs.php');

?>

<script>
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    function load(id) {
        $.ajax({
            url: "https://juanda.jatim.bmkg.go.id/webkantor/prakicu/" + id + ".json",
            dataType: "JSON",
            type: "GET",
            success: function(result) {
                document.getElementById("jdl").innerHTML = result.namakab;
                $("#prakicu").html("");

                //document.getElementById("jdl2").innerHTML = "Prakiraan Cuaca Hari Ini "+result.namakab+" "+waktu;
                document.getElementById("img_prakicu").src = "https://juanda.jatim.bmkg.go.id/data/prakicu_img/" + result.prakicu;

            }
        });

        $.ajax({
            url: "https://juanda.jatim.bmkg.go.id/webkantor/data/kab.json",
            dataType: "JSON",
            type: "GET",
            success: function(result) {
                $("#listkab").html("");
                var listkab = [];
                for (i = 0; i < result.length; i++) {
                    listkab.push('<div class="col-sm-6 col-xs-8"><span class="icon-prov" style="background-image: url(https://juanda.jatim.bmkg.go.id/webkantor/img/logo-kabupaten/' + result[i].logo + ');"></span><a href="?id=' + result[i].idkab + '">' + result[i].namakab + '</a></div>');
                }
                $("#listkab").append(listkab.join(''));
            }
        });


    }

    $(function() {
        $(document).ready(function() {
            var id = getUrlParameter('id');
            //if(id === undefined) id="501306";
            load(id);
            //loadmap(id);
        });
    });
</script>