<?php
require_once('../koneksi.php');
$id_user = $_POST['id_user'];
$tanggal = date("y-m-d");
$keterangan = $_POST['keterangan'];
$id_masakan = $_POST['id_masakan'];
$nomej = $_POST['nomej'];
$jumlah = $_POST['jumlah'];
$random=rand(11111111,99999999);
if(!$id_user || !$keterangan || !$id_masakan || !$nomej || !$jumlah){
	header('location: index.php?error=3');	
}else{
$cekuser = mysql_query("SELECT * FROM user WHERE username='$username'");
if(mysql_num_rows($cekuser) ==1){
	exit(header('location: index.php?error=1!@#!@#'));
}
$cekHarga = mysql_query("SELECT harga From masakan WHERE id_masakan='$id_masakan'");
if(mysql_num_rows($cekHarga) == 0){
	exit(header('location: index.php?error=1!@#!@#'));	
}
$f = mysql_fetch_array($cekHarga);
$total = $f['harga']*$jumlah;
$query1=mysql_query("INSERT INTO transaksi (id_transaksi, id_user, id_order, tanggal, jumlah, total_bayar, no_meja, id_masakan) VALUES ('', '$id_user', '$random', '$tanggal', '$jumlah', '$total', '$nomej', '$id_masakan')");
if($query1){
	$query2="INSERT INTO `order`(`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`) VALUES ('$random','$nomej', '$tanggal', '$id_user', '$keterangan', 'PENDING')";	
	$q2 = mysql_query($query2);
	if($query2){
		$query3="INSERT INTO `detail_order`(`id_detail_order`, `id_order`, `id_masakan`, `keterangan`, `no_meja`, `status_detail_order`, `id_user` ) VALUES ('','$random', '$id_masakan', '$keterangan', '$nomej', 'PENDING', '$id_user')";	
		$q3 = mysql_query($query3);
		if($query3){
			echo "<script> window.location.href = 'index.php?error=0';</script>";
			header('location: index.php?error=0');
			exit();	
		}else{
			echo "<script> window.location.href = 'index.php?error=0';</script>";
			header('location: index.php?error=2');
			exit();		
		}
		echo "<script> window.location.href = 'index.php?error=0';</script>";
		header('location: index.php?error=2');
		exit();	
	}
}
}
?>	