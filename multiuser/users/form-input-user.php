<?php 
require_once '../koneksi.php'; 
require_once '../layouts/_header.php'; 
?>
<div class="container"><br><br>
	<h2>Input Data User</h2>

	<caption>
	<a href="index.php" class="btn btn-primary">Data User</a>
	</caption>

	<form action="" method="post">
		<div class="col-md-6 col-centered">

			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" required>
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" required>
			</div>

			<div class="form-group">
				<label>Level</label>
				<select name="level" class="form-control">
					<?php 
					$sql = mysqli_query($conn, "SELECT * FROM tb_role");
					while($row = mysqli_fetch_array($sql)){
					?>
					<option value="<?= $row['id'] ?>"><?= $row['nama_role'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>

	<?php
	if(isset($_POST['simpan'])){
		if (mysqli_query($conn, "SELECT username FROM tb_user WHERE username='".$_POST['username']."'")->num_rows > 0) {
			echo "username telah digunakan";
		}else{
			$insert = mysqli_query($conn, "INSERT INTO tb_user VALUES
				(null,
				'".ucfirst($_POST['username'])."',
				'".strtolower($_POST['password'])."',
				'".$_POST['level']."')");
			if($insert){
				echo header('location:index.php');
			}else{
				echo 'gagal disimpan' .mysqli_error($conn);
			}
		}
	}
	?>
</div>
		</div>
	</form>
</div>
<br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>