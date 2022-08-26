<?php
require('../../layout/header.php');
require('../../layout/navbar.php')
?>



<main id="main">

    <section>

        <div class="container">
            <div class="card" style="padding: 10px;">
                <div class="sdm-title">
                    <h4>SUMBER DAYA MANUSIA</h4>
                    <p> STAF KARYAWAN/ KARYAWATI BMKG JUANDA SIDOARJO</p>
                </div>
                <div class="d-inline-flex flex-row justify-content-around" style="display: flex;flex-wrap: wrap;" id="sdm_div">


                </div>
            </div>

        </div>

    </section>


</main>
<?php require('../../layout/footer.php') ?>



<?php
require('../../layout/libraryJs.php');
?>

<script>
    $.getJSON('../../data/pegawai.json', data => {

        let html = ''
        data.map(item => {
            html += ` <div class="card mb-2" style="width: 13rem;">
                        <img src='/home/assets/img/foto_pegawai/${item.GAMBAR}'
                            class="card-img-top" height="250px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="height:40px;">${item.NAMA_JABATAN_TUGAS}</h5>
                            <p class="card-text" style="height:60px;">${item.NAMA}</p>
                            <a href="#" class="btn btn-primary">${item.NAMA_UNIT}</a>
                        </div>
                    </div>`
        })

        $('#sdm_div').html(html)

    })
</script>