<?php
session_start();
require_once('../koneksi.php');
session_start();
$username = $_POST['mail'];
$username = mysql_escape_string($username);
$pass = $_POST['pass'];
$cekuser = mysql_query("SELECT * FROM user WHERE username='$username'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
if($jumlah == 0){
header('location: index.php?error=1');	// jika data tidak ada
}else{
	if($pass <> $hasil['password']){
header('location: index.php?error=2'); // jika password salah
}else{
	$_SESSION['username'] = $username;
	header('location: /users/index.php');
}
}
?>