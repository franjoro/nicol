<?php 
require "../conexion1.php";
 ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta charset="utf-8">
<div class="w3-row">
	<a href="../index.php" style="float: left;">
		<button class="w3-button w3-red">Regresar</button>
	</a>
</div>
<div class="w3-container">
	<p><strong>Instrucciones:</strong></p>
		<span>Seleccionar los maestros unicamente los maestros que continuaran el proximo año.</span>
		<br><br>

<table class="w3-table w3-bordered" >
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>¿Continuara?</th>
		<th></th>
	</thead>
	<tbody>
		<?php 
		$a=mysqli_query($conexion1,"SELECT * FROM maestros");
		while($b=mysqli_fetch_array($a)){
		 ?>
		 <div >
		 <tr >
		 	<td><?php echo $b[0] ?></td>
		 	<td><?php echo utf8_encode($b[1]) ?></td>
		 	<td><?php echo utf8_encode($b[2]) ?></td>
		 	<td>
		 		<input class="w3-radio" type="radio" checked id="op<?php echo $b[0]?>" name="op<?php echo $b[0] ?>" value="1" >
					<label>Si</label>
				<input class="w3-radio" type="radio" id="op<?php echo $b[0]?>" name="op<?php echo $b[0] ?>" value="0">
					<label>No</label>
		 	</td>
		 	<td style="width: 15%"><button id="a<?php echo $b[0] ?>" onclick="fun('<?php echo $b[0] ?>')" class="w3-button w3-grey">Aceptar</button></td>
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

  <script type="text/javascript">
  	function fun(a){

  		var opp=($("input:radio[name=op"+a+"]:checked").val());
  		if (opp ==1) {
  			
      $.ajax({
          url:"cambiarfun.php",
          method: "POST", 
          data:{id:a},
          success: function(data){
             alert(data);
             $("#a"+a).css('display', 'none');
          }
        })
  			
  		}else{
  			$("#a"+a).css('display', 'none');
  		}
  		
  	}
  </script>