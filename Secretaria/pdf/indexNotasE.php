<?php
	require '../../Conexion.php';
	$id = "grado-20";

	include 'plantillaNE.php';
	$query90 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$id'");
	while ($rowo = mysqli_fetch_array($query90)) {
		


	$ide = '14-164';
	

	$query = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id'");

	$query2 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdEs = '$ide'");

	

	



	// $resultado = $conexion->query($query);
	
	$pdf = new PDF('P');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(60,6,'Materia',1,0,'C',1);
	$pdf->Cell(30,6,'Act1',1,0,'C',1);
	$pdf->Cell(30,6,'Act2',1,0,'C',1);
	$pdf->Cell(30,6,'Exam',1,0,'C',1);
	$pdf->Cell(30,6,'Prom',1,1,'C',1);


	// while ($rowi = mysqli_fetch_array($query)) {
	// $bum = $rowi[1];
	// $pdf->Cell(50,6,$bum,1,0,'C',1);
	// }
	// $pdf->Cell(1,6,'',0,1,'C',0);
	// $pdf->Cell(10,0,'',0,1,'C',1);
	// $pdf->Cell(50,6,'Apellido',1,0,'C',1);
	// $pdf->Cell(50,6,'Genero',1,0,'C',1);
	// $pdf->Cell(50,6,'Puesto',1,0,'C',1);
	// $pdf->Cell(50,6,'Correo',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	while ($row = mysqli_fetch_array($query))
	{
		$query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 ");
		$query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 ");
		$query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 ");

		$rowi2 = mysqli_fetch_array($query3);
		$rowi5 = mysqli_fetch_array($query5);
		$rowi7 = mysqli_fetch_array($query7);
		$query4 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi2[0]'");
		$query6 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi5[0]'");
		$query8 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi7[0]'");


		$rowi3 = mysqli_fetch_array($query4);
		$rowi6 = mysqli_fetch_array($query6);
		$rowi8 = mysqli_fetch_array($query8);

		$haha = $rowi3[0];
		$hehe =	$rowi6[0];
		$hihi =	$rowi8[0];
		$rowi9 = $haha + $hehe +$hihi;
		// $pdf->Cell(60,6,utf8_decode($row[0]),1,0,'C');
		$pdf->Cell(60,6,$row[1],1,0,'C');
		// $pdf->Cell(6);
		$pdf->Cell(30,6,$rowi3[0],1,0,'C');
		$pdf->Cell(30,6,$rowi6[0],1,0,'C');
		$pdf->Cell(30,6,$rowi8[0],1,0,'C');
		$pdf->Cell(30,6,$rowi9,1,1,'C');


		// $pdf->Cell(30,6,$rowi3[0],1,1,'C');

		// $pdf->Cell(50,6,utf8_decode($row['Apellido']),1,0,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Genero']),1,0,'C');
		// $pdf->Cell(50,6,$row['Puesto'],1,0,'C');
		// $pdf->Cell(50,6,utf8_decode($row['Correo']),1,1,'C');
	}
	$pdf->close();
	}
	$pdf->Output();
?>