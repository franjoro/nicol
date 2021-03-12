<?php
  include 'Pmag.php';
  require '../../conexion.php';

  $id = $_GET['id'];
  
  $query = "SELECT * FROM materias WHERE idG = '$id'";
  $resultado = $conexion->query($query);

  // Alineacion, tipo de medida, tamaño de pagina o puedes usar un array (50,100)
  
  $pdf = new PDF('L');
  $pdf->AliasNbPages();
  $pdf->AddPage();
  
  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',12);
  // $pdf->Cell(50);
  $pdf->Cell(70,6,utf8_decode('Código de materia'),1,0,'C',1);
  $pdf->Cell(70,6,'Nombre',1,0,'C',1);
  // $pdf->Cell(50,6,'Cantidad',1,0,'C',1);
  // $pdf->Cell(50,6,'idGrado',1,0,'C',1);
  $pdf->Cell(70,6,utf8_decode('Maestro 1 (código)'),1,0,'C',1);
  $pdf->Cell(70,6,utf8_decode('Maestro 2 (código)'),1,1,'C',1);

  // $pdf->Cell('');
  // $pdf->Cell(50,6,'Correo',1,1,'C',1);
  // largo, alto, texto, borde, br, alineacion
  // SetX->(50) esto es un margen SetY, SetXY
  // MultiCell(100,5, texto, borde, alineacion, fondo)
  
  $pdf->SetFont('Arial','',10);
  
  while($row = $resultado->fetch_assoc())
  {
  // $pdf->Cell(50);
    $pdf->Cell(70,6,$row['idMa'],1,0,'C');
    $pdf->Cell(70,6,utf8_decode($row['Nombre']),1,0,'C');
    // $pdf->Cell(50,6,$row['Cant'],1,0,'C');
    // $pdf->Cell(50,6,utf8_decode($row['idG']),1,0,'C');
    $pdf->Cell(70,6,utf8_decode($row['idM']),1,0,'C');
    // $pdf->Cell(50,6,utf8_decode($row['Genero']),1,0,'C');
    $pdf->Cell(70,6,$row['2idM'],1,1,'C');
    // $pdf->Cell(50,6,utf8_decode($row['Correo']),1,1,'C');
  }
  $pdf->Output();
?>