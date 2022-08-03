<?php
require('../layout/header/index.php');
require('../layout/navbar/index.php')
?>


<main id="main" class="p-4">

    <!-- <div id="TabPaneCuaca1" class="tab-pane">
        <div class="cuaca-flex row no-space-carousel-block">

            <div class="cuaca-flex-child">
                <div class="carousel-block-table prakicu-kota bg-cuaca cerah-berawan-malam">
                    <div class="service-block clearfix">
                        <h2 class="kota">22:00&nbsp;WIB</h2>
                        <div class="kiri">
                            <img src="https://bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" alt=""
                                class="loading">
                            <p>Cerah Berawan</p>
                        </div>
                        <div class="kanan">
                            <h2 class="heading-md">23°C</h2>
                            <p><i class="wi wi-raindrop"></i>80 %</p>
                            <p><i class="wi wi-strong-wind"></i>10&nbsp;km/jam<br>Timur <i
                                    class="wi wi-wind wi-from-e"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="owl-carousel" id="prakicu">

    </div>


</main>



<?php
require('../layout/footer/index.php');
require('../layout/js/assets.php');
require('../layout/js/js.php');
?>
<script>
var weathericon = {
    '100': 'Cerah',
    '101': 'Cerah Berawan',
    '102': 'Cerah Berawan',
    '103': 'Berawan',
    '104': 'Berawan Tebal',
    '0': 'Cerah',
    '1': 'Cerah Berawan',
    '2': 'Cerah Berawan',
    '3': 'Berawan',
    '4': 'Berawan Tebal',
    '5': 'Udara Kabur',
    '10': 'Asap',
    '45': 'Kabut',
    '60': 'Hujan Ringan',
    '61': 'Hujan Sedang',
    '63': 'Hujan Lebat',
    '80': 'Hujan Lokal',
    '95': 'Hujan Petir',
    '97': 'Hujan Petir'
};

$.ajax({
    url: `https://juanda.jatim.bmkg.go.id/flask/api/ndf/req?idkec=501282`,
    type: 'GET',
    dataType: 'json',
    crossDomain: true,
    success: function(response) {

        let data = [response.slice(0, 8), response.slice(8, 16), response.slice(16, 24), response.slice(24,
            28), response.slice(28, 32), response.slice(32, 36), response.slice(36, 40)]
        var now = new Date;
        var ampm = 'pm';
        var html = ''

        dataAllTime = data
        data[0].forEach(element => {
            let ampm = moment(element.time).add(7, 'hours').format('A').toLowerCase()
            html += `
                        <div class="info3 item col-width-full id-${element.time}" style="margin:5px;">
                            <div class="carousel-block-table prakicu-kota bg-cuaca ${weathericon[element.weather].toLowerCase().replace(' ', '-')}-${ampm == 'pm' ? 'malam' : 'siang'} " style='margin:auto;'>
                                <div class="service-block clearfix">
                                    <div class="kiri">
                                        <img style="width:120px; " src="http://localhost/bmkgjuanda/assets/img/icon-cuaca/${weathericon[element.weather].toLowerCase()}-${ampm}.png" alt="${weathericon[element.weather].toLowerCase()}">
                                        <p>${weathericon[element.weather].toLowerCase()}</p>
                                    </div>
                                    <div class="kanan">
                                            <h2 class="heading-md">${element.temp}&deg;C</h2>
                                            <p><i class="wi wi-direction-down"></i>${element.tmin}&deg;C<i class="wi wi-direction-up"></i>${element.tmax}&deg;C</p>
                                            <p><i class="wi wi-raindrop"></i>${element.hu}%</p>
                                            <p><i class="wi wi-strong-wind"></i>${element.ws}km/jam
                                            <br>
                                            ${element.wd}<i class="wi wi-wind wi-from-${element.wd.toLowerCase()}"></i>
                                            </p>
                                    </div>
                                    <p>${moment(element.time).add(7, 'hours').format('hh:mm a')}</p>
                                    </div>
                            </div>
                        </div>
                        `
        })
        $("#prakicu").html(html);

        $("#prakicu").owlCarousel({
            autoplay: true,
            rewind: true /* use rewind if you don't want loop */ ,
            margin: 20,
            items: 1,
            responsiveClass: true,
            autoHeight: true,
            autoplayTimeout: 4000,
            smartSpeed: 800,

        });


    }
})
</script>