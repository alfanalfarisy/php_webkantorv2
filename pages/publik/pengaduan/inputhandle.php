<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'mail/Exception.php';
require_once 'mail/PHPMailer.php';
require_once 'mail/SMTP.php';
require_once 'conf/cfg.php';

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

		if(!is_null($eviden)) $mail->addAttachment($eviden);

		$mail->isHTML(true);
		$mail->Subject = $judul;
		$mail->Body    = $isi;
		$mail->AltBody = strip_tags($isi);

		$mail->send();
		return true;
	} catch (Exception $e) {
		return false;
	}
    return false;
}

if($_POST)
{
    $nama        = filter_var($_POST["nama"], FILTER_SANITIZE_STRING);
    $email       = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $pelanggaran = filter_var($_POST["pelanggaran"], FILTER_SANITIZE_STRING);
    $terlapor    = filter_var($_POST["terlapor"], FILTER_SANITIZE_STRING);
    $lokasi      = filter_var($_POST["lokasi"], FILTER_SANITIZE_STRING);
    $waktu       = filter_var($_POST["waktu"], FILTER_SANITIZE_STRING);
    $uraian      = filter_var($_POST["uraian"], FILTER_SANITIZE_STRING);
    
    if(empty($nama)) {
		$empty[] = "<b>Nama Anda</b>";		
	}
	if(empty($email)) {
		$empty[] = "<b>Alamat Email</b>";
	}
	if(empty($pelanggaran)) {
		$empty[] = "<b>Jenis Pelanggaran</b>";
	}	
	if(empty($terlapor)) {
		$empty[] = "<b>Nama Terlapor</b>";
	}	
	if(empty($lokasi)) {
		$empty[] = "<b>Lokasi Kejadian</b>";
	}
	if(empty($waktu)) {
		$empty[] = "<b>Waktu Kejadian</b>";
	}
	if(empty($uraian)) {
		$empty[] = "<b>Uraian Pengaduan</b>";
	}
	if(empty($_FILES)) {
        $empty[] = "<b>Bukti Kejadian</b>";
    } 
    $file = $_FILES["eviden"];
    if(!file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])){
        $empty[] = "<b>Bukti Kejadian</b>";
    }   
	
	if(!empty($empty)) {
		$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' harus diisi!'));
        die($output);
	}
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
	    $output = json_encode(array('type'=>'error', 'text' => '<b>'.$email.'</b> adalah alamat email yang tidak valid. Harap dicek kembali.'));
		die($output);
	}
	
	$judul = $pelanggaran." ".$terlapor;
	$isi = "
	Identitas Pelapor
	Nama Pelapor : ".$nama."<br>
	Email Pelapor : ".$email."<br>
	<br>
	Melaporkan<br>
	Jenis Pelanggaran : ".$pelanggaran."<br>
	Nama Terlapor : ".$terlapor."<br>
	Lokasi Kejadian : ".$lokasi."<br>
	Waktu Kejadian : ".$waktu."<br>
	Uraian Pengaduan : ".$uraian."<br>
	";
	$eviden = sys_get_temp_dir().'/'.basename($_FILES["eviden"]["name"]);
	if (move_uploaded_file($_FILES["eviden"]["tmp_name"], $eviden)) {
		$kirimlaporan = kirim('wbs.bmkgjuanda@gmail.com', 'BMKG Stasiun Meteorologi Juanda Sidoarjo', $judul, $isi, $eviden);
		if($kirimlaporan){
			kirim($email, $nama, 'Laporan WhistleBlowing System BMKG Juanda', 'Terima kasih telah melaporkan pelanggaran yang terjadi di kantor kami. Laporan anda akan kami proses lebih lanjut.', NULL);
			$output = json_encode(array('type'=>'message', 'text' => 'Hai '.$nama .', Terima kasih banyak atas Laporan yang telah diberikan.'));
			die($output);
		} else {
			$output = json_encode(array('type'=>'error', 'text' => "Ada kesalahan dalam mengirim laporan. Mohon coba lagi."));
			die($output);
		}
	  } else {
		$output = json_encode(array('type'=>'error', 'text' => 'Ada kesalahan dalam mengunggah berkas. Harap dicek kembali.'));
		die($output);
	  }
}
?>
