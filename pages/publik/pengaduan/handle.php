<?php


require_once '../../../library/mail/Exception.php';
require_once '../../../library/mail/PHPMailer.php';
require_once '../../../library/mail/SMTP.php';
require_once '../../../config/db.php';
require_once '../../../library/validation/minmax.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function kirim($tujuan, $nama, $judul, $isi, $eviden)
{
	try {
		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'wbs.bmkgjuanda@gmail.com';
		$mail->Password   = 'warr96935';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port       = 587;

		$mail->setFrom('wbs.bmkgjuanda@gmail.com', 'BMKG Stasiun Meteorologi Juanda Sidoarjo');
		$mail->addAddress($tujuan, $nama);

		if (!is_null($eviden)) $mail->addAttachment($eviden);

		$mail->isHTML(true);
		$mail->Subject = $judul;
		$mail->Body    = $isi;
		$mail->AltBody = strip_tags($isi);


		return true;
	} catch (Exception $e) {
		return false;
	}
	return false;
}
if ($_POST) {

	$nama        = filter_var($_POST["nama"], FILTER_SANITIZE_STRING);
	$email       = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$pelanggaran = filter_var($_POST["pelanggaran"], FILTER_SANITIZE_STRING);
	$terlapor    = filter_var($_POST["terlapor"], FILTER_SANITIZE_STRING);
	$lokasi      = filter_var($_POST["lokasi"], FILTER_SANITIZE_STRING);
	$waktu       = filter_var($_POST["waktu"], FILTER_SANITIZE_STRING);
	$uraian      = filter_var($_POST["uraian"], FILTER_SANITIZE_STRING);


	if (empty($nama)) {
		$empty[] = "<b>Nama Anda</b>";
	}
	if (empty($email)) {
		$empty[] = "<b>Alamat Email</b>";
	}
	if (empty($pelanggaran)) {
		$empty[] = "<b>Jenis Pelanggaran</b>";
	}
	if (empty($terlapor)) {
		$empty[] = "<b>Nama Terlapor</b>";
	}
	if (empty($lokasi)) {
		$empty[] = "<b>Lokasi Kejadian</b>";
	}
	if (empty($waktu)) {
		$empty[] = "<b>Waktu Kejadian</b>";
	}
	if (empty($uraian)) {
		$empty[] = "<b>Uraian Pengaduan</b>";
	}
	if (empty($_FILES)) {
		$empty[] = "<b>Bukti Kejadian</b>";
	}
	$file = $_FILES["eviden"];
	if (!file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
		$empty[] = "<b>Bukti Kejadian</b>";
	}

	if (!empty($empty)) {
		$output = json_encode(array('type' => 'error', 'text' => implode(", ", $empty) . ' harus diisi!'));
		die($output);
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //email validation
		$output = json_encode(array('type' => 'error', 'text' => '<b>' . $email . '</b> adalah alamat email yang tidak valid. Harap dicek kembali.'));
		die($output);
	}

	$judul = $pelanggaran . " " . $terlapor;
	$isi = "
	Identitas Pelapor
	Nama Pelapor : " . $nama . "<br>
	Email Pelapor : " . $email . "<br>
	<br>
	Melaporkan<br>
	Jenis Pelanggaran : " . $pelanggaran . "<br>
	Nama Terlapor : " . $terlapor . "<br>
	Lokasi Kejadian : " . $lokasi . "<br>
	Waktu Kejadian : " . $waktu . "<br>
	Uraian Pengaduan : " . $uraian . "<br>
	";
	$ext = $ext = end((explode(".",  $_FILES["eviden"]["name"])));
	$filename      =  time() . '.' .	$ext;
	if (move_uploaded_file($_FILES["eviden"]["tmp_name"], '../../../fileupload/pengaduan/' .	$filename)) {


		require_once '../../../config/db.php';


		$nama        = filter_var($_POST["nama"], FILTER_SANITIZE_STRING);
		$email       = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
		$pelanggaran = filter_var($_POST["pelanggaran"], FILTER_SANITIZE_STRING);
		$terlapor    = filter_var($_POST["terlapor"], FILTER_SANITIZE_STRING);
		$lokasi      = filter_var($_POST["lokasi"], FILTER_SANITIZE_STRING);
		$waktu       = filter_var($_POST["waktu"], FILTER_SANITIZE_STRING);
		$uraian      = filter_var($_POST["uraian"], FILTER_SANITIZE_STRING);




		$sql = "INSERT INTO pengaduan (nama, email, terlapor, lokasi, waktu, uraian, filename) VALUES ('$nama','$email','$terlapor','$lokasi','$waktu','$uraian','$filename');";

		mysqli_query($conn, $sql) or die(json_encode(array('type' => 'error', 'text' => 'Gagal Memasukkan Laporan')));
		$output = json_encode(array('type' => 'message', 'text' => 'Hai ' . $user_name . ', Terima kasih banyak atas Kritik dan Saran yang telah diberikan.'));

		echo "<script>The file " . htmlspecialchars(basename($_FILES["eviden"]["name"])) . " has been uploaded.</script>";
		$kirimlaporan = kirim($email, 'BMKG Stasiun Meteorologi Juanda Sidoarjo', $judul, $isi, $eviden);
		if ($kirimlaporan) {
			kirim($email, $nama, 'Laporan WhistleBlowing System BMKG Juanda', 'Terima kasih telah melaporkan pelanggaran yang terjadi di kantor kami. Laporan anda akan kami proses lebih lanjut.', NULL);
			// $output = json_encode(array('type' => 'message', 'text' => 'Hai ' . $nama . ', Terima kasih banyak atas Laporan yang telah diberikan.'));
			header("location: 'https://juanda.jatim.bmkg.go.id/'");
		} else {
			$output = json_encode(array('type' => 'error', 'text' => "Ada kesalahan dalam mengirim laporan. Mohon coba lagi."));
			die($output);
		}
	} else {
		echo "<script>Sorry, there was an error uploading your file.</script>";
	}
}


require_once '../../../config/db.php';
$sql = "SELECT * FROM pengaduan ";
$data = mysqli_query($conn, $sql);
$rows = array();
while ($r = mysqli_fetch_assoc($data)) {
	$rows[] = $r;
}
$json->data = $rows;
print json_encode($json);
