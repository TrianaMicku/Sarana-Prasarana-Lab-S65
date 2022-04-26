<?php 
session_start();
define("base_url", "http://localhost/s65/multiuser");
if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<link rel="stylesheet" href="<?php echo base_url; ?>/css/bootstrap.min.css">
</head>
<body >
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid" >
		<div class="navbar-header" >
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="bs-example-navbar-collapse-1">

				<span class="sr-only">Tonggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div id="bs-example-navbar-collapse-1"" class="collapse navbar-collapse" >
			<ul class="nav navbar-nav">
			<?php if($_SESSION['role'] == 'admin'){ ?>
				<li><a href="<?php echo base_url; ?>/users">Users</a></li>
				<li><a href="<?php echo base_url; ?>/alat">Alat</a></li>
				<li><a href="<?php echo base_url; ?>/sup">Supervisor</a></li>
				<li><a href="<?php echo base_url; ?>/ppr">PPR</a></li>
				<li><a href="<?php echo base_url; ?>/ruang">Ruang</a></li>
			<?php } ?>
				<li><a href="<?php echo base_url; ?>/aktivitas">Aktivitas</a></li>
				<li><a href="<?php echo base_url; ?>/aboutus.php">About Us</a></li>
			</ul>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"">
			<ul class="nav navbar-nav navbar-right">
				<a class="navbar-brand"><?php echo $_SESSION['username'] ?></a>
				<li><a href="<?php echo base_url; ?>/logout.php">Logout</a></li>

			</ul>	
			</div>	
		</div>
	</div>
</nav>

 