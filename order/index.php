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
$perintah = "SELECT * FROM masakan";
$query=mysql_query($perintah, $koneksi);
?>
<?php if ($admin==1 || $admin==2 ||$admin==5){?>
	<div class="row row-sm mg-t-20">
		<div class="col-xl-6">
			<div class="card pd-20 pd-sm-40 form-layout form-layout-4">
				<h6 class="card-body-title">Form - Order</h6>
				<form action="prosesorder.php" method="POST">
					<div class="row">
						<input type="hidden" name="id_user" value="<?php echo $id_user;?>"/>
						<label class="col-sm-4 form-control-label">No Meja: <span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" name="nomej" class="form-control" placeholder="Masukan No Meja">
						</div>
					</div>
					<div class="row mg-t-20">
						<label class="col-sm-4 form-control-label">Keterangan: <span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan">
						</div>
					</div>
					<div class="row mg-t-20">
						<label class="col-sm-4 form-control-label">Nama Masakan: <span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<select name="id_masakan" class="form-control input-sm">
								<?php while($data=mysql_fetch_array($query)){?>
									<option value="<?php echo $data['id_masakan'];?>"><?php echo $data['nama_masakan'];?> (<?php echo $data['id_masakan'];?>) - RP.<?php echo $data['harga'];?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="row mg-t-20">
						<label class="col-sm-4 form-control-label">Jumlah: <span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" name="jumlah" class="form-control" placeholder="Masukan Jumlah">
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
				<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Result Order</h6>
				<center>
					<?php
					if(isset($_GET['error'])){
						if($_GET['error'] == "karakter"){
							echo "Maaf Karakter dilarang!"; 
						}else if($_GET['error'] == "2"){
							echo "Order Gagal!"; 
						}else if($_GET['error'] == "0"){
							echo "Order Berhasil!"; 	
						}else if($_GET['error'] == "3"){
							echo "Masukan Data Dengan Benar!"; 
						}
					}
					?>
			</center>
			</div><!-- table-wrapper -->
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