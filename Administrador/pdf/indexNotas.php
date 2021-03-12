<?php
	include 'plantillaNotas.php';
	require '../../conexion.php';


	
	$id = 'SextoA';

	$query = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id'");

	$query2 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE idG = '$id'");

	// $resultado = $conexion->query($query);
	
	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'Codigo',1,0,'C',1);
	$pdf->Cell(50,6,'Nombre',1,0,'C',1);
	while ($rowi = mysqli_fetch_array($query)) {
	$bum = $rowi[1];
	$pdf->Cell(50,6,$bum,1,0,'C',1);
	}
	$pdf->Cell(1,6,'',0,1,'C',0);
	// $pdf->Cell(10,0,'',0,1,'C',1);
	// $pdf->Cell(50,6,'Apellido',1,0,'C',1);
	// $pdf->Cell(50,6,'Genero',1,0,'C',1);
	// $pdf->Cell(50,6,'Puesto',1,0,'C',1);
	// $pdf->Cell(50,6,'Correo',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = mysqli_fetch_array($query2))
	{
		$pdf->Cell(30,6,utf8_decode($row[0]),1,0,'C');
		$pdf->Cell(50,6,$row[1],1,1,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Apellido']),1,0,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Genero']),1,0,'C');
		// $pdf->Cell(50,6,$row['Puesto'],1,0,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Correo']),1,1,'C');
	}
	$pdf->Output();
?>
