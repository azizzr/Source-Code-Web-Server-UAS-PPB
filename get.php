<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$id = $_POST["id"];
	
	$perintah = "SELECT * FROM tbl_wisata WHERE id = '$id'";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);
	
	if($cek>0){
		$response["kode"]  = 1;
		$response["pesan"]  = "Data tersedia";
		$response["data"] = array();
	
		while($ambil = mysqli_fetch_object($eksekusi)){
			$F["id"] = $ambil->id;
			$F["paket"] = $ambil->paket;
			$F["keranjang"] = $ambil->keranjang;
			array_push($response["data"], $F);
		}
	}
	else{
		$response["kode"]  = 0;
		$response["pesan"]  = "Data tidak tersedia";
	}
}
else{
	$response["kode"]  = 0;
	$response["pesan"]  = "Tidak ada post data";
}

echo json_encode($response);
mysqli_close($konek);