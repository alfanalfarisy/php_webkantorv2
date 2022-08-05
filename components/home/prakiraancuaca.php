    <!-- ======= PRAKIRAAN CUACA ======= -->
    <section id="contents-details" class="contents-details">
        <div class="container">
            <!-- JUDUL -->
            <!-- <div class="section-title">
                <h2>Prakiraan Cuaca</h2>
            </div> -->
            <div class="row gy-4">
                <!-- GAMBAR -->
                <div class="col-lg-4">
                    <div class="headline">
                        <h4>Cuaca Terkini</h4>
                    </div>
                    <div class="card-prakiraan-cuaca">
                        <div class="row mb-2" style="padding-left: 10px; padding-right: 10px;">
                            <select name="selectKab" id="selectKab" class="form-select form-select-sm col-md dropdown-select-carousel-cuaca" onchange="kabupatenSelected()"></select>
                            <select name="selectKec" id="selectKec" class="form-select form-select-sm col-md dropdown-select-carousel-cuaca" onchange="kecamatanSelected()"></select>
                            <select name="selectDate" id="selectDate" class="form-select form-select-sm col-md dropdown-select-carousel-cuaca" onchange="dateSelected()"></select>
                        </div>
                        <div id="prakicuWrapper" class="d-flex justify-content-center">
                            <div class="owl-carousel" id="prakicu"></div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4">
                    <div class="headline">
                        <h4>Cuaca Terkini</h4>
                    </div>
                    <div class="card-prakiraan-cuaca">
                        <div class="owl-carousel" id="prakicu">

                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="headline">
                        <h4>Gempabumi Terkini</h4>
                    </div>
                    <div class="card-prakiraan-cuaca">
                        <div class="row">
                            <div class="col-md-6  col-6">
                                <a href="https://ews.bmkg.go.id/tews/data/20220805004315.mmi.jpg" class="fancybox img-hover-v1" rel="gallery1" title="Gempabumi Terkini">
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

            </div>
            <!-- KOTAK 2 -->


            <!-- KOTAK 3 -->

        </div>
    </section>
    <!-- ======= END PRAKIRAAN CUACA ======= -->