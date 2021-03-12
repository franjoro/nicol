<?php 
require("conexion.php");
require("excel/Classes/PHPExcel.php");


//Consulta
	$sql = "SELECT * FROM users WHERE Role='4'";
	$resultado = $conexion->query($sql);
	$fila = 1; //Establecemos en que fila inciara a imprimir los datos
		
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	//Propiedades de Documento
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Usuarios");
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['Username']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['acceso']);		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	

	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	

	$date= date("d/m");
	// header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Usuarios-'.$date.'.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
 ?>
