<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$id = $_POST["id"];
	$paket = $_POST["paket"];
	$keranjang = $_POST["keranjang"];
	
	$perintah = "UPDATE tbl_wisata SET paket = '$paket', keranjang = '$keranjang' WHERE id = '$id'";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);
	
	if($cek>0){
		$response["kode"]  = 1;
		$response["pesan"]  = "Data berhasil diubah";
	}
	else{
		$response["kode"]  = 0;
		$response["pesan"]  = "Data gagal diubah";
	}
}
else{
	$response["kode"]  = 0;
	$response["pesan"]  = "Tidak ada post data";
}

echo json_encode($response);
mysqli_close($konek);