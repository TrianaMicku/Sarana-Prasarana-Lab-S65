<?php
// memanggil library FPDF
require'../fpdf.php';
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'LAPORAN AKTIVITAS',0,1,'C');
$pdf->SetFont('Arial','B',12);
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(30,6,'TANGGAL',1,0);
$pdf->Cell(20,6,'ALAT',1,0);
$pdf->Cell(40,6,'AKTIVITAS',1,0);
$pdf->Cell(25,6,'OPERATOR',1,0);
$pdf->Cell(20,6,'HASIL',1,0);
$pdf->Cell(25,6,'SUPERVISOR',1,0);
$pdf->Cell(25,6,'PPR',1,1);

 
$pdf->SetFont('Arial','',10);
require_once '../koneksi.php';
if (isset($_GET['from-date']) && isset($_GET['to-date'])) {
	$result = mysqli_query($conn, "SELECT tb_aktivitas.*, tb_sup.nama_sup AS supervisor, tb_ppr.nama_ppr AS ppr, tb_alat.nama_alat AS alat FROM tb_aktivitas LEFT OUTER JOIN tb_sup ON tb_sup.id = tb_aktivitas.id_sup INNER JOIN tb_ppr ON tb_ppr.id = tb_aktivitas.id_ppr LEFT OUTER JOIN tb_alat ON tb_alat.kode_alat = tb_aktivitas.kode_alat WHERE tb_aktivitas.aktivitas='".$_GET['aktivitas']."' AND tb_aktivitas.tanggal >= '".$_GET['from-date']."' AND tb_aktivitas.tanggal <= '".$_GET['to-date']."'");
}else{
	$result = mysqli_query($conn, "SELECT tb_aktivitas.*, tb_sup.nama_sup AS supervisor, tb_ppr.nama_ppr AS ppr, tb_alat.nama_alat AS alat FROM tb_aktivitas INNER JOIN tb_sup ON tb_sup.id = tb_aktivitas.id_sup INNER JOIN tb_ppr ON tb_ppr.id = tb_aktivitas.id_ppr INNER JOIN tb_alat ON tb_alat.kode_alat = tb_aktivitas.kode_alat WHERE tb_aktivitas.aktivitas='".$_GET['aktivitas']."'");
}

	$x = 1;
	while ($row = mysqli_fetch_assoc($result)) {
	    $pdf->Cell(10,6,$x++,1,0);
		$pdf->Cell(30,6,$row['tanggal'],1,0);
		$pdf->Cell(20,6,$row['alat'],1,0);
		$pdf->Cell(40,6,$row['aktivitas'],1,0);
		$pdf->Cell(25,6,$row['operator'],1,0);
		$pdf->Cell(20,6,$row['hasil'],1,0);
		$pdf->Cell(25,6,$row['supervisor'],1,0);
		$pdf->Cell(25,6,$row['ppr'],1,1); 
	}

$pdf->Output();
?>