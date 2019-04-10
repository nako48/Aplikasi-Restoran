<?php
$host = "localhost";
$user = "ujikom1";
$pass = "kmz967zh72";
$db="restoran";
$koneksi =@mysql_connect($host, $user, $pass) or die (mysql_error());
if(!$koneksi){
echo 'GAGAL';
exit();	
}
$pilihdb =@mysql_select_db($db, $koneksi);
if(!$pilihdb){
exit('GAGAL');	
}
?>