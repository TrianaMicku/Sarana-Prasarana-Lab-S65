<?php 
require_once '../koneksi.php'; 
require_once '../layouts/_header.php'; 
?>
<div class="container"><br><br>
	<h2>Input Data Supervisor</h2>

	<caption>
	<a href="index.php" class="btn btn-primary">Data Supervisor</a>
	</caption>

	<form action="" method="post">
		<div class="col-md-6 col-centered">

			<div class="form-group">
				<label>Nama Supervisor</label>
				<input type="text" class="form-control" name="nama_sup" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
			</div>
	<?php
	if(isset($_POST['simpan'])){
		
		$insert = mysqli_query($conn, "INSERT INTO tb_sup VALUES
			(null,
			'".ucfirst($_POST['nama_sup'])."')");
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>