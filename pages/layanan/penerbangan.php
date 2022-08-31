<?php require('../../layout/header.php') ?>
<?php require('../../layout/navbar.php') ?>
<style>

</style>




<main id="main">
    <section>
        <div class="container">
            <div class="card p-4 box-shadow">

                <div id="mapRain" style="height: 100vh; z-index:1"></div>






            </div>
        </div>
    </section>
</main>



<?php require('../../layout/footer.php') ?>
<?php require('../../layout/libraryJs.php'); ?>

<script>
    var map = L.map('mapRain').setView([-7.7043771, 112.7221155], 8);
    var imageBounds = [
        [-5.247572, 110.593051],
        [-9.563244, 114.948288]
    ];
    var image = null;
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> | © <a href="http://infocuaca.id">BMKG Surabaya</a>',
        id: 'mapbox.streets'
    }).addTo(map);

    var planeIcon = L.icon({
        iconUrl: 'https://juanda.jatim.bmkg.go.id/webkantor/img/markairport.png',

        iconSize: [60, 80],
        iconAnchor: [30, 80],
    });
    $(function() {
        $(document).ready(function() {
            $.ajax({
                url: "https://juanda.jatim.bmkg.go.id/webkantor/data/aviation.json",
                dataType: "JSON",
                type: "GET",
                success: function(result) {
                    var report = result.report;
                    for (i = 0; i < report.length; i++) {
                        var popup = '<strong>' + report[i].icao_id + ' ' + report[i].station_name + '</strong><br>' + report[i].observed_time + ' ' + report[i].time_zone + '<br><img src="img/symbols/' + report[i].symbol + '.png"><br><strong>Cuaca : ' + report[i].weather + '</strong><br><br><strong>Angin</strong><br>Arah : ' + report[i].wind_direction + '<br>Kecepatan : ' + report[i].wind_speed + '<br><strong>Jarak penglihatan</strong> : ' + report[i].visibility + '<br><strong>Suhu</strong> : ' + report[i].temp + '<br><strong>Titik Embun</strong> : ' + report[i].dew_point + '<br><strong>Tekanan</strong> : ' + report[i].pressure;
                        L.marker([report[i].latitude, report[i].longitude], {
                            icon: planeIcon
                        }).addTo(map).bindPopup(popup);
                    }
                }
            });

        });
    });
</script>