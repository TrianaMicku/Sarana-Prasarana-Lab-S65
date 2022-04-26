<?php require_once '../layouts/_header.php'; ?>
<div class="container"><br><br>
	<h2>Data user</h2>
	<table class="table table-stripped table-bordered">
	<caption>
		<a href="form-input-user.php" class="btn btn-primary">Tambah Data</a>
	</caption>

		<tr style="text-align: center; font-weight:bold; background-color: #eee;">
			<td>No </td>
			<td>Username</td>
			<td>Password</td>
			<td>Level</td>
			<td>Opsi</td>
		</tr>
		<?php  
		require_once '../koneksi.php';
		$no = 1 ;
		$select = mysqli_query($conn, "SELECT tb_user.*, tb_role.nama_role AS role FROM tb_user LEFT OUTER JOIN tb_role ON tb_user.role_id = tb_role.id");
		while($hasil = mysqli_fetch_array($select)){

		?>
		<tr style="text-align: center;">
			<td><?php echo $no++ ?></td>
			<td><?php echo $hasil['username'] ?></td>
			<td><?php echo $hasil['password'] ?></td>
			<td><?php echo $hasil['role'] ?></td>
			<td>
				<a href="form-edit-user.php?id=<?php echo $hasil['nip'] ?>">Edit</a> ||
				<a href="delete-user.php?id=<?php echo $hasil['nip'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ?');">Hapus</a>
			</td>
		</tr>	
		<?php } ?>	
	</table>
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>