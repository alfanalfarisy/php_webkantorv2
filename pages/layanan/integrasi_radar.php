<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>

<style type="text/css">
    
.list-type5{
width:35%;
margin:0 auto;
}
.list-type5 ol {
list-style-type: none;
list-style-type: decimal !ie; /*IE 7- hack*/
margin: 0;
margin-left: 1em;
padding: 0;
counter-reset: li-counter;
}
.list-type5 ol li{
position: relative;
margin-bottom: 1.5em;
padding: 0.5em;
background-color: #F0D756;
padding-left: 58px;
}

.list-type5 a{
text-decoration:none;
color:black;
font-size:15px;
font-family: 'Raleway', sans-serif;
}

.list-type5 li:hover{
box-shadow:inset -1em 0 #6CD6CC;
-webkit-transition: box-shadow 0.5s; /* For Safari 3.1 to 6.0 */
transition: box-shadow 0.5s;
}

.list-type5 ol li:before {
position: absolute;
top: -0.3em;
left: -0.5em;
width: 1.8em;
height: 1.2em;
font-size: 2em;
line-height: 1.2;
font-weight: bold;
text-align: center;
color: white;
background-color: #6CD6CC;
transform: rotate(-20deg);
-ms-transform: rotate(-20deg);
-webkit-transform: rotate(-20deg);
z-index: 99;
overflow: hidden;
content: counter(li-counter);
counter-increment: li-counter;
}

@media screen and (max-width: 900px) {
    .list-type5{
    width:80%;
    margin:0 auto;
    }
}

</style>


<main id="main">
    <section>
        <div class="container">

            <div class="card p-4 box-shadow">

                <div class="card mb-4">
                    
                    <div class="card-header"><h4 class="text-center">INTEGRASI WOFI - RADAR CUACA DI INDONESIA</h4></div>    

                        <div class="card-body">                
                            <div class="list-type5">
                                <ol>
                                    <br>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-aceh">RADAR CUACA <b>ACEH</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-ambon">RADAR CUACA <b>AMBON</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-balikpapan">RADAR CUACA <b>BALIKPAPAN</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-banjarmasin">RADAR CUACA <b>BANJARMASIN</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-batam">RADAR CUACA <b>BATAM</b>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-bengkulu">RADAR CUACA <b>BENGKULU</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-biak">RADAR CUACA <b>BIAK</b>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-bima">RADAR CUACA <b>BIMA</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-denpasar">RADAR CUACA <b>DENPASAR</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-jambi">RADAR CUACA <b>JAMBI</b>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-jayapura">RADAR CUACA <b>JAYAPURA</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-kendari">RADAR CUACA <b>KENDARI</b>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-lampung">RADAR CUACA <b>LAMPUNG</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-lombok">RADAR CUACA <b>LOMBOK</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-majene">RADAR CUACA <b>MAJENE</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-makassar">RADAR CUACA <b>MAKASSAR</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-manado">RADAR CUACA <b>MANADO</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-maumere">RADAR CUACA <b>MAUMERE</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-merauke">RADAR CUACA <b>MERAUKE</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-nias">RADAR CUACA <b>NIAS</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-padang">RADAR CUACA <b>PADANG</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-palangkaraya">RADAR CUACA <b>PALANGKARAYA</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-palu">RADAR CUACA <b>PALU</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-pangkalanbun">RADAR CUACA <b>PANGKALANBUN</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-pangkalpinang">RADAR CUACA <b>PANGKALPINANG</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-pekanbaru">RADAR CUACA <b>PEKANBARU</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-pontianak">RADAR CUACA <b>PONTIANAK</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-semarang">RADAR CUACA <b>SEMARANG</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-sintang">RADAR CUACA <b>SINTANG</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-sorong">RADAR CUACA <b>SORONG</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-tarakan">RADAR CUACA <b>TARAKAN</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-ternate">RADAR CUACA <b>TERNATE</b> </a></li>
                                    <li><a href="https://juanda.jatim.bmkg.go.id/radarintegrasi/radar-timika">RADAR CUACA <b>TIMIKA</b> </a></li>
                                </ol>
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