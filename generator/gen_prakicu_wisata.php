<?php
ini_set('max_execution_time', 300);
chdir(dirname(__FILE__));
if (!file_exists('data')) {
    mkdir('data', 0775, true);
}
require_once 'conf/cfg.php';

/// ### PRAKICU KECAMATAN
if (!file_exists('prakicu')) {
    mkdir('prakicu', 0775, true);
}
$wisata = array();
$wisata['5008377'] = 'KBS Surabaya';
$wisata['5008584'] = 'Taman Safari Prigen';
$wisata['5008393'] = 'Wisata Bahari Lamongan';
$wisata['5008131'] = 'Pantai Pulau Merah';
$wisata['5008137'] = 'Songgon Pine Park';
$wisata['5008114'] = 'Bukit Jaddih Bangkalan';
$wisata['501274'] = 'Kota Wisata Batu';
$wisata['5008510'] = 'Situs Purbakala Trowulan';
$wisata['5008131'] = 'Pantai Plengkung';
$wisata['5008526'] = 'Air Terjun Sedudo';
$wisata['5008454'] = 'Telaga Sarangan';
$wisata['5008674'] = 'Pantai Pasir Putih Situbondo ';
$wisata['5008129'] = 'Kawah Ijen';
$wisata['5008461'] = 'Pantai Balekambang';
$wisata['5008555'] = 'Goa Gong Pacitan';
$wisata['5008672'] = 'Taman Nasional Baluran';
$wisata['5008482'] = 'Air Terjun Coban Rondo';
$wisata['5008476'] = 'Waduk Selorejo';
$wisata['5008415'] = 'Gunung Semeru';
$wisata['5008632'] = 'Gunung Bromo';
$wisata['5008207'] = 'Gunung Ijen';
$wisata['5008454'] = 'Gunung Lawu';
$wisata['5008492'] = 'Gunung Kawi';
$wisata['5008137'] = 'Gunung Raung';

date_default_timezone_set("Etc/UTC"); // ######### UTC atau GMT+7
//$url = 'http://36.89.245.19/data/prakicu_kecamatan';
$url = '../data/prakicu_kecamatan';
$handle = fopen($url,"r");
$currid = "";
$date = null;
$alldata = array();
$tempdata = array();
$unix_time = round(microtime(true));
while ($line = fgets($handle)) {
	$array = explode(";", trim($line));
	if($currid!="" and $currid!=$array[0]){
		$cont = array();
		foreach ($tempdata as $data) {
			$date = DateTime::createFromFormat('Y-m-d H:i:s', $data[1]);
			$time = $date->format('U');
			if($unix_time>$time-43200){
				if($data[2]!=""&&$data[3]!=""&&$data[4]!=""&&$data[5]!=""){
					$cont['tmin'] = $data[2];
					$cont['tmax'] = $data[3];
					$cont['humin'] = $data[4];
					$cont['humax'] = $data[5];
				}
			}
			if($unix_time>$time-10800){
				$cont['hu'] = $data[6];
				$cont['temp'] = $data[7];
				$cont['weather'] = $data[8];
				$cont['wd'] = $data[9];
				$cont['ws'] = $data[10];
				$cont['time'] = $data[1];
			}
		}
		$alldata[$tempdata[0][0]] = $cont;
		$tempdata = array();
	}
	$currid = $array[0];
	$tempdata[] = $array;
}
fclose($handle);
//$sql = 'SELECT c.idkab, c.idkec, c.namakec, c.latitude, c.longitude, b.namakab, b.logo, b.prakicu FROM kecamatan c, kabupaten b where c.idkab=b.idkab and c.idkec in ("5008131") ORDER BY b.namakab, c.namakec ASC';

$sql = "SELECT c.idkab, c.idkec, c.namakec, c.latitude, c.longitude, b.namakab, b.logo, b.prakicu FROM kecamatan c, kabupaten b where c.idkab=b.idkab and c.idkec in ('5008131','5008584','5008377','5008393','5008114','501274','5008510','5008131','5008674','5008461','5008555','5008672','5008482','5008476','5008137', '5008415', '5008632', '5008207', '5008454', '5008492', '5008137') ORDER BY b.namakab, c.namakec ASC";
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$allkabdata = array();
$allkecdata = array();
$kecdata = array();
$currkab = "";
$namakab = "";
$logo = "";
$prakicu = "";

$numResults = mysqli_num_rows($query);
$counter = 0;

while( $row=mysqli_fetch_array($query) ) {
	if($currkab!="" and $currkab!=$row['idkab']){
		$kabdata = array();
		$kabdata['idkab'] = $currkab;
		$kabdata['namakab'] = $namakab;
		$kabdata['logo'] = $logo;
		$kabdata['prakicu'] = $prakicu;
		$kabdata['datakec'] = $kecdata;
		$allkabdata[] = $kabdata;
		$kecdata = array();
	}
	$currkab = $row['idkab'];
	$namakab = $row['namakab'];
	$logo = $row['logo'];
	$prakicu = $row['prakicu'];
	
	//$kec = $alldata[$row['idkec']];
	$kec['namawis'] = $wisata[$row['idkec']];
	$kec['idkec'] = $row['idkec'];
	$kec['namakec'] = $row['namakec'];
	$kec['lat'] = $row['latitude'];
	$kec['lon'] = $row['longitude'];
	$kec['idkab'] = $currkab;
	$kec['namakab'] = $namakab;
	$kec = array_merge($kec, $alldata[$row['idkec']]);
	$allkecdata[] = $kec;
	$kecdata[] = $kec;
	if (++$counter == $numResults) {
        $kabdata = array();
		$kabdata['idkab'] = $currkab;
		$kabdata['namakab'] = $namakab;
		$kabdata['logo'] = $logo;
		$kabdata['prakicu'] = $prakicu;
		//$kabdata['namawis'] = $kecdata
		$kabdata['datakec'] = $kecdata;
		$allkabdata[] = $kabdata;
		
	}
}
//$fp = fopen('prakicu/prakicu_kab_'.$date->format('Ymd_H').'.json', 'w');
//fwrite($fp, json_encode($allkabdata));
//fclose($fp);

//$fp = fopen('prakicu/prakicu_kec_'.$date->format('Ymd_H').'.json', 'w');
//fwrite($fp, json_encode($allkecdata));
//fclose($fp);

//$fp = fopen('data/prakicu_kab.json', 'w');
//fwrite($fp, json_encode($allkabdata));
//fclose($fp);

$fp = fopen('data/prakicu_wisata.json', 'w');
fwrite($fp, json_encode($allkecdata));
fclose($fp);
?>
