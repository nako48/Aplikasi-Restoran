<?php
$host = "localhost";
$username = "ujikom1";
$password = "kmz967zh72";
$dbname = "restoran";
$con=@mysql_connect($host, $username, $password, $dbname) or die(mysql_error());
if(!$con){
echo "GAGAL MENGKONEKSIKAN";	
exit();
}
$pilihdb = @mysql_select_db($dbname, $con);
if(!$pilihdb){
exit("GAGAL MENGKONEKSIKAN");	
}
?>