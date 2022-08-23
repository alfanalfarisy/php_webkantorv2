<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">

    <section>


        <div class="container">

            <div class="card p-4 box-shadow">

                <h2 class="text-center">Cuaca Wisata Jawa Timur</h2>





                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <h5 class="text-center" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Cuaca Wisata
                                </h5>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">

                                <a
                                    href=https://juanda.jatim.bmkg.go.id/cuwis/posko_wisata1.png>
                                    <img class="img-responsive"
                                        src=https://juanda.jatim.bmkg.go.id/cuwis/posko_wisata1.png
                                        alt="00 UTC" height="720"></a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <h5 class="text-center collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Cuaca Gunung
                                    </h5>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <a
                                        href=https://juanda.jatim.bmkg.go.id/cuwis/posko_wisata2.png>
                                        <img class="img-responsive"
                                            src=https://juanda.jatim.bmkg.go.id/cuwis/posko_wisata2.png
                                            alt="12 UTC" height="720"></a>
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