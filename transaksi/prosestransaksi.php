<?php 
include('../koneksi.php');
$id_order=$_POST['id_order'];
$que=mysql_query("SELECT Sum(total_bayar) as jumlah From transaksi WHERE id_order='$id_order'");
$data= mysql_fetch_array($que);
header('location: index.php?error=0');
?>