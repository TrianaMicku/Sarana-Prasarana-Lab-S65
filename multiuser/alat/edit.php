<?php 
require_once '../koneksi.php';
require_once '../layouts/_header.php';
$result = mysqli_query($conn, "SELECT * FROM tb_alat WHERE kode_alat ='".$_GET['kode_alat']."' ");
$hasil = mysqli_fetch_assoc($result);
?>
<div class="container"><br><br>

	<h2>Edit Data Alat</h2>
	<a href="index.php" class="btn btn-primary">Data alat</a>

	<form action="" method="post">

		<div class="col-md-6 col-centered">
			<div class="form-group">
				<label>Nama Alat</label>
				<input type="text" class="form-control" name="nama_alat" value="<?php echo $hasil['nama_alat']; ?>" required>
			</div>

			<div class="form-group">
				<label>Ruang Alat</label>
				<select name="ruang" class="form-control" required>
					<?php 
					$sql = mysqli_query($conn, "SELECT * FROM tb_ruang");
					while($row = mysqli_fetch_array($sql)){
					?>
					<option value="<?php echo $row['id'] ?>" <?php echo $row['id'] == $hasil['ruang_id'] ? "selected" : null ?>><?php echo $row['nama_ruang'] ?></option>
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
					$insert = mysqli_query($conn, "UPDATE tb_alat SET 
							nama_alat = '".$_POST['nama_alat']."',
							ruang_id = '".$_POST['ruang']."',
							user_id = '".$row['nip']."'
							WHERE kode_alat ='".$_GET['kode_alat']."'"); 
						if($insert){
							header('location:index.php');
						}else{
							echo 'gagal disimpan' .mysqli_error($conn);
						}
				}
			?>
		</div>
	</form>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>
