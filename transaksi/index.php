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
}
?>
<?php
include('../hakata.php');
$perintah = "SELECT * FROM level order by id_level DESC";
$query=@mysql_query($perintah, $koneksi);
?>
<?php if ($admin==1 || $admin==3){?>
	<div class="row row-sm mg-t-20">
		<div class="col-xl-6">
			<div class="card pd-20 pd-sm-40 form-layout form-layout-4">
				<h6 class="card-body-title">Form - Transaksi</h6>
				<form action="" method="GET">
					<div class="row">
						<label class="col-sm-4 form-control-label">Masukan ID_ORDER: <span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" name="id_order" class="form-control" placeholder="Masukan ID_ORDER">
						</div>
					</div>
					<div class="form-layout-footer mg-t-30">
						<button type="submit" class="btn btn-info mg-r-5">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xl-6 mg-t-25 mg-xl-t-0">
			<div class="card pd-20 pd-sm-40 form-layout form-layout-5">
				<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Result Daftar</h6>
				<center>
					<?php 
					error_reporting(0);
					include('../koneksi.php');
					$id_order=$_GET['id_order'];
					$que=mysql_query("SELECT Sum(total_bayar) as jumlah From transaksi WHERE id_order='$id_order'");
					$data= mysql_fetch_array($que);
					echo "Total Yang Harus Dibayar: ";
					echo $data['jumlah'];
					?>
				</center>
			</div>
		</div>
	</div>
</div>
</div>
</div>
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