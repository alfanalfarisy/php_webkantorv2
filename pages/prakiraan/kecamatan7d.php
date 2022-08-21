<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">

    <section class="">
        <div class="card p-4 box-shadow">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md form-floating mb-3">
                        <select name="selectKab" id="selectKab" aria-label="Floating label select example" class="form-select col-md" onchange="kabupatenSelected()">
                            <option value="501272">Bangkalan</option>
                            <option value="501273">Banyuwangi</option>
                            <option value="501274">Kota Batu</option>
                            <option value="501275">Kota Blitar</option>
                            <option value="501277">Bojonegoro</option>
                            <option value="501278">Bondowoso</option>
                            <option value="501279">Gresik</option>
                            <option value="501280">Jember</option>
                            <option value="501281">Jombang</option>
                            <option value="501282">Kota Kediri</option>
                            <option value="501284">Malang</option>
                            <option value="501285">Lamongan</option>
                            <option value="501286">Lumajang</option>
                            <option value="501287">Kota Madiun</option>
                            <option value="501288">Madiun</option>
                            <option value="501289">Magetan</option>
                            <option value="501290">Kota Malang</option>
                            <option value="501291">Kota Mojokerto</option>
                            <option value="501293">Nganjuk</option>
                            <option value="501294">Ngawi</option>
                            <option value="501295">Pacitan</option>
                            <option value="501296">Pamekasan</option>
                            <option value="501297">Kota Pasuruan</option>
                            <option value="501299">Ponorogo</option>
                            <option value="501300">Kota Probolinggo</option>
                            <option value="501302">Sampang</option>
                            <option value="501303">Sidoarjo</option>
                            <option value="501304">Situbondo</option>
                            <option value="501305">Sumenep</option>
                            <option value="501306">Surabaya</option>
                            <option value="501308">Tuban</option>
                            <option value="5002268">Kediri</option>
                            <option value="501307">Trenggalek</option>
                            <option value="5002271">Blitar</option>
                            <option value="5002272">Pasuruan</option>
                            <option value="5002270">Probolinggo</option>
                            <option value="5002269">Mojokerto</option>
                            <option value="501309">Tulungagung</option>
                        </select>
                        <label for="selectKab" style="margin-left:4px; font-size: 14px;">Choose Kabupaten</label>
                    </div>
                    <div class="col-md form-floating">
                        <select name="selectKec" id="selectKec" aria-label="Floating label select example" class="form-select col-md" onchange="kecamatanSelected()"></select>
                        <label for="selectKec" style="margin-left:4px; font-size: 14px;">Choose Kecamatan</label>
                    </div>
                    <div class="col-md form-floating">
                        <select name="selectDate" id="selectDate" class="form-select col-md" onchange="dateSelected()"></select>
                        <label for="selectDate" style="margin-left:4px; font-size: 14px;">Choose Date</label>
                    </div>
                </div>

                <div class="card" style="max-width: 100%;">
                    <div class="card-header d-flex justify-content-center">
                        <h5 id="inputSelectedKecamatan">Choose Kecamatan</h5>
                    </div>
                    <div class="card-body" style="overflow: auto;">
                        <div id="prakicuWrapper" class="d-flex justify-content-center">
                            <div id="prakicu" class="owl-carousel"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<?php require('../../layout/footer.php') ?>



<?php

require('../../layout/libraryJs.php');

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

    let dataAllTime = []
    let selectedKecName = []

    function loadall() {

        $.ajax({
            url: "https://juanda.jatim.bmkg.go.id/node/api/constants/listNamaKabupaten",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $("#selectKab").attr('disabled', false);
                $.each(response, function(key, value) {
                    $("#selectKab").append('<option value=' + value.idkab + '>' + value.namakab + '</option>');
                });
            }
        });

    }

    function kabupatenSelected() {

        const selectedKab = $('#selectKab option:selected').val()
        console.log(selectedKab)
        $.ajax({
            url: `https://juanda.jatim.bmkg.go.id/node/api/constants/listNamaKecamatanIdKab/${selectedKab}`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $("#selectKec").attr('disabled', false);
                $("#selectKec").empty()
                $.each(response, function(key, value) {
                    console.log('ok')
                    $("#selectKec").append('<option value=' + value.idkec + '>' + value.namakec + '</option>')
                });
            }
        });
    }

    function kecamatanSelected() {
        const selectedKec = $('#selectKec option:selected').val()
        selectedKecName = $("#selectKec option:selected").text()
        $('#prakicu').remove()
        $("#prakicuWrapper").append('<div id="prakicu" class="owl-carousel"></div>')
        $("#inputSelectedKecamatan").html(selectedKecName)
        $("#prakicu").append('<p id="loading">LOADING...</p>');
        $.ajax({
            url: `https://juanda.jatim.bmkg.go.id/flask/api/ndf/req?idkec=${selectedKec}`,
            type: 'GET',
            dataType: 'json',
            crossDomain: true,
            success: function(response) {
                $("#selectKec").attr('disabled', false);
                $("#selectDate").empty()
                let data = [response.slice(0, 8), response.slice(8, 16), response.slice(16, 24), response.slice(24, 28), response.slice(28, 32), response.slice(32, 36), response.slice(36, 40)]
                var now = new Date;
                var ampm = 'pm';
                var allkota = [];
                data.forEach(element => {
                    let date = moment(element[0].time).add(7, 'hours').format('MM/DD/YYYY')
                    $("#selectDate").append('<option value=' + date + '>' + date + '</option>')
                })
                dataAllTime = data
                data[0].forEach(element => {
                    let ampm = moment(element.time).add(7, 'hours').format('A').toLowerCase()
                    allkota.push(`<div class="item id-${element.time}" >
                                     <div class="bg-cuaca ${weathericon[element.weather].toLowerCase().replace(" ", "-")}-${ampm == "pm" ? "malam" : "siang"} " style="padding:10px; ">
                                        <div class="" >
                                            <div class="" style="display: flex; flex-direction:column;align-items: center;">
                                                <img style="width:60px; " src="http://localhost/bmkgjuanda/assets/img/icon-cuaca/${weathericon[element.weather].toLowerCase()}-${ampm}.png" alt="${weathericon[element.weather].toLowerCase()}">
                                                <p  class="text-center" style="height:50px" >${weathericon[element.weather].toLowerCase()}</p>
                                                <p class="text-center">${moment(element.time).add(7, "hours").format("hh:mm a")}</p>
                                            </div>
                                            <div class="" style="text-align:center;">
                                                    <h2 class="">${element.temp}&deg;</h2>
                                                    <p><i class="wi wi-direction-down"></i>${element.tmin}&deg;C<i class="wi wi-direction-up"></i>${element.tmax}&deg;C</p>
                                                    <p><i class="wi wi-raindrop"></i>${element.hu}%</p>
                                                    <p><i class="wi wi-strong-wind"></i>${element.ws}km/jam
                                                    <br>
                                                    ${element.wd}<i class="wi wi-wind wi-from-${element.wd.toLowerCase()}"></i>
                                                    </p>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                                
              `);
                })

                $('#loading').remove()
                $("#prakicu").append(allkota.join(''));
                jQuery(document).ready(() => {
                    var a = jQuery(".owl-carousel");
                    a.owlCarousel({
                        items: [5],
                        itemsDesktop: [1200, 5],
                        itemsDesktopSmall: [992, 2],
                        itemsTablet: [600, 4],
                        itemsMobile: [479, 1],
                        autoPlay: 5e3,
                        pagination: false,

                    }), jQuery(".next-pk").click(() => {
                        a.trigger("owl.next")
                    }), jQuery(".prev-pk").click(() => {
                        a.trigger("owl.prev")
                    })
                })

            }

        });
    }

    function dateSelected() {
        const selectedDate = $("#selectDate option:selected").text()
        $('#prakicu').remove()
        $("#prakicuWrapper").append('<div id="prakicu" class="owl-carousel"></div>')
        $("#prakicu").append('<p id="loading">LOADING...</p>');
        let allkota = []
        dataAllTime.forEach(element => {
            console.log(moment(element[0].time).add(7, 'hours').format('MM/DD/YYYY'))
            console.log(selectedDate)
            if (moment(element[0].time).add(7, 'hours').format('MM/DD/YYYY') == selectedDate) {
                element.forEach(element => {
                    let ampm = moment(element.time).add(7, 'hours').format('A').toLowerCase()
                    allkota.push(`<div class="item id-${element.time}" >
                                     <div class="bg-cuaca ${weathericon[element.weather].toLowerCase().replace(" ", "-")}-${ampm == "pm" ? "malam" : "siang"} " style="padding:10px; ">
                                        <div class="" >
                                            <div class="" style="display: flex; flex-direction:column;align-items: center;">
                                                <img style="width:60px; " src="http://localhost/bmkgjuanda/assets/img/icon-cuaca/${weathericon[element.weather].toLowerCase()}-${ampm}.png" alt="${weathericon[element.weather].toLowerCase()}">
                                                <p  class="text-center" style="height:50px" >${weathericon[element.weather].toLowerCase()}</p>
                                                <p class="text-center">${moment(element.time).add(7, "hours").format("hh:mm a")}</p>
                                            </div>
                                            <div class="" style="text-align:center;">
                                                    <h2 class="">${element.temp}&deg;</h2>
                                                    <p><i class="wi wi-direction-down"></i>${element.tmin}&deg;C<i class="wi wi-direction-up"></i>${element.tmax}&deg;C</p>
                                                    <p><i class="wi wi-raindrop"></i>${element.hu}%</p>
                                                    <p><i class="wi wi-strong-wind"></i>${element.ws}km/jam
                                                    <br>
                                                    ${element.wd}<i class="wi wi-wind wi-from-${element.wd.toLowerCase()}"></i>
                                                    </p>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                                
              `);
                })
            }
        })

        $('#loading').remove()
        $("#prakicu").append(allkota.join(''));
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
    }

    $(function() {
        $(document).ready(function() {
            loadall();
        });
    });
</script>