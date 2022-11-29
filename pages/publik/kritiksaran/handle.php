<?php
if ($_POST) {

	require_once '../../../config/db.php';
	require_once '../../../library/validation/minmax.php';

	$user_name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$user_email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$user_phone     = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
	$user_subject   = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
	$message   = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

	validation($user_name, 2, 100);
	validation($user_email, 2, 100);
	validation($user_phone, 8, 13);
	validation($user_phone, 2, 100);
	validation($user_subject, 2, 100);
	validation($message, 20, 1000);



	$sql = "INSERT INTO kritiksaran(name, email, phone, subject, message, tanggal) VALUES ('{$user_name}','{$user_email}','{$user_phone}','{$user_subject}','{$message}',now());";
	mysqli_query($conn, $sql) or die(json_encode(array('type' => 'error', 'text' => 'Gagal mengirim email, silahkan hubungi kontak')));
	$output = json_encode(array('type' => 'message', 'text' => 'Hai ' . $user_name . ', Terima kasih banyak atas Kritik dan Saran yang telah diberikan.'));
	die($output);
}



require_once '../../../config/db.php';
$sql = "SELECT * FROM kritiksaran ";
$data = mysqli_query($conn, $sql);
$rows = array();
while ($r = mysqli_fetch_assoc($data)) {
	$rows[] = $r;
}
$json->data = $rows;
print json_encode($json);
