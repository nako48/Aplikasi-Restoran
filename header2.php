<?php
error_reporting(0);
session_start();
if(empty($_SESSION['username'])){
	exit(header('location: /login/index.php'));	
}
include('../koneksi.php');
$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username='$username'";
$exe = mysql_query($query);
while($row = mysql_fetch_assoc($exe)){
	$admin = $row['id_level'];
	$nama = $row['nama_user'];
	$id_user = $row['id_user'];	
  $userrna = $row['username']; 
}
if($admin==1){
	$statusnya='administrator';	
}else if($admin==2){
	$statusnya='waiter';	
}else if($admin==3){
	$statusnya='kasir';	
}else if($admin==4){
	$statusnya='owner';	
}else if($admin==5){
	$statusnya='pelanggan';
}
?>