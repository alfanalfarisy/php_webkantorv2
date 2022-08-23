    <!-- ======= TITLE ======= -->
    <section id="contents-details" class="contents-details">
        <div class="container">
            <div class="row gy-4 ">
                <!-- JUDUL -->
                <div class="col-lg-6 col-xs-12 d-none d-sm-block" style="position:relative; min-height: 400px;">
                    <div class="col-12">
                        <div class="title-title ">
                            <h2>Selamat Datang di <br> BMKG Juanda</h2>
                            <h6>Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami</h6>
                            <br>
                            <div><a href="https://s.id/infobmkgjuanda" target="_blank"><img src="/bmkgjuanda/assets/img/playstore.png" width="200px" alt="playstore" class="img-responsive"></a></div>
                        </div>

                    </div>

                    <div class="col-12" style="position: absolute; bottom:0">
                        <div class="row justify-items-end" style="height: 100%;">

                            <div class="col-3">
                                <a href="https://juanda.jatim.bmkg.go.id/radar"><button class="btn-menu-welcome"><span>Radar Jatim</span></button></a>
                            </div>
                            <div class="col-5">
                                <a href="/bmkgjuanda/pages/peringatan/jatim.php"><button class="btn-menu-welcome"><span>Peringatan Dini Jatim</span></button>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="/bmkgjuanda/pages/peringatan/wisata.php"><button class="btn-menu-welcome no-border"><span>Cuaca Wisata</span></button></a>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- VIDEO YOUTUBE -->
                <div class="col-lg-6 col-xs-12">
                    <div class="headline d-block d-sm-none">
                        <h4>Prakiraan Cuaca</h4>
                    </div>
                    <div class="card-carousel-cuaca">
                        <div class="row mb-2" style="padding-left: 10px; padding-right: 10px;">
                            <select name="selectKab" id="selectKab" class="form-select form-select-sm col-md col-xs-4 dropdown-select-carousel-cuaca" onchange="kabupatenSelected()"></select>
                            <select name="selectKec" id="selectKec" class="form-select form-select-sm col-md col-xs-4 dropdown-select-carousel-cuaca" onchange="kecamatanSelected()"></select>
                            <select name="selectDate" id="selectDate" class="form-select form-select-sm col-md col-xs-4 dropdown-select-carousel-cuaca" onchange="dateSelected()"></select>
                        </div>
                        <div id="prakicuWrapper" class="d-flex justify-content-center">
                            <div class="owl-carousel" id="prakicu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= END TITLE ======= -->