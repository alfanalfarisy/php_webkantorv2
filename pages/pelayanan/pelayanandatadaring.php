<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">
    <section>
        <div class="container">

            <div class="card p-4 box-shadow">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-5 mb-lg-0 mb-lg-3" onclick="window.open('formulir.php?pilihan=1');" style="">
                            <div class="features-icons-icon d-flex"><i
                                    class="bi bi-person-fill m-auto text-primary"></i>
                            </div>
                            <h5 class="text-center">Perorangan</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-5 mb-lg-0 mb-lg-3" onclick="window.open('formulir.php?pilihan=2','_blank');"
                            style="">
                            <div class="features-icons-icon d-flex"><i class="bi bi-bank2 m-auto text-primary"></i>
                            </div>
                            <h5 class="text-center">Instansi/Perusahaan</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-0 mb-lg-3" onclick="window.open('formulir.php?pilihan=3','_blank');" style="">
                            <div class="features-icons-icon d-flex"><i class="bi bi-book-fill m-auto text-primary"
                                    style=""></i>
                            </div>
                            <h5 class="text-center">Mahasiswa/Pelajar</h5>
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