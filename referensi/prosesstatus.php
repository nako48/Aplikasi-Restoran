<?php
if(!isset($_POST['id_order']) && !isset($_POST['status_m'])){
	exit();
}
require_once('../koneksi.php');
$id_order = $_POST['id_order'];
$status = $_POST['status_m'];
if(!$id_order || !$status){
	header('location: edit.php?error=3');	
}else{
	$query = mysql_query("SELECT * FROM detail_order WHERE id_order='".$id_order."'");
	if(mysql_num_rows($query) == 0){
		exit(header('location: status.php?error=2'));
	}
	$query = mysql_query("UPDATE detail_order SET status_detail_order='$status' WHERE id_order = '$id_order'");
	if($query){
		header('location: status.php?error=0'); // proses berhasil	
	}else{
		exit(header('location: status.php?error=1'));	
	}
}
?>