<?php
require_once('../koneksi.php');
$id_masakan=$_POST['idmsk'];
if(!$id_masakan){
	header('location: delete.php?error=3');	
}else{
	$query = mysql_query("SELECT * FROM masakan WHERE id_masakan='".$id_masakan."'");
	if(mysql_num_rows($query) == 0){
		exit(header('location: delete.php?error=2'));
	}
	$query=mysql_query("DELETE FROM masakan WHERE id_masakan='$id_masakan'");
	if($query){
		header('location: delete.php?error=0');	
	}else{
		exit(header('location: delete.php?error=1'));	
	}
}
?>