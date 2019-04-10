<?php
include('../koneksi.php');
$select = "select * from transaksi, user where transaksi.id_user = user.id_user";
$query = mysql_query($select);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
		<tr class="tableheader">
			<th rowspan="1">Nama_User</th>
			<th>ID_Order</th>
			<th>Total Bayar</th>
		</tr>	
		<?php while($hasil = mysql_fetch_array($query)){ ?>
			<tr id="rowHover">
				<td width="10%" align="center"><?php echo $hasil['nama_user']; ?></td>
				<td width="25%" id="column_padding"><?php echo $hasil['id_order']; ?></td>
				<td width="10%" id="column_padding"><?php echo $hasil['total_bayar']; ?></td>
			</tr>
		<?php }?>
	</table>
	<script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>