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

$sql = 'SELECT c.idkab, c.idkec, c.namakec, c.latitude, c.longitude, b.namakab, b.logo, b.prakicu FROM kecamatan c, kabupaten b where c.idkab=b.idkab ORDER BY b.namakab, c.namakec ASC';
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
		$kabdata['datakec'] = $kecdata;
		$allkabdata[] = $kabdata;
		
	}
}
$fp = fopen('prakicu/prakicu_kab_'.$date->format('Ymd_H').'.json', 'w');
fwrite($fp, json_encode($allkabdata));
fclose($fp);

$fp = fopen('prakicu/prakicu_kec_'.$date->format('Ymd_H').'.json', 'w');
fwrite($fp, json_encode($allkecdata));
fclose($fp);

$fp = fopen('data/prakicu_kab.json', 'w');
fwrite($fp, json_encode($allkabdata));
fclose($fp);

$fp = fopen('data/prakicu_kec.json', 'w');
fwrite($fp, json_encode($allkecdata));
fclose($fp);
?>
