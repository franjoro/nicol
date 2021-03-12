<?php 
require "../conexion1.php";
$id=$_GET['id'];

 ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-row">
	<a href="../index.php" style="float: left;">
		<button class="w3-button w3-red">Regresar</button>
	</a>
</div>
<div class="w3-container">
	<p><strong>Instrucciones:</strong></p>
		<span>Seleccionar los alumnos que unicamente continuarán el proximo año.</span>
		<br><br>

<table class="w3-table w3-bordered" >
	<thead>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Género</th>
		<th>Sección</th>
		<th></th>
	</thead>
	<tbody>
		<?php 
		$a=mysqli_query($conexion1,"SELECT * FROM estudiantes WHERE IdG='$id' ORDER BY Apellido" );
		while($b=mysqli_fetch_array($a)){
		 ?>
		 <div >
		 <tr >
		 	<td><?php echo $b[0] ?></td>
		 	<td><?php echo $b[1] ?></td>
		 	<td><?php echo $b[2] ?></td>
		 	<td>


<select class="w3-select" name="op<?php echo $b[0] ?>" id="op<?php echo $b[0] ?>">
  <option value="nop" selected>No continuará</option>
  <?php 
		$aa=mysqli_query($conexion1,"SELECT * FROM grados");
while($bb=mysqli_fetch_array($aa)){
   ?>
   <option value="<?php echo $bb[0] ?>"><?php echo $bb[1]." ".$bb[2] ?></option>
<?php } ?>
</select>

		 	</td>
		 	<td style="width: 15%"><button id="a<?php echo $b[0] ?>" onclick="fun('<?php echo $b[0] ?>','op<?php echo $b[0] ?>')" class="w3-button w3-grey">Aceptar</button></td>
		 </tr>
		 </div>
<?php } ?>
	</tbody>
</table>
</div>    

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script
  src="notify.js"></script>
  <script type="text/javascript">

   
  	function fun(a,b){
  		var o =$("#"+b+" option:selected").val();
  		  $.ajax({
          url:"cambiarfun.php",
          method: "POST", 
          data:{ida:a,idg:o},
          success: function(data){
             //alert(data);    
			 $.notify("Ingresado correctamente", "success");
             $("#a"+a).css('display', 'none');
          }
        })

  	}



  </script>
