<?php

	require 'fpdf/fpdf.php';
	class PDF extends FPDF
	{
		function Header()
		{
	session_start();
	require '../../conexion.php';

	
	$id = $_GET['id'];

	$query = mysqli_query($conexion, "SELECT Nombre FROM grados");

	$row = mysqli_fetch_array($query);
	$lulu = "Grado ". $row['Nombre'];
			$this->Image('images/logo.png', 15, 15, 50);

		// Psicion de X, Y, Tamaño
			$this->SetFont('Arial','B',15);
			$this->Ln(10);
			$this->Cell(80);
			$this->Cell(120,10, 'Reporte De Materias por grado',0,1,'C');
			$this->Cell(80);
			$this->Cell(120,10,$lulu,0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>