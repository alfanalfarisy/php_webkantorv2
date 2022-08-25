<?php

ini_set('max_execution_time', 300);
chdir(dirname(__FILE__));
if (!file_exists('data')) {
	mkdir('data', 0775, true);
}
require_once '../config/db.php'; //ganti ke folder yang sama

//$sql = "SELECT * FROM rekaman r, datapos p, datakecamatan k where r.tipe=1 and r.idpos=p.idpos and p.idkecamatan=k.idkecamatan ORDER BY r.idrekaman DESC LIMIT 166";
//$res = mysqli_query($con, $sql);

//$halte = array();

$result = mysqli_query($connGobis, "select idrekaman from rekaman where tipe=1 order by idrekaman desc limit 1") or trigger_error(mysqli_error($conn));
die($result);
$row = mysqli_fetch_array($result);
$idrekaman = $row[0];
echo 'IDREKAMAN ' . $idrekaman . PHP_EOL;
$result = mysqli_query($conn, "select r.idpos, c.idkecamatan, c.namakecamatan, a.namapos, r.kategori, a.xdesimal, a.ydesimal from rekaman r, datapos a, datakecamatan c where r.idpos = a.idpos and c.idkecamatan=a.idkecamatan and idrekaman='" . $idrekaman . "' and tipe='1' order by c.namakecamatan") or trigger_error(mysqli_error($conn));

$curah10 = array();
while ($row = mysqli_fetch_array($result)) {
	$nestedData = array();
	//$date = DateTime::createFromFormat('YmdHi', $row['idrekaman']);
	//$date->add(new DateInterval("PT7H"));
	//$time = $date->format('Y-m-d H:i:s');
	//$nestedData['waktu'] = $time;
	$nestedData['idhalte'] = $row['idpos'];
	$nestedData['idjalur'] = $row['idkecamatan'];
	$nestedData['namahalte'] = $row['namapos'];
	$nestedData['namajalur'] = $row['namakecamatan'];
	$nestedData['kategori'] = $row['kategori'];
	$nestedData['xdesimal'] = $row['xdesimal'];
	$nestedData['ydesimal'] = $row['ydesimal'];
	if ($row['kategori'] == '0') {
		$nestedData['kategoriteks'] = 'Cerah';
		$curah10[] = $nestedData;
	} elseif ($row['kategori'] == '1') {
		$nestedData['kategoriteks'] = 'Berawan';
		$curah10[] = $nestedData;
	} elseif ($row['kategori'] == '2') {
		$nestedData['kategoriteks'] = 'Hujan Sangat Ringan';
		$curah10[] = $nestedData;
	} elseif ($row['kategori'] == '3') {
		$nestedData['kategoriteks'] = 'Hujan Ringan';
		$curah10[] = $nestedData;
	} elseif ($row['kategori'] == '4') {
		$nestedData['kategoriteks'] = 'Hujan Sedang';
		$curah10[] = $nestedData;
	} elseif ($row['kategori'] == '5') {
		$nestedData['kategoriteks'] = 'Hujan Lebat';
		$curah10[] = $nestedData;
	} elseif ($row['kategori'] == '6') {
		$nestedData['kategoriteks'] = 'Hujan Ekstrem';
		$curah10[] = $nestedData;
	}
}

$fp = fopen('../data/prakicu_gobis.json', 'w');
fwrite($fp, json_encode($curah10));
fclose($fp);

print 'cok';
    //mysqli_free_result($result);
    //mysqli_close($conn);
