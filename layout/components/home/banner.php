    <!-- ======= Activity ======= -->
    <section id="" class="">
            <div class="container">
                    <!-- JUDUL -->
                    <!-- <div class="section-title">
                <h2>Banner</h2>
            </div> -->
                    <div class="row gy-4">
                            <!-- GAMBAR -->
                            <div class="col-lg-7">
                                    <div class="headline text-center">
                                            <h4>Banner</h4>
                                    </div>
                                    <div class="owl-carousel" id="carouselBanner">
                                            <div class="item "><a href="http://puslitbang.bmkg.go.id/jmg" target="_blank"><img src="/home/assets/img/banner/jurnalbmkg.png" alt="jurnalbmkg" style="height:11em"></a>
                                            </div>
                                            <div class="item"><img src="/home/assets/img/banner/mottobmkg.png" alt="motto" style="height:11em">
                                            </div>
                                            <div class="item"><img src="/home/assets/img/banner/maklumat.png" alt="maklumat" width="228px" style="height:11em"></div>
                                            <div class="item"><a href="https://juanda.jatim.bmkg.go.id/home/pages/publik/hasilikmipk.php" target="_blank"><img src="/home/assets/img/banner/hasil_ikm.png" alt="hasil-ikm" style="height:11em"></a></div>
                                            <div class="item"><a href="https://www.lapor.go.id/instansi/badan-meteorologi-klimatologi-dan-geofisika" target="_blank"><img src="/home/assets/img/banner/lapor.png" alt="lapor" style="height:11em"></a>
                                            </div>
                                            <div class="item"><a href="https://elhkpn.kpk.go.id/portal/user/login#modal-notice-two" target="_blank"><img src="/home/assets/img/banner/elhkpn.jpeg" alt="lapor" style="height:11em"></a></div>
                                            <div class="item"><a href="https://siharka.menpan.go.id/index.php/login" target="_blank"><img src="/home/assets/img/banner/lhkasn.jpeg" alt="lapor" style="height:11em"></a>
                                            </div>
                                            <div class="item"><a href="http://lpse.bmkg.go.id" target="_blank"><img src="/home/assets/img/banner/lpse.png" alt="lpse" style="height:11em"></a>
                                            </div>
                                            <div class="item"><a href="#" target="_blank"><img src="/home/assets/img/banner/asnberakhlak.jpeg" alt="lpse" style="height:11em"></a></div>
                                            <div class="item"><a href="https://wbs.bmkg.go.id/" target="_blank"><img src="/home/assets/img/banner/wbs.jpeg" alt="lpse" style="height:11em"></a></div>
                                    </div>
                            </div>


                            <div class="col-lg-5">
                                    <div class="headline text-center">
                                            <h4>Zona Intregitas</h4>
                                    </div>
                                    <div class="owl-carousel " id="carouselZi">
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_1.jpeg" alt="" style="height:11em" onclick="imageEnlarge()" class="w3-hover-opacity"></div>
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_2.jpeg" alt="" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity"></div>
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_3.jpeg" alt="" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity"></div>
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_4.jpeg" alt="" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity"></div>
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_5.jpeg" alt="" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity"></div>
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_6.jpeg" alt="" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity"></div>
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_7.jpeg" alt="" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity"></div>
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_8.jpeg" alt="" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity"></div>
                                            <div class="item"><img src="/home/assets/img/wbbm/verlap_wbbm_9.jpeg" alt="" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity"></div>

                                            <div id="pop">
                                                    <img id="imageresource" src="/home/assets/img/wbbm/verlap_wbbm_10.jpeg" style="height:11em;" onclick="imageEnlarge()" class="w3-hover-opacity">
                                            </div>
                                    </div>
                            </div>
                    </div>
                    <!-- MODAL POPUP IMAGE ZI -->

    </section>

    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">

                    <img src="" id="imagepreview" class="m-auto d-block" style="width:100%;">

            </div>
    </div>

    <!-- ======= Activity ======= -->

    <script>
            function imageEnlarge() {
                    $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the 
                    $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use 
            }
    </script>