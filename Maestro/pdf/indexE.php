<?php
	include 'plantillaM.php';
	require '../conexion.php';
	
	$query = "SELECT * FROM estudiantes ORDER BY IdEs ASC";
	$resultado = $conexion->query($query);
	
	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'Carnet',1,0,'C',1);
	$pdf->Cell(65,6,'Nombre',1,0,'C',1);
	$pdf->Cell(65,6,'Apellido',1,0,'C',1);
	$pdf->Cell(65,6,'Genero',1,0,'C',1);
	$pdf->Cell(65,6,'Grado',1,0,'C',1);
	// $pdf->Cell(50,6,'Correo',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['IdEs']),1,0,'C');
		$pdf->Cell(65,6,$row['Nombre'],1,0,'C');
		$pdf->Cell(65,6,utf8_decode($row['Apellido']),1,0,'C');
		$pdf->Cell(65,6,utf8_decode($row['Genero']),1,0,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Genero']),1,0,'C');
		$pdf->Cell(50,6,$row['IdG'],1,0,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Correo']),1,1,'C');
	}
	$pdf->Output();
?>