<?php 
require "../conexion.php";
 ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-row">
	<a href="../index.php" style="float: left;">
		<button class="w3-button w3-red">Regresar</button>
	</a>
</div>
<div class="w3-table w3-bordered">
<table class="w3-table">
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Grado</th>
	</thead>
	<tbody>
		<?php 
		$a=mysqli_query($conexion,"SELECT * FROM estudiantes");
		while($b=mysqli_fetch_array($a)){
		 ?>
		 <tr>
		 	<td><?php echo $b[0] ?></td>
		 	<td><?php echo $b[1] ?></td>
		 	<td><?php echo $b[2] ?></td>
		 	<td><?php echo $b[4] ?></td>
		 </tr>
		<?php } ?>
	</tbody>
</table>
</div>