<?php 
require_once '../koneksi.php'; 
require_once '../layouts/_header.php';
if (isset($_GET['id'])) {
	$result = mysqli_query($conn, "SELECT * FROM tb_aktivitas WHERE id ='".$_GET['id']."'");
	$hasil = mysqli_fetch_assoc($result);
}
?>
<div class="container"><br><br>
<div class="row">
<h4 style="text-align: center;">Input Data Aktivitas</h4>
<form action="" method="POST">
	<div class="row">
		<div class="col-md-4">


			<div class="form-group">
				<label >Aktivitas</label>
				<label style="padding-left: 17px;"></label>
				<?php if(isset($_GET['id'])){ ?>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				<?php } ?>
				<input type="radio" name="aktivitas" value="pengoperasian" <?php if(isset($_GET['id'])){ echo $hasil['aktivitas'] == 'pengoperasian' ? 'checked' : null; } ?> required>Pengoperasian Alat
				<input type="radio" name="aktivitas" value="perawatan" <?php if(isset($_GET['id'])){ echo $hasil['aktivitas'] == 'perawatan' ? 'checked' : null; } ?> required>Perawatan Alat
			</div>

			<div class="form-group">
				<label>Tanggal</label>
				<label style="padding-left: 25px;"></label>
				<input type="date" name="tanggal" value="<?php echo isset($_GET['id']) ? $hasil['tanggal'] : null; ?>" class="" required>
			</div>

			<div class="form-group">
				<label>Alat</label>
				<label style="padding-left: 50px;"></label>
				<select name="alat" class="" required>
					<?php 
					$sql = mysqli_query($conn, "SELECT kode_alat AS kode, nama_alat FROM tb_alat");
					while($row = mysqli_fetch_array($sql)){
					?>
					<option value="<?php echo $row['kode'] ?>" <?php if(isset($_GET['id'])){ echo $hasil['kode_alat'] == $row['kode'] ? 'selected' : null;} ?>><?php echo $row['nama_alat'] ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label>Operator</label>
				<label style="padding-left: 17px;"></label>
				<input type="text" name="operator" value="<?php echo isset($_GET['id']) ? $hasil['operator'] : null; ?>" class="" required>
			</div>


			<div class="form-group">
				<label>PPR</label>
				<label style="padding-left: 48px;"></label>
				<select name="ppr" class="" required>
					<?php 
					$sql = mysqli_query($conn, "SELECT * FROM tb_ppr");
					while($row = mysqli_fetch_array($sql)){
					?>
					<option value="<?php echo $row['id'] ?>" <?php if(isset($_GET['id'])){ echo $hasil['id_ppr'] == $row['id'] ? 'selected' : null;} ?>><?php echo $row['nama_ppr']; ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label>Supervisor</label>
				<label style="padding-left: 3px;"></label>
				<select name="sup" class="" required>
					<?php 
					$sql = mysqli_query($conn, "SELECT * FROM tb_sup");
					while($row = mysqli_fetch_array($sql)){
					?>
					<option value="<?php echo $row['id'] ?>" <?php if(isset($_GET['id'])){ echo $hasil['id_sup'] == $row['id'] ? 'selected' : null;} ?>><?php echo $row['nama_sup'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-md-8">
			<div class="form-group">
				<label>Hasil</label>
				<textarea name="hasil" cols="40" rows="5" id="hasil" class="form-control"><?php echo isset($_GET['id']) ? $hasil['hasil'] : null; ?></textarea>	
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
			</div>	

			<div class="form-group">
				<?php
					if(isset($_POST['simpan'])){
						if (isset($_POST['id'])) {
							$update = mysqli_query($conn, "UPDATE tb_aktivitas 
								SET aktivitas = '".$_POST['aktivitas']."',
								operator = '".$_POST['operator']."',
								kode_alat = '".$_POST['alat']."',
								id_sup = '".$_POST['sup']."',
								id_ppr = '".$_POST['ppr']."',
								tanggal = '".$_POST['tanggal']."',
								hasil = '".$_POST['hasil']."'
								WHERE id='".$_POST['id']."'");
							header("location:index.php");
						}else{ 
							$insert = mysqli_query($conn, "INSERT INTO tb_aktivitas VALUES
								(null,
								'".strtolower($_POST['aktivitas'])."',
								'".$_POST['operator']."',
								'".$_POST['alat']."',
								'".$_POST['sup']."',
								'".$_POST['ppr']."',
								'".$_POST['tanggal']."',
								'".$_POST['hasil']."')");
							if($insert){
								echo 'berhasil disimpan';
							}else{
								echo 'gagal disimpan' .mysqli_error($conn);
							}
						}
					}
					?>
			</div>
		</div>
	</div>
</form>
</div>
</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h4>Data Aktivitas</h4>
			</div>

			<div class="col-md-6 text-right">
				<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-pdf" class="btn btn-warning btn-sm">Export PDF</a>
				<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-excel" class="btn btn-success btn-sm">Export Excel</a>
			</div>
		</div>
	</div>

		<style type="text/css">
			.table-scrollable tbody{
				height: 150px;
				display: block;
				overflow-y: scroll;
			}
			.table-scrollable thead, .table-scrollable tbody tr{
				display: table;
				width: 100%;
				table-layout: fixed;
			}
		</style>

		<table class="table table-bordered table-scrollable">

		<thead>
			<tr style="font-size: 12px; text-align: left; font-weight:bold; background-color: #eee;">
				<th class="text-center" style="width: 40px;">No </th>
				<th class="text-center" style="width: 92px;">Tanggal</th>
				<th class="text-center" style="width: 100px;">Alat</th>
				<th class="text-center" style="width: 120px;">Nama Aktivitas</th>
				<th class="text-center" style="width: 120px;">operator</th>
				<th class="text-center" style="width: 300px;">Hasil</th>
				<th class="text-center" style="width: 100px">Supervisor</th>
				<th class="text-center" style="width: 90px;">Ppr</th>
				<?php if($_SESSION['role'] == 'admin'){ ?>
				<th class="text-center" style="width: 120px;">Opsi</th>
				<?php } ?>
			</tr>

		</thead>

		<tbody>
		<?php  
		require_once '../koneksi.php';
		$no = 1 ;
		$select = mysqli_query($conn, "SELECT tb_aktivitas.*, tb_sup.nama_sup AS supervisor, tb_ppr.nama_ppr AS ppr, tb_alat.nama_alat AS alat FROM tb_aktivitas INNER JOIN tb_sup ON tb_sup.id = tb_aktivitas.id_sup INNER JOIN tb_ppr ON tb_ppr.id = tb_aktivitas.id_ppr INNER JOIN tb_alat ON tb_alat.kode_alat = tb_aktivitas.kode_alat");
		while($hasil = mysqli_fetch_array($select)){
		?>	
		<tr style="text-align: center; font-size: 12px;">
			<td style="width: 40px;"><?php echo $no++ ?></td>
			<td style="width: 90px;"><?php echo $hasil['tanggal'] ?></td>
			<td style="width: 100px;"><?php echo $hasil['alat'] ?></td>
			<td style="width: 120px;"><?php echo $hasil['aktivitas'] ?></td>
			<td style="width: 120px;"><?php echo $hasil['operator'] ?></td>
			<td style="width: 300px;"><?php echo $hasil['hasil'] ?></td>
			<td style="width: 100px;"><?php echo $hasil['supervisor'] ?></td>
			<td style="width: 90px;"><?php echo $hasil['ppr'] ?></td>
				<?php if($_SESSION['role'] == 'admin'){ ?>
				<td style="width: 100px;">
					<a href="?id=<?php echo $hasil['id'] ?>">Edit</a> ||
					<a href="delete.php?id=<?php echo $hasil['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ?');">Hapus</a>
				</td>
				<?php } ?>
		</tr>	
		<?php } ?>	

		 </tbody>
	</table>
	</div>

<div id="modal-pdf" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form action="export-pdf.php">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Export data ke pdf</h3>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label >Aktivitas</label>
					<label style="padding-left: 17px;"></label>
					<input type="radio" name="aktivitas" value="pengoperasian" required>Pengoperasian Alat
					<input type="radio" name="aktivitas" value="perawatan" required>Perawatan Alat
			</div>
				<div class="form-group">
					<label>Dari tanggal</label>
					<input type="date" class="form-control" name="from-date" required>
				</div>

				<div class="form-group">
					<label>Ke tanggal</label>
					<input type="date" class="form-control" name="to-date" required>
				</div>

				
		</div>

			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		</form>
	</div>
</div>
<div id="modal-excel" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form action="export-excel.php">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Export data ke excel</h3>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label >Aktivitas</label>
					<label style="padding-left: 17px;"></label>
					<input type="radio" name="aktivitas" value="pengoperasian" required>Pengoperasian Alat
					<input type="radio" name="aktivitas" value="perawatan" required>Perawatan Alat
				</div>
				<div class="form-group">
					<label>Dari tanggal</label>
					<input type="date" class="form-control" name="from-date" required>
				</div>

				<div class="form-group">
					<label>Ke tanggal</label>
					<input type="date" class="form-control" name="to-date" required>
				</div>

			
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		</form>
	</div>
</div><br><br>
<?php require_once '../layouts/_footer.php'; ?>