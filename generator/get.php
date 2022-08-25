<?php
ini_set('max_execution_time', 300);
chdir(dirname(__FILE__));
if (!file_exists('data')) {
    mkdir('data', 0775, true);
}
require_once 'conf/cfg.php';

/// ### GEMPA
$gempaterkini = simplexml_load_file('http://172.30.0.7/data/gempaterkini.xml');

$fp = fopen('data/gempaterkini.json', 'w');
fwrite($fp, json_encode($gempaterkini));
fclose($fp);

$gempadirasakan = simplexml_load_file('http://172.30.0.7/data/gempadirasakan.xml');

$fp = fopen('data/gempadirasakan.json', 'w');
fwrite($fp, json_encode($gempadirasakan));
fclose($fp);

/// ### CUACA
$cuaca = simplexml_load_file('http://172.30.0.7/data/DigitalForecast-JawaTimur.xml');

$fp = fopen('data/cuaca.json', 'w');
fwrite($fp, json_encode($cuaca));
fclose($fp);

/// ### JUANDA
$obs = simplexml_load_file('http://172.30.0.7/data/dep.obs.xml');
$fcst = simplexml_load_file('http://172.30.0.7/data/dep.fcst.xml');

$fp = fopen('data/juanda.json', 'w');
fwrite($fp, json_encode(array("obs" => $obs, "fcst" => $fcst)));
fclose($fp);

/// ### AVIATION http://172.30.0.7/data/avi.obs.xml
$aviation = simplexml_load_file('http://172.30.0.7/data/avi.obs.xml');
//$aviation = simplexml_load_file('https://juanda.jatim.bmkg.go.id/data/avi.obs.xml');

$fp = fopen('data/aviation.json', 'w');
fwrite($fp, json_encode($aviation));
fclose($fp);

/// ### STATION METAR SPECI TAFOR
$station = simplexml_load_file('http://aviation.bmkg.go.id/latest/station.kml', 'SimpleXMLElement', LIBXML_NOCDATA);

$fp = fopen('data/station.json', 'w');
fwrite($fp, json_encode($station));
fclose($fp);

$json = json_encode($station);
$allstat = json_decode($json,TRUE);
$metarspeci = array();
$tafor = array();
foreach($allstat["Document"]["Placemark"] as $stat) {
	if(!is_array($stat["description"])){
		$descriptions = explode("\n", $stat["description"]);
		foreach($descriptions as $desc) {
			if(substr($desc, 0, strlen('METAR')) === 'METAR'||substr($desc, 0, strlen('SPECI')) === 'SPECI'){
				$metarspeci[] = $desc;
			}elseif(substr($desc, 0, strlen('TAF')) === 'TAF'){
				$tafor[] = $desc;
			}
		}
	}
}
$fp = fopen('data/metarspeci.json', 'w');
fwrite($fp, json_encode($metarspeci));
fclose($fp);
$fp = fopen('data/tafor.json', 'w');
fwrite($fp, json_encode($tafor));
fclose($fp);

/// ### WARNING
/* $sql = 'select * from warning_view where now() between waktuawal and waktuhabis';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$warning = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 
	$nestedData['id'] = $row["id"];
	$nestedData['tanggal'] = terjemahkan(DateTime::createFromFormat('Y-m-d', $row["tanggal"])->format('l, j F Y').' WIB');;
	$nestedData['waktuawal'] = $row["waktuawal"];
	$nestedData['waktuhabis'] = $row["waktuhabis"];
	$nestedData['warningisi'] = str_replace("[br]","<br>",str_replace("[/b]","</strong>",str_replace("[b]","<strong>",$row["warningisi"])));
	$warning[] = $nestedData;
} */
$nowcasting = simplexml_load_file('http://172.30.0.7/data/nowcasting.xml');
$nowcasting = json_encode($nowcasting);    
$nowcasting = json_decode($nowcasting, TRUE);
$warning = array();
foreach ($nowcasting as $value){
	$nestedData=array(); 
	$nestedData['id'] = $value["id"];
	$nestedData['tanggal'] = terjemahkan(DateTime::createFromFormat('Y-m-d H:i:s', $value["warningwaktu"])->format('l, j F Y').' WIB');
	$nestedData['waktuawal'] = $value["warningjamstart"];
	$nestedData['waktuhabis'] = $value["warningjamend"];
	$nestedData['warningisi'] = str_replace("[br]","<br>",str_replace("[/b]","</strong>",str_replace("[b]","<strong>",$value["warningisi"])));
	$warning[] = $nestedData;
}

$fp = fopen('data/warning.json', 'w');
fwrite($fp, json_encode($warning));
fclose($fp);

/// ### BERITA 4
$sql = 'select * from berita order by tanggal desc limit 4';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$berita = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 
	$nestedData['id'] = $row["id"];
	$nestedData['tanggal'] = terjemahkan(DateTime::createFromFormat('Y-m-d H:i:s', $row["tanggal"])->format('l, j F Y H:i').' WIB');;
	$nestedData['judul'] = $row["judul"];
	$nestedData['isi'] = $row["isi"];
	$nestedData['penulis'] = $row["penulis"];
	$nestedData['gambar'] = $row["gambar"];
	$berita[] = $nestedData;
}
$fp = fopen('data/berita.json', 'w');
fwrite($fp, json_encode($berita));
fclose($fp);

/// ### SIARANPERS 4
$sql = 'select * from siaranpers order by tanggal desc limit 4';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$siaranpers = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 
	$nestedData['id'] = $row["id"];
	$nestedData['tanggal'] = terjemahkan(DateTime::createFromFormat('Y-m-d H:i:s', $row["tanggal"])->format('l, j F Y H:i').' WIB');;
	$nestedData['judul'] = $row["judul"];
	$nestedData['isi'] = $row["isi"];
	$nestedData['penulis'] = $row["penulis"];
	$nestedData['gambar'] = $row["gambar"];
	$nestedData['file'] = $row["file"];
	$siaranpers[] = $nestedData;
}
$fp = fopen('data/siaranpers.json', 'w');
fwrite($fp, json_encode($siaranpers));
fclose($fp);

/// ### CITRA RADAR
date_default_timezone_set('Asia/Jakarta');
$idrekaman = array(); $tanggalkata = array(); $urlgambar = array();
$timezone = new DateTimeZone('UTC');

$search = $CMAX240folderpath. "*png"; 
$files = glob($search);
sort($files);
$files = array_reverse($files);
$files = array_slice($files, 0, 12);
$files = array_reverse($files);
$jumlah = count($files);
foreach ($files as $gambar){
	$namagambar = basename($gambar);
	$tanggalkata[] = terjemahkan(DateTime::createFromFormat('YmdHi', substr($namagambar, 0, 12), $timezone)->setTimeZone(new DateTimeZone('Asia/Jakarta'))->format('l, j F Y H:i').' WIB');
	$idrekaman[] = $namagambar;
	$urlgambar[] = $CMAX240baseurl.$namagambar;
}
$radar = array();
$radar['idrekaman'] = $idrekaman;
$radar['urlgambar'] = $urlgambar;
$radar['tanggalkata'] = $tanggalkata;

$fp = fopen('data/radar.json', 'w');
fwrite($fp, json_encode($radar));
fclose($fp);

/// beranda

/// ### BULETIN
$sql = 'select * from buletin order by tanggal desc';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$buletin = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 
	$nestedData['id'] = $row["id"];
	$nestedData['tanggal'] = terjemahkan(DateTime::createFromFormat('Y-m-d H:i:s', $row["tanggal"])->format('l, j F Y H:i').' WIB');;
	$nestedData['judul'] = $row["judul"];
	$nestedData['isi'] = $row["isi"];
	$nestedData['penulis'] = $row["penulis"];
	$nestedData['file'] = $row["file"];
	$buletin[] = $nestedData;
}
$fp = fopen('data/buletin.json', 'w');
fwrite($fp, json_encode($buletin));
fclose($fp);

/// ### elearning
$sql = 'select * from elearning order by tanggal desc';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$elearning = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 
	$nestedData['id'] = $row["id"];
	$nestedData['tanggal'] = terjemahkan(DateTime::createFromFormat('Y-m-d H:i:s', $row["tanggal"])->format('l, j F Y H:i').' WIB');;
	$nestedData['judul'] = $row["judul"];
	$nestedData['kategori'] = $row["kategori"];
	$nestedData['penulis'] = $row["penulis"];
	$nestedData['file'] = $row["file"];
	$elearning[] = $nestedData;
}
$fp = fopen('data/elearning.json', 'w');
fwrite($fp, json_encode($elearning));
fclose($fp);

/// ### IKHTISAR
$sql = 'select * from ikhtisar order by tanggal desc';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$ikhtisar = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 
	$nestedData['id'] = $row["id"];
	$nestedData['tanggal'] = terjemahkan(DateTime::createFromFormat('Y-m-d H:i:s', $row["tanggal"])->format('l, j F Y H:i').' WIB');;
	$nestedData['gambar'] = $row["gambar"];
	$nestedData['keterangan'] = $row["keterangan"];
	$ikhtisar[] = $nestedData;
}
$fp = fopen('data/ikhtisar.json', 'w');
fwrite($fp, json_encode($ikhtisar));
fclose($fp);

/// ### IKLIM
$sql = 'select * from iklim order by tanggal desc';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$iklim = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 
	$nestedData['id'] = $row["id"];
	$nestedData['tanggal'] = terjemahkan(DateTime::createFromFormat('Y-m-d H:i:s', $row["tanggal"])->format('l, j F Y H:i').' WIB');;
	$nestedData['gambar'] = $row["gambar"];
	$nestedData['keterangan'] = $row["keterangan"];
	$iklim[] = $nestedData;
}
$fp = fopen('data/iklim.json', 'w');
fwrite($fp, json_encode($iklim));
fclose($fp);

/// ### PRAKICU KECAMATAN
if (!file_exists('prakicu')) {
    mkdir('prakicu', 0775, true);
}
date_default_timezone_set("Etc/UTC"); // ######### UTC atau GMT+7
//$url = 'http://36.89.245.19/data/prakicu_kecamatan';
$url = '../data/prakicu_kecamatan';
$handle = fopen($url,"r");
$currid = "";
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

$sql = 'SELECT c.idkab, c.idkec, c.namakec, c.latitude, c.longitude, b.namakab, b.logo, b.prakicu, b.prakicu_d0 FROM kecamatan c, kabupaten b where c.idkab=b.idkab ORDER BY b.namakab, c.namakec ASC';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));

$allkabdata = array();
$kecdata = array();
$currkab = "";
$namakab = "";
$logo = "";
$prakicu = "";
$prakicu_d0 = "";

$numResults = mysqli_num_rows($query);
$counter = 0;

while( $row=mysqli_fetch_array($query) ) {
	if($currkab!="" and $currkab!=$row['idkab']){
		$kabdata = array();
		$kabdata['idkab'] = $currkab;
		$kabdata['namakab'] = $namakab;
		$kabdata['logo'] = $logo;
		$kabdata['prakicu'] = $prakicu;
		$kabdata['prakicu_d0'] = $prakicu_d0;
		$allkabdata[] = $kabdata;
		$kabdata['datakec'] = $kecdata;
		$fp = fopen('prakicu/'.$currkab.'.json', 'w');
		fwrite($fp, json_encode($kabdata));
		fclose($fp);
		$kecdata = array();
	}
	$currkab = $row['idkab'];
	$namakab = $row['namakab'];
	$logo = $row['logo'];
	$prakicu = $row['prakicu'];
	$prakicu_d0 = $row['prakicu_d0'];
	
	$kec = $alldata[$row['idkec']];
	$kec['idkec'] = $row['idkec'];
	$kec['namakec'] = $row['namakec'];
	$kec['lat'] = $row['latitude'];
	$kec['lon'] = $row['longitude'];
	$kecdata[] = $kec;
	if (++$counter == $numResults) {
        $kabdata = array();
		$kabdata['idkab'] = $currkab;
		$kabdata['namakab'] = $namakab;
		$kabdata['logo'] = $logo;
		$kabdata['prakicu'] = $prakicu;
		$allkabdata[] = $kabdata;
		$kabdata['datakec'] = $kecdata;
		$fp = fopen('prakicu/'.$currkab.'.json', 'w');
		fwrite($fp, json_encode($kabdata));
		fclose($fp);
	}
}
$fp = fopen('data/kab.json', 'w');
fwrite($fp, json_encode($allkabdata));
fclose($fp);

/// ### DATA PELABUHAN
ini_set('max_execution_time', 300);

$content = file_get_contents("http://202.90.198.206/awscenter/source/dataupdate.php");
$data = json_decode($content, true);
$pelabuhan = array();
foreach ($data as $key => $value) {
    if(substr( $key, 0, 1 ) === "R"){
		$station = explode("<br>",$value);
		$stationname = str_replace("<b>","",str_replace("</b>","",str_replace("\t","",$station[0])));
		if($stationname=="AWS Pelabuhan Probolinggo" or $stationname=="AWS Maritim Perak II" or $stationname=="AWS Stamet Kalianget" or $stationname=="AWS Maritim Ketapang"){
			$pel = array();
			$pel['pelabuhan'] = $stationname;
			$pel['keterangan'] = $value;
			$pelabuhan[] = $pel;
		}
	}
}
$fp = fopen('data/pelabuhan.json', 'w');
fwrite($fp, json_encode($pelabuhan));
fclose($fp);


//nowcastingsemeru
$sql = 'select * from peringatandinisemeru order by id desc limit 1';
$query=mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));
$warning = array();
while( $row=mysqli_fetch_array($query) ) {
	$nestedData=array(); 
	$nestedData['id'] = $row["id"];
	$nestedData['tanggal'] = $row["tanggal"];
	$nestedData['warningjamstart'] = $row["warningjamstart"];
	$nestedData['warningjamend'] = $row["warningjamend"];
	$nestedData['warningisi'] = $row["warningisi"];
	$warning[] = $nestedData;
}
$fp = fopen('data/nowcastingsemeru.json', 'w');
fwrite($fp, json_encode($warning));
fclose($fp);


?>
