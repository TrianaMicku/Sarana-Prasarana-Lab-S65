<?php 
require_once '../koneksi.php';
require_once '../layouts/_header.php';
$data_edit = mysqli_query($conn, "SELECT * FROM tb_ppr WHERE id ='".$_GET['id']."' ");
$result = mysqli_fetch_array($data_edit);
?>

<div class="container"><br><br>

	<h2>Edit Data PPR</h2>
	<a href="index.php" class="btn btn-primary">Data PPR</a>

	<form action="" method="post">

		<div class="col-md-6 col-centered">
			<div class="form-group">
				<label>Nama PPR</label>
				<input type="text" class="form-control" name="nama_ppr" value="<?php echo $result['nama_ppr'] ?>" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="edit">Simpan</button>
			</div>

			<?php 
				if(isset($_POST['edit'])){
					$update = mysqli_query($conn, "UPDATE tb_ppr SET
						nama_ppr = '".$_POST['nama_ppr']."' WHERE id = '".$_GET['id']."' ");
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>