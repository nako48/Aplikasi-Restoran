<?php
include('../users/header2.php');
session_start();
error_reporting(0);
if(empty($_SESSION['username'])){
	echo 'login dulu';
	exit;	
}
include('../koneksi.php');
$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username='$username'";
$exe=mysql_query($query);
while($row = mysql_fetch_assoc($exe)){
	$admin= $row['id_level'];
	$id_user= $row['id_user'];
}
?>
<?php
include('../hakata.php');
$perintah = "SELECT * FROM masakan order by id_masakan DESC";
$query=@mysql_query($perintah, $koneksi);
?>
<?php
include('../koneksi.php');
$select2 = "select * from detail_order WHERE id_user ='$id_user'";
$query = mysql_query($select2);
$no=0;
while($data = mysql_fetch_array($query)){
	$meja = $data['no_meja'];
}
?>
<?php if ($admin==1 || $admin==3 || $admin==4){?>
	<div class="card pd-20 pd-sm-40">
		<h6 class="card-body-title">List Order</h6>
		<div class ="table-responsive m-b-40">
			<div class="table-wrapper">
				<table id="datatable1" class="table display responsive nowrap">
					<thead>
						<tr>
							<th class="wd-15p">NO </th>
							<th class="wd-15p">NAMA USER </th>
							<th class="wd-15p">ID_ORDER </th>
							<th class="wd-15p">TOTAL BAYAR</th>
						</tr>
						<?php
						include('../koneksi.php');
						$select = "select * from transaksi, user where transaksi.id_user = user.id_user";
						$query = mysql_query($select);
						$no=0;
						while($data = mysql_fetch_array($query)){
							$nama_user = $data['nama_user'];
							$id_order = $data['id_order'];
							$total_bayar = $data['total_bayar'];
							$no ++;
							echo"
							</thead>
							<tbody>
							<tr>
							<td>$no</td>
							<td>$id_user</td>
							<td>$id_order</td>
							<td>$total_bayar</td>
							</tr>
							</tbody>";
						}
						?>
					</table>
					<?php 
					include('../koneksi.php');
					$que=mysql_query("SELECT Sum(total_bayar) as jumlah From transaksi WHERE id_user='$id_user'");
					$data= mysql_fetch_array($que);
					echo "Total Yang Harus Dibayar: ";
					echo $data['jumlah'];
					?>
				</div><!-- table-wrapper -->
				<br>
			<a href="generate.php" class="btn btn-info">Print Data</a>
			</div><!-- card -->
		</div></div></div></div>
		<script src="../lib/jquery/jquery.js"></script>
		<script src="../lib/popper.js/popper.js"></script>
		<script src="../lib/bootstrap/bootstrap.js"></script>
		<script src="../lib/jquery-ui/jquery-ui.js"></script>
		<script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
		<script src="../lib/highlightjs/highlight.pack.js"></script>
		<script src="../lib/select2/js/select2.min.js"></script>

		<script src="../js/starlight.js"></script>
		<script>
			$(function(){
				'use strict';

				$('.select2').select2({
					minimumResultsForSearch: Infinity
				});
			})
		</script>
	</body>
	</html>
	<?php }?> 