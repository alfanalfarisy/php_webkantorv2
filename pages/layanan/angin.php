<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">

    <section>


        <div class="container">

            <div class="card p-4 box-shadow">

                <h2 class="text-center">Angin Wilayah Indonesia</h2>





                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <h5 class="text-center" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Analisis Angin lapisan 3000 feet (00.00 UTC)
                                </h5>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">

                                <a href=https://web.meteo.bmkg.go.id//media/data/bmkg/mfy/ecmwf/Analisis/streamline_3000_00.png>
                                    <center><img class="img-responsive"
                                        src=https://web.meteo.bmkg.go.id//media/data/bmkg/mfy/ecmwf/Analisis/streamline_3000_00.png
                                        alt="00 UTC" width="70%"></center></a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <h5 class="text-center collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Analisis Angin lapisan 3000 feet (12.00 UTC)
                                    </h5>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">

                                    <a href=https://web.meteo.bmkg.go.id//media/data/bmkg/mfy/ecmwf/Analisis/streamline_3000_12.png>
                                        <center><img class="img-responsive"
                                            src=https://web.meteo.bmkg.go.id//media/data/bmkg/mfy/ecmwf/Analisis/streamline_3000_12.png
                                            alt="12 UTC" width="70%"></center></a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <h5 class="text-center collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Angin ZONAL lapisan 3000 feet
                                    </h5>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <a href=http://web.meteo.bmkg.go.id//media/data/bmkg/mfy/ecmwf/Analisis/zonal_3000_00.png> 
                                        <center><img class="img-responsive"
                                            src=http://web.meteo.bmkg.go.id//media/data/bmkg/mfy/ecmwf/Analisis/zonal_3000_00.png
                                            alt="Natural" width="70%"></center></a>
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