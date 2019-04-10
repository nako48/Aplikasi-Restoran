<?php
require_once('../koneksi.php');
$nameusr = $_POST['nama_lengkap'];
$usern = $_POST['uname'];
$passwd = $_POST['passwd'];
$level = $_POST['level'];
if(in_array($usern, [hex2bin("5c"), "|", "#"]) or in_array($passwd, [hex2bin("5c"), "|", "#"])){
	header('location: index.php?error=karakter');	
}
$cekuser = mysql_query("SELECT * FROM user WHERE username='$username'");
$id_user = $row['id_user'];
if(mysql_num_rows($cekuser) ==1){
	header('location: index.php?error=1');
}else{
	if(!$nameusr || !$usern || !$passwd ||!$level){
		header('location: index.php?error=3');	
	}else{
		$simpan=1;
		if($simpan){
			$query = mysql_query("INSERT INTO user (id_user, username, password, nama_user, id_level) VALUES ('', '$usern', '$passwd', '$nameusr', '$level')");
			if($query == 1){
				exit(header('location: index.php?error=0'));	
			}else{
				exit(header('location: index.php?error=2'));	
			}
		}else{
			header('location: index.php?error=4');
		}
	}
}
?>