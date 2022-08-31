<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">

    <section>


        <div class="container">

            <div class="card p-4 box-shadow">

                <h2 class="text-center">CITRA SATELIT WILAYAH JAWA TIMUR</h2>



                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <h5 class="text-center" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Himawari-8 IR Enhanced
                                </h5>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">

                                <center><img class="img-responsive" src=https://juanda.jatim.bmkg.go.id/data/H08_EH_Jatim.png alt="inframerah" width="720"></center>

                                <br>

                                <center><img class="img-responsive" src=http://202.90.198.22/IMAGE/HIMA/H08_EH_Indonesia.png alt="inframerah" width="720"></center>

                                <h4>Keterangan:</h4>
                                <p>Pada produk Himawari-8 EH, menunjukkan suhu puncak awan yang didapat dari
                                    pengamatan radiasi pada gelombang 10.4 mikrometer,yang kemudian
                                    diklasifikasikan
                                    dengan pewarnaan.
                                    Dimana warna hitam atau biru menunjukkan tidak terdapat pembentukan awan
                                    yang
                                    banyak (cerah).
                                    Sedangkan semakin dingin suhu puncak awan, dimana warna mendekati jingga,
                                    menunjukkan pertumbuhan awan yang signifikan dan berpotensi terbentuknya
                                    awan
                                    Comulonimbus.</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <h5 class="text-center collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Himawari-8 Rainfall Potential
                                    </h5>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <center><img class="img-responsive" src=http://202.90.198.22/IMAGE/HIMA/H08_RP_Jatim.png alt="Rainfall" width="720"></center>
                                    <h4>Keterangan:</h4>
                                    <p>Produk turunan Himawari-8 Potensial Rainfall adalah prodk yang dapat digunakan
                                        untuk mengestimasi potensi curah hujan.
                                        Disajikan berdasarkan kategori ringan, sedang, lebat, hingga sangat lebat,
                                        dengan menggunakan hubungan antara puncak awan dengan curah hujan yang akan
                                        dihasilkan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <h5 class="text-center collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Himawari-8 Natural Color
                                    </h5>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <center><img class="img-responsive" src=http://202.90.198.22/IMAGE/HIMA/H08_NC_Jatim.png alt="Natural" width="720"></center>
                                    <h4>Keterangan:</h4>
                                    <p>Produk Himawari-8 Natural Color menggunakan metode RGB( Red Green Blue).
                                        Dimana beberapa band dari data satelit digabungkan sehingga diperoleh
                                        identifikasi warna yang lebih jelas.
                                        Produk ini digunakan untuk mengamati proses konvektifitas, ketebalan awan, serta
                                        mikrofisis awan.
                                        Karena prosuk ini menggunakan band visible yang mengandalkan sinar matahari,
                                        sehingga hanya tersedia saat pagi hingga sore hari</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>












    </section>
</main>




<?php require('../../layout/footer.php') ?>
<?php require('../../layout/libraryJs.php') ?>