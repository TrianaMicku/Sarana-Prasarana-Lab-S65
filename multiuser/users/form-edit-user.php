<?php 
require_once '../koneksi.php';
require_once '../layouts/_header.php';
$data_edit = mysqli_query($conn, "SELECT * FROM tb_user WHERE nip = '".$_GET['id']."' ");
$result = mysqli_fetch_array($data_edit);

 ?>
<div class="container"><br><br>
	<h2>Edit Data User</h2>

	<caption>
		<a href="index.php" class="btn btn-primary">Data User</a>
	</caption>

	<form action="" method="POST">
		<div class="col-md-6 col-centered">

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" value="<?php echo $result['username'] ?>" required>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="text" name="password" class="form-control" value="<?php echo $result['password'] ?>" required>
		</div>
			
		<div class="form-group">
			<label>Level</label>
				<select name="level" class="form-control">
				<?php 
				$sql = mysqli_query($conn, "SELECT * FROM tb_role");
				while($row = mysqli_fetch_array($sql)){
				?>
				<option value="<?= $row['id'] ?>" <?= $row['id'] == $result['role_id'] ? "selected" : null ?>><?= $row['nama_role'] ?></option>
				<?php } ?>
				</select>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary" name="edit">Simpan</button>
		</div>
		
	</div>
	</form>
	<?php
	if(isset($_POST['edit'])){
		$update = mysqli_query($conn, "UPDATE tb_user SET
				username = '".$_POST['username']."',
				password = '".$_POST['password']."',
				role_id = '".$_POST['level']."'
				WHERE nip = '".$_GET['id']."' ");
		if($update){
			header('location:index.php');
		}else{
			echo 'Gagal Edit' .mysql_error($conn);
		}

	}
	 ?>
	 </div><br><br><br><br><br><br><br><br><br><br>
	 <?php require_once '../layouts/_footer.php'; ?>
</body>
</html>