<?php 
require("../../../conexion.php");

if (isset($_POST["id"])) {
	$id=$_POST["id"];
$sql= mysqli_query($conexion,"SELECT * FROM codigo WHERE idCodigo='$id'");
$row=mysqli_fetch_array($sql);
	?>
 <input type="text" data-si="si" disabled="" id="option" required class="w3-input w3-border" value="<?php echo utf8_encode($row[1]." ".$row[2])  ?>"> 
 <?php
}
// else{
  	?>
 <!-- <input type="text" disabled data-si="no" class="w3-input w3-border" value="Código no valido">  -->
 <?php
// }



 ?>