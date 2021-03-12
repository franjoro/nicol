<?php
	include 'plantillaE.php';
	require '../../conexion.php';
	
	$resultado = mysqli_query($conexion,"SELECT * FROM estudiantes ORDER BY IdG ASC");
	// $resultado = $conexion->query($query);
	$bye = mysqli_fetch_array($resultado);
	$lolo = $bye['IdG'];
	$query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

    $rowi = mysqli_fetch_array($query2);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];

	// Alineacion, tipo de medida, tamaño de pagina o puedes usar un array (50,100)
	
	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25);
	$pdf->Cell(30,6,'Carnet',1,0,'C',1);
	$pdf->Cell(50,6,'Nombre',1,0,'C',1);
	$pdf->Cell(50,6,'Apellido',1,0,'C',1);
	$pdf->Cell(50,6,'Genero',1,0,'C',1);
	$pdf->Cell(50,6,'Grado',1,1,'C',1);
	// $pdf->Cell(50,6,'Sección',1,1,'C',1);
	// $pdf->Cell('');
	// $pdf->Cell(50,6,'Correo',1,1,'C',1);
	// largo, alto, texto, borde, br, alineacion
	// SetX->(50) esto es un margen SetY, SetXY
	// MultiCell(100,5, texto, borde, alineacion, fondo)
	
	$pdf->SetFont('Arial','',10);
	
	while($row = mysqli_fetch_array($resultado))
	{
	$pdf->Cell(25);

		$pdf->Cell(30,6,utf8_decode($row['0']),1,0,'C');
		$pdf->Cell(50,6,$row['1'],1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['2']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['3']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['4']),1,1,'C');
		//$pdf->Cell(50,6,$ja,1,1,'C');

	}
	$pdf->Output();
?>
