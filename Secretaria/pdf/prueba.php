<?php 
session_start();
require '../../Conexion.php';

	$id = "grado-20";

	$query = mysqli_query($conexion, "SELECT idMa,Nombre FROM materias WHERE idG = '$id'");

	$query2 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE idG = '$id'");

	


?>


	<table border="1">
<thead>
		<th>Código</th>
		<th>Nombre</th>
	<?php 
		while ($row1=mysqli_fetch_array($query)) {

	 ?>
		<th><?php echo $row1[1] ?></th>
<?php } ?>

</thead>
<?php 
	while ($row=mysqli_fetch_array($query2)) {
	?>

		<tr>
			<td><?php echo $row[0] ?></td>
			<td><?php echo $row[1]." ".$row[2] ?></td>
		</tr>
<?php 
	}


 ?>
	</table>