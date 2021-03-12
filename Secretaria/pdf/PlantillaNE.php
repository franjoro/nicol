<?php
	
	include 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{

		// session_start();
		include '../../Conexion.php';

		// $fecha = 

		$id = '10';

		$query = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdEs = '$id'");
		$row = mysqli_fetch_array($query);

		$lala = $row['IdEs'];
		$lele = $row['Nombre'];
		$lili = $row['Apellido'];
		$lolo = $row['IdG'];
		
		$query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

		$rowi = mysqli_fetch_array($query2);

		$ja = $rowi['Nombre'];
		$je = $rowi['Seccion'];



			$this->Image('images/logo.png', 15, 15, 60);
		// Psicion de X, Y, Tamaño


			$this->SetFont('Arial','B',15);
			$this->Cell(140);
			$this->Cell(50, 10,'Bimestre Uno',1,0,'C');
			$this->Ln(30);
			$this->Cell(40);
			$this->Cell(120,10, 'Reporte de notas de estudiante',0,0,'C');
			$this->SetFont('Arial','',10);
			$this->Ln(20);
			$this->Cell(50,10,utf8_decode("Carné: ").$lala,0,0,'L');
			// $this->Ln(8);
			$this->Cell(120,10,"Nombre: ". utf8_decode($lili).", ". utf8_decode($lele) ,0,0,'L');
			$this->Ln(8);
			$this->Cell(50,10,"Grado: ". $ja .", ". $lolo ,0,0,'L');
			// $this->Ln(8);
			$this->Cell(120,10,utf8_decode("Sección: "). utf8_decode($je),0,0,'L');
			// $this->Cell(70, 10, );
			$this->Cell(120);
			$this->Ln(10);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			// $this->Cell(0,10,'Puto el que lo lea :v',0,0,'C');
			// $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
			$this->Cell(30,10,'Firma 1',0,0,'C');
			$this->Cell(25,10,'__________________________',0,0,'C');
			$this->Cell(60);
			$this->Cell(30,10,'Firma 1',0,0,'C');
			$this->Cell(25,10,'__________________________',0,0,'C');
			
		}		
	}

?>