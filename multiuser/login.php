<?php 
	session_start();
	if (isset($_SESSION['username'])) {
	header('location:index.php');
}
	require_once 'koneksi.php';
	if (isset($_POST['login'])) {
		$username =  strtolower($_POST['username']);
		$password =  strtolower($_POST['password']);
		$result = mysqli_query($conn, "SELECT tb_user.*, tb_role.nama_role AS role FROM tb_user LEFT OUTER JOIN tb_role ON tb_user.role_id = tb_role.id WHERE username= '".$username."' AND password='".$password."'");
		if($result->num_rows > 0){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['role'] = $row['role'];
			$_SESSION['username'] = $row['username'];
			header('location:index.php');
		}else{
			echo "<script>alert('login gagal');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<div class="halaman">
		<div class="header">
			<div class="logo">
				<div class="namasekolah">
				<h2 style="width: 970px; height: 100px; padding-top: 30px;">Log sheet Pengoperasian Perawatan Peralatan IEBE</h2>
				<h4 style="padding-left: 280px; padding-top:20px;">Pusat Teknologi Bahan Bakar Nuklir - BATAN</h4>
					<img src="Logo_Baru_BATAN.png" style="padding-right: 20px;">
					
				</div>
				
			</div>
			
		</div>

<div class="container">
		<br><br><br><br><br>
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
					<button type="submit" class="btn btn-primary" name="login">Login</button>
				</div>
			</div>
		</form>
	</div><br><br><br><br><br><br><br><br><br>

		<div class="footer">
		<p style="font-size: 12px; font-family: sans-serif; text-align: center;">Copyright &copy; 2018 SMK Al-Amanah. Developed by Triana Micku & Salsabila Putri</p>
		</div>


<script type="text/javascript"></script>
</body>
</html>

