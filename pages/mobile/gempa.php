<?php
require('../../layout/header.php');
?>

<div class="col-lg-4">
    <div class="headline">
        <h4>Gempabumi Terkini</h4>
    </div>
    <div class="card-gempa">
        <div class="row">
            <div class="col-md-6 col-6">
                <span id="img-location-gempa"></span>
            </div>
            <div class="col-md-6 col-6 gempabumi-detail no-padding">
                <ul class="list-unstyled">
                    <li><span class="waktu"><span id="Tanggal"></span>, <span id="Jam"></span></span>
                    </li>
                    <li><span class="ic magnitude"></span><b><span id="Magnitude"></span></b></li>
                    <li><span class="ic kedalaman"></span><b><span id="Kedalaman"></span></b></li>
                    <li><span class="ic koordinat"></span><b><span id="Lintang"></span></b> - <b><span id="Bujur"></span></b></li>
                    <li><span class="ic lokasi"></span><span id="Wilayah"></span></li>
                    <li><span class="ic tsunami"></span><span id="Potensi"></span></li>

                </ul>
            </div>
        </div>
        <ul class="ml-3list-unstyled gempabumi-detail no-bot">
            <li><span class="ic lokasi"></span><span id="Wilayah1"></span></li>
            <li><span class="ic tsunami"></span><span id="Potensi1"></span></li>

        </ul>

    </div>
</div>

<script>
    let dataFind = [
        "Tanggal",
        "Jam",
        "DateTime",
        "Lintang",
        "Bujur",
        "Magnitude",
        "Kedalaman",
        "Wilayah",
        "Dirasakan",
        "Potensi",
        "Shakemap",
        "Coordinates",
    ];

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "https://juanda.jatim.bmkg.go.id/flask/api/gempa/terkini",
            crossDomain: true,
            dataType: "JSON",
            headers: {
                accept: "application/json",
                "Access-Control-Allow-Origin": "*",
            },
            success: (results) => {
                $("#img-location-gempa").html(
                    ` <a id="link-img-gempa" href="https://ews.bmkg.go.id/tews/data/${results.Infogempa.gempa.Shakemap}" class="fancybox img-hover-v1" rel="gallery1" title="Gempabumi Terkini">
        <img class="img-fluid" id="img-gempa" src="https://ews.bmkg.go.id/tews/data/${results.Infogempa.gempa.Shakemap}" alt="">
    </a>`
                );

                dataFind.forEach((item) => {
                    $(`#${item}`).html(results.Infogempa.gempa[item]);
                    if (item == "Potensi") {
                        $(`#Potensi1`).html(results.Infogempa.gempa[item]);
                    }
                    if (item == "Wilayah") {
                        $(`#Wilayah1`).html(results.Infogempa.gempa[item]);
                    }
                });
            },
        });
    });
</script>