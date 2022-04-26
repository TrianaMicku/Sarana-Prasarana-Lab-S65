<?php
require_once '../koneksi.php'; 
require_once '../layouts/_header.php'; 
?>
<div class="container"><br><br>

	<h2>Input Data Alat</h2>
	<a href="index.php" class="btn btn-primary">Data alat</a>

	<form action="" method="post">

		<div class="col-md-6 col-centered">
			<div class="form-group">
				<label>Nama Alat</label>
				<input type="text" class="form-control" name="nama_alat" required>
			</div>
			<div class="form-group">
				<label>Ruang alat</label>
				<select name="ruang" class="form-control" required>
					<?php 
					$sql = mysqli_query($conn, "SELECT * FROM tb_ruang");
					while($row = mysqli_fetch_array($sql)){
					?>
					<option value="<?php echo $row['id'] ?>"><?php echo $row['nama_ruang'] ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
			</div>
			<?php
			if(isset($_POST['simpan'])){
				$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='".$_SESSION['username']."' ");
				$row = mysqli_fetch_assoc($result);
				$insert = mysqli_query($conn, "INSERT INTO tb_alat VALUES
						(null,
						'".strtolower($_POST['nama_alat'])."',
						'".$_POST['ruang']."',
						'".$row['nip']."')");
					if($insert){
						echo header('location:index.php');
					}else{
						echo 'gagal disimpan' .mysqli_error($conn);
					}
			}
			?>
		</div>
	</form>

</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>
