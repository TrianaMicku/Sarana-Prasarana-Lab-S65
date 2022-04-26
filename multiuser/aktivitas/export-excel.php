<?php 
require_once '../koneksi.php';
if (isset($_GET['from-date']) && isset($_GET['to-date'])) {
	$result = mysqli_query($conn, "SELECT tb_aktivitas.*, tb_sup.nama_sup AS supervisor, tb_ppr.nama_ppr AS ppr, tb_alat.nama_alat AS alat FROM tb_aktivitas INNER JOIN tb_sup ON tb_sup.id = tb_aktivitas.id_sup INNER JOIN tb_ppr ON tb_ppr.id = tb_aktivitas.id_ppr INNER JOIN tb_alat ON tb_alat.kode_alat = tb_aktivitas.kode_alat WHERE tb_aktivitas.aktivitas= '".$_GET['aktivitas']."' AND tb_aktivitas.tanggal >= '".$_GET['from-date']."' AND tb_aktivitas.tanggal <= '".$_GET['to-date']."'");

}else{
	$result = mysqli_query($conn, "SELECT tb_aktivitas.*, tb_sup.nama_sup AS supervisor, tb_ppr.nama_ppr AS ppr, tb_alat.nama_alat AS alat FROM tb_aktivitas INNER JOIN tb_sup ON tb_sup.id = tb_aktivitas.id_sup INNER JOIN tb_ppr ON tb_ppr.id = tb_aktivitas.id_ppr INNER JOIN tb_alat ON tb_alat.kode_alat = tb_aktivitas.kode_alat WHERE tb_aktivitas.aktivitas='".$_GET['aktivitas']."'");
}
header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=data-aktivitas.xls");
?>
<table border="1">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Nama Aktivitas</th>
		<th>Operator</th>
		<th>Hasil</th>
		<th>Alat</th>
		<th>Supervisor</th>
		<th>PPR</th>
	</tr>
	<?php  
	if (isset($_GET['from-date']) && isset($_GET['to-date'])) {
		$x = 1; 
		while ($row = mysqli_fetch_assoc($result)) {
	?>
	<tr>
		<td><?php echo $x++; ?></td>
		<td><?php echo $row['tanggal'] ?></td>
		<td><?php echo $row['aktivitas'] ?></td>
		<td><?php echo $row['operator'] ?></td>
		<td><?php echo $row['hasil'] ?></td>
		<td><?php echo $row['alat'] ?></td>
		<td><?php echo $row['supervisor'] ?></td>
		<td><?php echo $row['ppr'] ?></td>
	</tr>
	<?php }} else{ 
		$row = mysqli_fetch_assoc($result);
	?>
	<tr>
		<td>1</td>
		<td><?php echo $row['tanggal'] ?></td>
		<td><?php echo $row['aktivitas'] ?></td>
		<td><?php echo $row['operator'] ?></td>
		<td><?php echo $row['hasil'] ?></td>
		<td><?php echo $row['alat'] ?></td>
		<td><?php echo $row['supervisor'] ?></td>
		<td><?php echo $row['ppr'] ?></td>
	</tr>
	<?php } ?>
</table>