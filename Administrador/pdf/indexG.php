<?php
	include 'PG.php';
	require '../../conexion.php';
	
	
	$query = "SELECT * FROM grados ORDER BY idG ASC";
	$resultado = $conexion->query($query);

	// Alineacion, tipo de medida, tamaño de pagina o puedes usar un array (50,100)
	
	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20);
	$pdf->Cell(80,6,'idG',1,0,'C',1);
	$pdf->Cell(80,6,'Nombre de grado',1,0,'C',1);
	$pdf->Cell(80,6,utf8_decode('Sección'),1,1,'C',1);
	// $pdf->Cell(50,6,'Genero',1,0,'C',1);
	// $pdf->Cell(50,6,'Grado',1,1,'C',1);
	// $pdf->Cell('');
	// $pdf->Cell(50,6,'Correo',1,1,'C',1);
	// largo, alto, texto, borde, br, alineacion
	// SetX->(50) esto es un margen SetY, SetXY
	// MultiCell(100,5, texto, borde, alineacion, fondo)
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
	$pdf->Cell(20);

		$pdf->Cell(80,6,utf8_decode($row['idG']),1,0,'C');
		// $pdf->Cell(50,6,$row['Nombre'],1,0,'C');
		$pdf->Cell(80,6,utf8_decode($row['Nombre']),1,0,'C');
		$pdf->Cell(80,6,utf8_decode($row['Seccion']),1,1,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Genero']),1,0,'C');
		// $pdf->Cell(50,6,$row['IdG'],1,1,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Correo']),1,1,'C');
	}
	$pdf->Output();
?>