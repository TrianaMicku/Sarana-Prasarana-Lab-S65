<?php 

	require_once '../koneksi.php';
	if(isset($_GET['id'])){
	$delete = mysqli_query($conn, "DELETE FROM tb_user WHERE nip = '".$_GET['id']."' ");
	header('location:index.php');
}
?>