<?php
if($_POST)
{

    
    $user_name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $user_email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $user_phone     = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $user_subject   = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message   = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    
    if(empty($user_name)) {
		$empty[] = "<b>Nama</b>";		
	}
	if(empty($user_email)) {
		$empty[] = "<b>Alamat Email</b>";
	}
	if(empty($user_phone)) {
		$empty[] = "<b>No Telp/HP</b>";
	}	
	if(empty($user_subject)) {
		$empty[] = "<b>Subyek/Judul</b>";
	}	
	if(empty($message)) {
		$empty[] = "<b>Isi Pesan</b>";
	}
	
	if(!empty($empty)) {
		$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' harus diisi!'));
        die($output);
	}
	
	if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
	    $output = json_encode(array('type'=>'error', 'text' => '<b>'.$user_email.'</b> adalah alamat email yang tidak valid. Harap dicek kembali.'));
		die($output);
	}
	
	//reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {
		
		require('recaptcha/src/autoload.php');		
		
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY, new \ReCaptcha\RequestMethod\SocketPost());

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		  if (!$resp->isSuccess()) {
				$output = json_encode(array('type'=>'error', 'text' => 'Validasi <b>Captcha</b> Diperlukan!'));
				die($output);				
		  }	
	}
	
	$sql = "INSERT INTO kritiksaran(name, email, phone, subject, message, tanggal) VALUES ('{$user_name}','{$user_email}','{$user_phone}','{$user_subject}','{$message}',now());"; 
	mysqli_query($conn, $sql) or die(json_encode(array('type'=>'error', 'text' => 'Gagal mengirim email, silahkan hubungi kontak')));
	$output = json_encode(array('type'=>'message', 'text' => 'Hai '.$user_name .', Terima kasih banyak atas Kritik dan Saran yang telah diberikan.'));
	die($output);
}
?>