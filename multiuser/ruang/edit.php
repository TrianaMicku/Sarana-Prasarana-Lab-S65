<?php 
require_once '../koneksi.php';
require_once '../layouts/_header.php';
$data_edit = mysqli_query($conn, "SELECT * FROM tb_ruang WHERE id ='".$_GET['id']."' ");
$result = mysqli_fetch_assoc($data_edit);
?>

<div class="container"><br><br>

	<h2>Edit Data Ruang</h2>
	<a href="index.php" class="btn btn-primary">Data Ruang</a>

	<form action="" method="post">

		<div class="col-md-6 col-centered">

			<div class="form-group">
				<label>Nomor Ruang</label>
				<input type="text" class="form-control" name="nomor_ruang" value="<?php echo $result['nomor_ruang']; ?>" required>
			</div>
			<div class="form-group">
				<label>Nama Ruang</label>
				<input type="text" class="form-control" name="nama_ruang" value="<?php echo $result['nama_ruang']; ?>" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="edit">Simpan</button>
			</div>

			<?php 
				if(isset($_POST['edit'])){
					$update = mysqli_query($conn, "UPDATE tb_ruang SET
							nomor_ruang = '".$_POST['nomor_ruang']."',
							nama_ruang = '".$_POST['nama_ruang']."' 
							WHERE id = '".$_GET['id']."' "); 
						if($update){
							header('location:index.php');
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