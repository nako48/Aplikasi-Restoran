<?php
require_once('../koneksi.php');
$nama_m = $_POST['nama_m'];
$harga = $_POST['harga'];
$status_m = $_POST['status_m'];
$random=rand(11111111,99999999);
if(in_array($usern, [hex2bin("5c"), "|", "#"]) or in_array($passwd, [hex2bin("5c"), "|", "#"])){
	header('location: index.php?error=karakter');	
} // anti bypass sql
$cekuser = mysql_query("SELECT * FROM user WHERE username='$username'");
$id_user = $row['id_user'];
if(mysql_num_rows($cekuser) ==1){
	header('location: index.php?error=1');
}else{
	if(!$nama_m || !$harga || !$status_m || !$random){
		header('location: index.php?error=3');	// jika ada data yang tidak di input maka error
	}else{
		$simpan=1;
		if($simpan){
			$query = mysql_query("INSERT INTO masakan (id_masakan, nama_masakan, harga, status_makanan) VALUES ('$random', '$nama_m', '$harga', '$status_m')");
			if($query == 1){
				exit(header('location: index.php?error=0'));	// proses berhasil
			}else{
				exit(header('location: index.php?error=2'));	// else proses tidak berhasil
			}
		}else{
			header('location: index.php?error=4');
		}
	}
}
?>