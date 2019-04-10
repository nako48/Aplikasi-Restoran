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
$perintah = "SELECT * FROM masakan";
$query=mysql_query($perintah, $koneksi);
?>
<?php if ($admin==1){?>
<div class="row row-sm mg-t-20">
	<div class="col-xl-6">
		<div class="card pd-20 pd-sm-40 form-layout form-layout-4">
			<h6 class="card-body-title">Form - Edit</h6>
		</br>
		<form action="prosesedit.php" method="POST">
			<div class="row">
				<label class="col-sm-4 form-control-label">ID_Masakan: <span class="tx-danger">*</span></label>
				<div class="col-sm-8 mg-t-10 mg-sm-t-0">
					<input type="text" name="masakan_id" class="form-control" placeholder="Masukan ID_Masakan">
				</div>
			</div><!-- row -->
				<!-- row <div class="row">
					<label class="col-sm-4 form-control-label">Status Masakan: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<select name="status_m" class="form-control input-sm">
							<option value="Tersedia">Coming Soon !</option>
							<option value="TidakTersedia">Tidak Tersedia</option>
						</select>
					</div>
				</div>-->
				<div class="row mg-t-20">
					<label class="col-sm-4 form-control-label">Nama_Masakan: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="text" name="nama_masakan" class="form-control" placeholder="Masukan Nama Masakan">
					</div>
				</div><!-- row -->
				<div class="row mg-t-20">
					<label class="col-sm-4 form-control-label">Harga_Masakan: <span class="tx-danger">*</span></label>
					<div class="col-sm-8 mg-t-10 mg-sm-t-0">
						<input type="text" name="harga" class="form-control" placeholder="Masukan Harga">
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
			<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Result Edit</h6>
			<center>
				<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "1"){
						echo "Penambahan Data Gagal!"; 
					}else if($_GET['error'] == "2"){
						echo "Edit Sudah Ada !"; 
					}else if($_GET['error'] == "0"){
						echo "Edit Data Berhasil!"; 	
					}else if($_GET['error'] == "3"){
						echo "Masukan Data Dengan Benar!"; 
					}
				}
				?>
			</center>
		</div>
	</div></div><br>
	<div class="card pd-20 pd-sm-40">
		<h6 class="card-body-title">List Database Masakan</h6>
		<div class ="table-responsive m-b-40">
			<div class="table-wrapper">
				<table id="datatable1" class="table display responsive nowrap">
					<thead>
						<tr>
							<th class="wd-15p">NO </th>
							<th class="wd-15p">ID MASAKAN </th>
							<th class="wd-15p">NAMA MASAKAN </th>
							<th class="wd-20p">HARGA </th>
						</tr>
						<?php
						include('../koneksi.php');
						$select = "select * from masakan";
						$query = mysql_query($select);
						$no=0;
						while($data = mysql_fetch_array($query)){
							$nama = $data['nama_masakan'];
							$id_masakan = $data['id_masakan'];
							$harga = $data['harga'];
							$no ++;
						echo"
						</thead>
						<tbody>
						
						<tr>
						<td>$no</td>
						<td>$id_masakan</td>
						<td>$nama</td>
						<td>$harga</td>
						</tr>
						</tbody>";
					}
					?>
				</table>
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