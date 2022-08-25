<?php
$conn = mysqli_connect("localhost", "meteojuanda", "Juanda969#%", "webkantor");

// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
