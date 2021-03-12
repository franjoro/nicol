<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logo.png', 15, 15, 50);

		// Psicion de X, Y, Tamaño
			$this->SetFont('Arial','B',15);
			$this->Ln(10);
			$this->Cell(10);
			$this->Cell(120,10, 'Reporte de notas por grado',0,0,'L');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'L' );
		}		
	}
?>
