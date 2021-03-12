<?php 
require "../conexion.php";
require "../conexion1.php";
 ?>


<!DOCTYPE html>
<html>
<title>Grados</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div class="w3-row">
	<a href="../index.php" style="float: left;">
		<button class="w3-button w3-red">Regresar</button>
	</a>
</div>

<div class="w3-container">

<h2>Seleccionar los grados</h2>
<p>Editar maestros por materias. </p>
<p><strong>Notas</strong></p>
<p>1.Materias bimestrales ingresarlas manualmente</p>
<p>2.Materias con doble maestro, editarlo manualmente</p>

<?php 
	$a=mysqli_query($conexion1,"SELECT Nombre,idG,Seccion FROM grados");

while($aa=mysqli_fetch_array($a)){
 ?>



<button onclick="myFunction('<?php echo $aa[1] ?>')" class="w3-button w3-block w3-teal w3-left-align"><?php echo $aa[0]." ".$aa[2] ?></button>
<div id="<?php echo $aa[1] ?>" class="w3-hide w3-container">
	<table class="w3-table w3-bordered">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Maestro</th>
			<th>Maestro</th>
			<th>Continuidad</th>
			<th>Proximo maestro</th>
			<th></th>
		</thead>
	<?php 
		$b=mysqli_query($conexion1,"SELECT * FROM materias WHERE idG='$aa[1]' AND Role='0'");
		while ($bb=mysqli_fetch_array($b)) {
	 ?>
    <tr>
    	<td><?php echo $bb[0] ?></td>
    	<td><?php echo utf8_encode($bb[1]) ?></td>
    	<td><?php echo $bb[4] ?></td>
    	<td><?php echo $bb[5] ?></td>
    	<td>
    		<input class="w3-radio" type="radio" id="op<?php echo $bb[0]?>" checked name="op<?php echo $bb[0] ?>" value="1" >
					<label>Si</label>
			<input class="w3-radio" type="radio" id="op<?php echo $bb[0]?>" name="op<?php echo $bb[0] ?>" value="0">
					<label>No</label>
    	</td>
    	<td>
    		<select class="w3-select" name="ma<?php echo $bb[0] ?>" id="ma<?php echo $bb[0] ?>">
    			<option value="nop" disabled selected>Seleccionar maestro</option>
    			<?php 
    				$c=mysqli_query($conexion1,"SELECT * FROM maestros");
    				while($cc=mysqli_fetch_array($c)){
    			 ?>
  				<option value="<?php echo $cc[0] ?>"><?php echo utf8_encode($cc[1])." ".utf8_encode($cc[2]) ?></option>
  			<?php } ?>
  			</select>	
    	</td>
    	<td><button class="w3-button w3-grey" id="a<?php echo $bb[0] ?>" onclick="fun('<?php echo $bb[0] ?>','ma<?php echo $bb[0] ?>')">Aceptar</button></td>
    </tr>
    	
    
<?php } ?>
</table>
</div>






<?php 
}
 ?>

</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script
  src="notify.js"></script>


<script>
	function fun(a,b){
		//Maestro
		var o =$("#"+b+" option:selected").val();
		//Continuidad
		var opp=($("input:radio[name=op"+a+"]:checked").val());

	if (opp=='1'){
	      $.ajax({
          url:"cambiarfun.php",
          method: "POST", 
          data:{idm:a,idma:o},
          success: function(data){
             //alert(data);
              $.notify("Ingresado correctamente", "success");
             $("#a"+a).css('display', 'none');
          }
        })
	}
	else{
		alert("Materia sin continuidad, no ingresada");
		$("#a"+a).css('display', 'none');
	}

}


function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("w3-black", "w3-red");
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("w3-red", "w3-black");
    }
}
</script>

</body>
</html>
