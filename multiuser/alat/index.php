<?php require_once '../layouts/_header.php'; ?>

<div class="container"><br><br>
	<h2>Data Alat</h2>
	<table class="table table-stripped table-bordered">
		<caption>
			<a href="form-input-alat.php" class="btn btn-primary">Tambah alat</a>
		</caption>
		<tr style="text-align: center; font-weight:bold; background-color: #eee;">
			<td>No</td>
			<td>Nama User</td>
			<td>Nama Alat</td>
			<td>Ruang</td>
			<?php if($_SESSION['role'] == 'admin'){ ?>
			<td>Opsi</td>
			<?php } ?>
		</tr>
		<?php  
		require_once '../koneksi.php';
		$no = 1 ;
		$select = mysqli_query($conn, "SELECT tb_alat.*, tb_user.username AS nama_user, tb_ruang.nama_ruang AS ruang FROM tb_alat 
			INNER JOIN tb_user ON tb_alat.user_id = tb_user.nip
			INNER JOIN tb_ruang ON tb_alat.ruang_id = tb_ruang.id");
		if(mysqli_num_rows($select) > 0){
		while($hasil = mysqli_fetch_array($select)){
		?>
		<tr style="text-align: center;">
			<td><?php echo $no++ ?></td>
			<td><?php echo $hasil['nama_user'] ?></td>
			<td><?php echo $hasil['nama_alat'] ?></td>
			<td><?php echo $hasil['ruang'] ?></td>
			<?php if($_SESSION['role'] == 'admin'){ ?>
			<td>
				<a href="edit.php?kode_alat=<?php echo $hasil['kode_alat'] ?>">Edit</a> ||
				<a href="delete.php?kode_alat=<?php echo $hasil['kode_alat'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ?');">Hapus</a>
			</td>
			<?php } ?>
		</tr>	
		<?php }}else{?>	
			
		<?php } ?>
</table>
</div>
<script src="../js/bootstrap.min.js"></script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>
</body>
</html>