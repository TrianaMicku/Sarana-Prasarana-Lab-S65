<?php 
require_once '../koneksi.php';
if(isset($_GET['id'])){
	$delete = mysqli_query($conn, "DELETE FROM tb_ppr WHERE id = '".$_GET['id']."' ");
header('location:index.php');
}
echo "string";
?>