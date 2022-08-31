    <!-- ======= TITLE ======= -->
    <section id="" class="">
        <div class="container">
            <div class="row gy-4 ">
                <!-- JUDUL -->
                <div class="col-lg-6 col-xs-12 welcome">
                    <div class="col-12">
                        <div class="title-title d-none d-sm-block ">
                            <h2 class="animate__animated animate__headShake">Selamat Datang di <br> BMKG Juanda</h2>
                            <h6>Cepat, Tepat, Akurat, Luas, dan Mudah Dipahami</h6>

                        </div>
                        <div>

                            <div class="meadia-wrapper">
                                <div class=" media-headline">
                                    <h6>Media (Video WBBM)</h6>
                                </div>
                                <i class='bx bx-play-circle play-media'></i>
                                <a href="https://www.youtube.com/watch?v=udOySvTWfpw&ab_channel=Infohome" target="_blank"><img src="/home/assets/img/media.jpeg" width="100%" alt="playstore" class="img-responsive"></a>

                            </div>
                        </div>


                    </div>

                    <div class="col-12" style="position: absolute; bottom:0; width:90%">
                        <div class="row justify-items-end" style="height: 100%;">

                            <div class="col-3">
                                <a href="https://juanda.jatim.bmkg.go.id/radar"><button class="btn-menu-welcome"><span>Radar
                                            Jatim</span></button></a>

                            </div>
                            <div class="col-5">
                                <a href="/home/pages/peringatan/jatim.php"><button class="btn-menu-welcome"><span>Peringatan Dini Jatim</span></button>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="/home/pages/peringatan/wisata.php"><button class="btn-menu-welcome no-border"><span>Cuaca Wisata</span></button></a>
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