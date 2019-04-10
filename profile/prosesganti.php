<?php
if(!isset($_POST['id_user']) && !isset($_POST['pwbaru'])){
	exit();
}
require_once('../koneksi.php');
$id_user = $_POST['id_user'];
$passb = $_POST['pwbaru'];
if(!$id_user || !$passb){
	header('location: edit.php?error=3');	
}else{
	$query = mysql_query("SELECT * FROM user WHERE id_user='".$id_user."'");
	if(mysql_num_rows($query) == 0){
		exit(header('location: index.php?error=2'));
	}
	$query = mysql_query("UPDATE user SET password='$passb' WHERE id_user = '$id_user'");
	if($query){
		header('location: index.php?error=0'); // proses berhasil	
	}else{
		exit(header('location: index.php?error=1'));	
	}
}
?>