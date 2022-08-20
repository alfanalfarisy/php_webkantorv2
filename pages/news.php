<?php
require('../layout/header.php');
require('../layout/navbar.php')
?>


<main id="main" class="p-4">

    <div class="col-md-4 col-xs-12 md-margin-bottom-10">

        <div class="headline">
            <h4>Gempabumi Terkini</h4>
        </div>
        <div class="gempabumi-home-bg margin-top-13">
            <div class="row">
                <div class="col-md-6  col-6">
                    <a href="https://ews.bmkg.go.id/tews/data/20220805004315.mmi.jpg" class="fancybox img-hover-v1"
                        rel="gallery1" title="Gempabumi Terkini">
                        <img class="img-fluid" src="https://ews.bmkg.go.id/tews/data/20220805004315.mmi.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-6  col-6 gempabumi-detail no-padding">
                    <ul class="list-unstyled">
                        <li><span class="waktu">05 Agustus 2022, 00:39:33 WIB</span></li>
                        <li><span class="ic magnitude"></span>5.2</li>
                        <li><span class="ic kedalaman"></span>37 km</li>
                        <li><span class="ic koordinat"></span>1.10 LS - 97.27 BT</li>
                        <li><span class="ic lokasi"></span>195 km BaratDaya NIASSELATAN-SUMUT</li>
                        <li><span class="ic tsunami"></span>tidak berpotensi TSUNAMI</li>
                        <li><a class="more" href="gempabumi-terkini.html">Selengkapnya →</a></li>
                    </ul>
                </div>
            </div>
            <ul class=" ml-3list-unstyled gempabumi-detail no-bot">
                <li><span class="ic lokasi"></span>195 km BaratDaya NIASSELATAN-SUMUT</li>
                <li><span class="ic tsunami"></span>tidak berpotensi TSUNAMI</li>
                <a class="more" href="gempabumi-terkini.html">Selengkapnya →</a>
            </ul>
        </div>
    </div>
</main>



<?php
require('../layout/footer.php');
require('../layout/libraryJs.php');

?>
<script>

</script>