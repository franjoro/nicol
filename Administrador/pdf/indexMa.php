<?php
  include 'PlantillaMa.php';
  require '../../conexion.php';

  // $id = $_GET['id'];
  
  $query = "SELECT * FROM materias ORDER BY idMa ASC";
  $resultado = $conexion->query($query);

  // Alineacion, tipo de medida, tamaño de pagina o puedes usar un array (50,100)
  
  $pdf = new PDF('L');
  $pdf->AliasNbPages();
  $pdf->AddPage();
  
  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(25);
  // $pdf->Cell(30,6,'Carnet',1,0,'C',1);
  $pdf->Cell(50,6,'Nombre',1,0,'C',1);
  $pdf->Cell(50,6,'Cantidad',1,0,'C',1);
  $pdf->Cell(50,6,'idGrado',1,0,'C',1);
  $pdf->Cell(50,6,'Maestro1',1,0,'C',1);
  $pdf->Cell(50,6,'Maestro2',1,1,'C',1);

  // $pdf->Cell('');
  // $pdf->Cell(50,6,'Correo',1,1,'C',1);
  // largo, alto, texto, borde, br, alineacion
  // SetX->(50) esto es un margen SetY, SetXY
  // MultiCell(100,5, texto, borde, alineacion, fondo)
  
  $pdf->SetFont('Arial','',10);
  
  while($row = $resultado->fetch_assoc())
  {
  $pdf->Cell(25);

    $pdf->Cell(50,6,utf8_encode($row['Nombre']),1,0,'C');
    $pdf->Cell(50,6,$row['Cant'],1,0,'C');
    $pdf->Cell(50,6,utf8_encode($row['idG']),1,0,'C');
    $pdf->Cell(50,6,utf8_encode($row['idM']),1,0,'C');
    // $pdf->Cell(50,6,utf8_decode($row['Genero']),1,0,'C');
    $pdf->Cell(50,6,$row['2idM'],1,1,'C');
    // $pdf->Cell(50,6,utf8_decode($row['Correo']),1,1,'C');
  }
  $pdf->Output();
?>
