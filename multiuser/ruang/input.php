<?php 
require_once '../koneksi.php'; 
require_once '../layouts/_header.php'; 
?>
<div class="container"><br><br>
	<h2>Input Data Ruang</h2>

	<caption>
	<a href="index.php" class="btn btn-primary">Data Ruang</a>
	</caption>

	<form action="" method="post">
		<div class="col-md-6 col-centered">

			<div class="form-group">
				<label>Nomor ruang</label>
				<input type="text" class="form-control" name="nomor_ruang" required>
			</div>

			<div class="form-group">
				<label>Nama ruang</label>
				<input type="text" class="form-control" name="nama_ruang" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
			</div>
	<?php
	if(isset($_POST['simpan'])){
		
		$insert = mysqli_query($conn, "INSERT INTO tb_ruang VALUES
			(null,
			'".strtoupper($_POST['nomor_ruang'])."',
			'".ucfirst($_POST['nama_ruang'])."')");
		if($insert){
			echo header('location:index.php');
		}else{
			echo 'gagal disimpan' .mysqli_error($conn);
		}
		
	}
	?>
		</div>
	</form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>