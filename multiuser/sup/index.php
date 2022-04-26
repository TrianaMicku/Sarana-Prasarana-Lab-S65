<?php require_once '../layouts/_header.php'; ?>
<div class="container"><br><br>
	<h2>Data Supervisor</h2>
	<table class="table table-stripped table-bordered">
	<caption>
		<a href="input.php" class="btn btn-primary">Tambah Data</a>
	</caption>
		<tr style="text-align: center; font-weight:bold; background-color: #eee;">
			<td>No </td>
			<td>Nama Supervisor</td>
			<?php if($_SESSION['role'] == 'admin'){ ?>
			<td>Opsi</td>
			<?php } ?>
		</tr>
		<?php  
		require_once '../koneksi.php';
		$no = 1 ;
		$select = mysqli_query($conn, "SELECT * FROM tb_sup");
		while($hasil = mysqli_fetch_array($select)){

		?>
		<tr style="text-align: center;">
			<td><?php echo $no++ ?></td>
			<td><?php echo $hasil['nama_sup'] ?></td>
			<?php if($_SESSION['role'] == 'admin'){ ?>
			<td>
				<a href="edit.php?id=<?php echo $hasil['id'] ?>">Edit</a> ||
				<a href="delete.php?id=<?php echo $hasil['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ?');">Hapus</a>
			</td>
			<?php } ?>
		</tr>	
		<?php 
		}
		 ?>	
	</table>
</div><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once '../layouts/_footer.php'; ?>
