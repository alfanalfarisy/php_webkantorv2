<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

// // include '../../config/db.php';
// require_once '../../library/mail/Exception.php';
// require_once '../../library/mail/PHPMailer.php';
// require_once '../../library/mail/SMTP.php';
// //require_once 'conf/cfg.php';
// if (isset($_POST['ajukan'])) {
//     if (!isset($_POST['jasa']) && !isset($_POST['keperluan'])) {
//         echo "<script> alert('Permohonan gagal diterima')</script>";
//     } else {
//         echo "<script> alert('Permohonan telah diterima')</script>";
//         $golongan = $_POST['golongan'];
//         $nama = $_POST['nama'];
//         $instansi = $_POST['instansi'];
//         $jabatan = $_POST['jabatan'];
//         $alamat = $_POST['alamat'];
//         $whatsapp = $_POST['whatsapp'];
//         $email = $_POST['email'];
//         $tanggal = $_POST['tanggal'];
//         $lokasi = $_POST['lokasi'];
//         if (isset($_POST['keperluan'])) {
//             $jasa = $_POST['keperluan'];
//         } else {
//             $jasa = $_POST['jasa'];
//         }
//         var_dump($_POST);
//         if (isset($_FILES['surat']) && isset($_FILES['proposal'])) {
//             $surat = $_FILES['surat']['name'];
//             $ran = rand();
//             $ekstensi =  array('pdf');
//             $ext = explode('.', $surat);
//             $ext = strtolower(end($ext));
//             $uku = $_FILES['surat']['size'];
//             $proposal = $_FILES['proposal']['name'];
//             $rand = rand();
//             $exte = explode('.', $proposal);
//             $exte = strtolower(end($exte));
//             $ukur = $_FILES['proposal']['size'];
//             if (!in_array($ext, $ekstensi) && !in_array($exte, $ekstensi)) {
//                 // header("location:coba1.php?alert=gagal_ekstensi");
//             } else {
//                 if ($uku < 1044070 && $ukur < 1044070) {
//                     $xyz = $ran . '.' . $ext;
//                     $wxyz = $rand . '.' . $exte;
//                     move_uploaded_file($_FILES['surat']['tmp_name'], 'surat/' . $xyz);
//                     move_uploaded_file($_FILES['proposal']['tmp_name'], 'proposal/' . $wxyz);
//                     mysqli_query($koneksi, "INSERT INTO pemohon VALUES('','$golongan','$nama',
//           '$instansi','$jabatan','$alamat','$whatsapp','$email',
//           '$jasa','$tanggal','$lokasi','$xyz','$wxyz')");
//                     // header("location:coba1.php?alert=berhasil");
//                 } else {
//                     // header("location:coba1.php?alert=gagal_ukuran");
//                 }
//             }
//         } else {
//             mysqli_query($koneksi, "INSERT INTO pemohon VALUES(
//          '',
//          '$golongan',
//          '$nama',
//          '$instansi',
//          '$jabatan',
//          '$alamat',
//          '$whatsapp',
//          '$email',
//          '$jasa',
//          '$tanggal',
//          '$lokasi',
//          '',
//          '')");
//         }
//     }

//     $mail = new PHPMailer(true);
//     $mail->isSMTP();
//     $mail->Host       = 'smtp.gmail.com';
//     $mail->SMTPAuth   = true;
//     $mail->Username   = 'layanan.home@gmail.com';
//     $mail->Password   = 'juanda96935';
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//     $mail->Port       = 587;
//     $mail->setFrom('layanan.home@gmail.com', 'BMKG Stasiun Meteorologi Juanda Sidoarjo');
//     $mail->addAddress($email);
//     $mail->addCC('layanan.home@gmail.com');
//     if ($golongan == 3) {
//         $mail->addAttachment("surat/" . $xyz, $surat);
//         $mail->addAttachment("proposal/" . $wxyz, $proposal);
//     }
//     $mail->isHTML(true);
//     $mail->Subject = "Permohonan Informasi";
//     $mail->Body    = "<header style='background: lightblue; padding-top: 5px; padding-bottom: 5px;'><p style='margin-left: 25px; font-size: 30px;'>Terima kasih telah mempercayai layanan kami</p></header><p>Halo " . $nama . ",</p><p>kami akan segera memproses permintaan anda</p><p style='color: lightblue;'>(" . date('F j, Y, g:i a') . ")</p><table style='border-collapse: collapse; width: 100%; border: 1px solid black;'><tr><th style='border: 1px solid black; border-collapse: collapse;'>Nama</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $nama . "</td></tr><tr><th style='border: 1px solid black; border-collapse: collapse;'>Instansi</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $instansi . "</td></tr><tr><th style='border: 1px solid black; border-collapse: collapse;'>Jabatan</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $jabatan . "</td></tr><tr><th style='border: 1px solid black; border-collapse: collapse;'>Alamat</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $alamat . "</td></tr><tr><th style='border: 1px solid black; border-collapse: collapse;'>No. Telepon</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $whatsapp . "</td></tr><tr><th style='border: 1px solid black; border-collapse: collapse;'>Email</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $email . "</td></tr><tr><th style='border: 1px solid black; border-collapse: collapse;'>Jasa/Informasi yang dipilih</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $jasa . "</td></tr><tr><th style='border: 1px solid black; border-collapse: collapse;'>tanggal</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $tanggal . "</td></tr><tr><th style='border: 1px solid black; border-collapse: collapse;'>lokasi</th><td style='border: 1px solid black; border-collapse: collapse;'>" . $lokasi . "</td></tr></table><br><h3 style='color: lightblue'>Alamat Kantor</h3><p><b>Bagian Data & Informasi</b></p><p>Stasiun Meteorologi Kelas I Juanda Sidoarjo (BMKG Juanda).</p><p>Jalan Bandar Udara Juanda, Pranti, Kec. Sedati, Kab. Sidoarjo. Jawa Timur</p><p>Sedati, Kab. Sidoarjo</p><p>Jawa Timur</p><p>61253</p>";
//     $mail->AltBody = strip_tags("sukses");
//     $mail->send();
// }
// 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Permohonan Informasi</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.css" integrity="sha512-gOfBez3ehpchNxj4TfBZfX1MDLKLRif67tFJNLQSpF13lXM1t9ffMNCbZfZNBfcN2/SaWvOf+7CvIHtQ0Nci2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background-image: url('/home/assets/img/pelayanandatadaringinput/BG_datadaringinput.jpg');background-position:center;background-size:cover">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Formulir Permohonan Informasi</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="golongan" value="<?= $_GET['pilihan'] ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama" name="nama" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Instansi/Perusahaan" name="instansi" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Jabatan" name="jabatan" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat" name="alamat" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="tel" class="form-control form-control-user" id="exampleInputPassword" placeholder="Nomor Whatsapp" name="whatsapp" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Informasi/Jasa yang diperlukan
                                        :</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jasa" id="jasa1" onclick="tutup()" value="Analisis Curah Hujan Bulanan">
                                        <label class="form-check-label" for="jasa1">Analisis Curah Hujan
                                            Bulanan</label><br>
                                        <input class="form-check-input" type="radio" name="jasa" id="jasa2" onclick="tutup()" value="Informasi Cuaca Khusus Untuk Komersial">
                                        <label class="form-check-label" for="jasa2">Informasi Cuaca Khusus Untuk
                                            Komersial</label><br>
                                        <input class="form-check-input" type="radio" name="jasa" id="jasa3" onclick="tutup()" value="Informasi Radar Cuaca">
                                        <label class="form-check-label" for="jasa3">Informasi Radar Cuaca</label><br>
                                        <input class="form-check-input" type="radio" name="jasa" id="jasa4" onclick="tutup()" value="Informasi Meteorologi Untuk Klaim Asuransi Dan Data Dukung">
                                        <label class="form-check-label" for="jasa4">Informasi Meteorologi Untuk Klaim
                                            Asuransi Dan Data Dukung</label><br>
                                        <input class="form-check-input" type="radio" name="jasa" id="jasa5" onclick="buka()" value="Keperluan Lain">
                                        <label class="form-check-label" for="jasa5">Keperluan Lain</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="keperluan" type="text" class="form-control form-control-user" placeholder="Keperluan" disabled name="keperluan">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Tanggal/Periode" name="tanggal" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Lokasi/Wilayah" name="lokasi" required>
                                </div>
                                <?php
                                if ($_GET['pilihan'] != 3) {
                                ?>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <p><a href="https://juanda.jatim.bmkg.go.id/webkantor/tarif.php" target="_blank">Jenis Layanan dan Tarif</a></p>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Surat Pengantar Permohonan Data Dari
                                                Sekolah/Kampus</label>
                                            <input class="form-control" type="file" id="formFile" name="surat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Proposal Penelitian</label>
                                            <input class="form-control" type="file" id="formFile" name="proposal" required>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <button id="keperluan" type="submit" class="btn btn-primary btn-user btn-block" name="ajukan" onclick="terisi()">Ajukan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.js" integrity="sha512-M82XdXhPLLSki+Ld1MsafNzOgHQB3txZr8+SQlGXSwn6veeqtYhPLbQeAfk9Y/Q9/gXcfa1jWT4YYUeoei6Uow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function tutup() {
            document.getElementById('keperluan').disabled = true;
        }

        function buka() {
            document.getElementById('keperluan').disabled = false;
        }

        function terisi() {
            for (var i = 1; i < 6; i++) {
                var jasa = document.getElementById('jasa'.i).value;
                var keperluan = document.getElementById('keperluan').value;
                if (jasa != "" && keperluan != "") {
                    document.getElementById('keperluan').name = "tidak";
                }
            }
        }
    </script>

</body>

</html>