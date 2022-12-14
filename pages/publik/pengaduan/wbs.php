<?php
require('../../../layout/header.php');
require('../../../layout/navbar.php')
?>

<main id="main">


    <section>
        <div class="container">
            <div class="card p-4 box-shadow">
                <div class="row">
                    <div class="heading">
                        <div class="heading_border bg_red"></div>
                        <h2><span class="color_red">Whistleblowing</span> System</h2>
                        <p>Apabila anda melihat atau mengetahui dugaan <span class="color_red">Tindak Pidana Korupsi</span> yang dilakukan pegawai BMKG. Silahkan melapor menggunakan isian ini. Jika laporan anda memenuhi syarat/kriteria, maka akan diproses lebih lanjut.</p>
                    </div>
                    <form id="contact-form" action="handle.php" method="post" enctype="multipart/form-data">
                        <div id="result"></div>

                        <div class="mb-3">
                            <input type="text" placeholder="Nama Anda" class="form-control" required name="nama" id="nama">
                        </div>
                        <div class="mb-3">
                            <input type="email" placeholder="Alamat Email" class="form-control" required name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <select name="pelanggaran" id="pelanggaran" class="form-control">
                                <option value="">Jenis Pelanggaran</option>
                                <option value="Gratifikasi">Gratifikasi</option>
                                <option value="Penyimpangan dari tugas dan fungsi">Penyimpangan dari tugas dan fungsi</option>
                                <option value="Benturan kepentingan">Benturan kepentingan</option>
                                <option value="Melanggar peraturan dan perundangan yang berlaku">Melanggar peraturan dan perundangan yang berlaku</option>
                                <option value="Tindak Pidana Korupsi">Tindak Pidana Korupsi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" placeholder="Nama Terlapor" class="form-control" required name="terlapor" id="terlapor">
                        </div>
                        <div class="mb-3">
                            <input type="text" placeholder="Lokasi Kejadian" class="form-control" required name="lokasi" id="lokasi">
                        </div>
                        <div class="mb-3">
                            <input type="text" placeholder="Waktu Kejadian" class="form-control" required name="waktu" id="waktu">
                        </div>
                        <div class="mb-3">
                            <textarea placeholder="Uraian Pengaduan" name="uraian" id="uraian" required="required" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <span class="color_red">Bukti Kejadian</span>
                        </div>
                        <div class="mb-3">
                            <input placeholder="Bukti Kejadian" type="file" required name="eviden" id="eviden">
                        </div>
                        <p style="text-align:left; width:99%;"><input type="checkbox" id="check_id" value="1" onclick="javascript:benar_cek()" onchange="javascript:benar_cek()" /> <strong style="color:#F00;">Data yang saya berikan benar dan dapat dipertanggungjawabkan</strong></p>
                        <div id="mail-status"></div>
                        <button type="submit" class="btn btn-info " id="btn_submit" name="btn_submit">Submit</button>
                </div>
                </form>

            </div>
        </div>

        </div>
        </div>
    </section>


</main>
<?php require('../../../layout/footer.php') ?>

<?php require('../../../layout/libraryJs.php') ?>
<script src='https://www.google.com/recaptcha/api.js'></script>