 <?php 
require_once '../koneksi.php';
if(isset($_GET['kode_alat'])){
	$delete = mysqli_query($conn, "DELETE FROM tb_alat WHERE kode_alat = '".$_GET['kode_alat']."' ");
header('location:index.php');
}
?>