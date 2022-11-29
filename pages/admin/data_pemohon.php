<?php
$koneksi = mysqli_connect("localhost", "meteojuanda", "Juanda969#%", "permohonan_data");

$sql = "SELECT * from pemohon";
$data = mysqli_query($koneksi, $sql);
$rows = array();
while ($r = mysqli_fetch_assoc($data)) {
    $rows[] = $r;
}
$json->data = $rows;
print json_encode($json);
