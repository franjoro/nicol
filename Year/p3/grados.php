<?php 
require "../conexion1.php";
 ?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-row">
	<a href="../index.php" style="float: left;">
		<button class="w3-button w3-red">Regresar</button>
	</a>
</div>
<center>
<div class="w3-container">
<br>

		<?php
		  $sql=mysqli_query($conexion1,"SELECT * FROM grados");
		 while ($a=mysqli_fetch_array($sql)) {
		?>

		<a href="cambiar.php?id=<?php echo $a[0] ?>">

		   		 <div class="w3-quarter w3-padding-16 w3-margin">
    		  		<div class="w3-container w3-orange w3-text-white w3-padding-16">
      				  <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        			 	<div class="w3-right">
      				    </div>
     			      <div class="w3-clear"></div>
                        <h4><?php echo $a[1]." ".$a[2] ?></h4>
                   </div>
    			</div>
  		
		</a>

		<?php 
}	
		 ?>
</div>
 
</center>

