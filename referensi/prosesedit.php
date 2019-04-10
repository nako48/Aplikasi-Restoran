<?php
if(!isset($_POST['masakan_id']) && !isset($_POST['nama_masakan']) && !isset($_POST['harga'])){
	exit();
}
require_once('../koneksi.php');
$masakan_id = $_POST['masakan_id'];
$nama_masakan = $_POST['nama_masakan'];
$harga = $_POST['harga'];
if(!$masakan_id || !$nama_masakan || !$harga){
	header('location: edit.php?error=3');	
}else{
	$query = mysql_query("SELECT * FROM masakan WHERE id_masakan='".$masakan_id."'");
	if(mysql_num_rows($query) == 0){
		exit(header('location: edit.php?error=2'));
	}
	$query = mysql_query("UPDATE masakan SET nama_masakan='$nama_masakan', harga='$harga' WHERE id_masakan = '$masakan_id'");
	if($query){
		header('location: edit.php?error=0'); // proses berhasil	
	}else{
		exit(header('location: edit.php?error=1'));	
	}
}
?>