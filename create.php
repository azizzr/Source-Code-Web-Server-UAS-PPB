<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$paket = $_POST["paket"];
	$keranjang = $_POST["keranjang"];
	
	$perintah = "INSERT INTO tbl_wisata (paket, keranjang) VALUES('$paket' ,'$keranjang')";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);
	
	if($cek>0){
		$response["kode"]  = 1;
		$response["pesan"]  = "Simpan data berhasil";
	}
	else{
		$response["kode"]  = 0;
		$response["pesan"]  = "Gagal simpan";
	}
}
else{
	$response["kode"]  = 0;
	$response["pesan"]  = "Tidak ada post data";
}

echo json_encode($response);
mysqli_close($konek);