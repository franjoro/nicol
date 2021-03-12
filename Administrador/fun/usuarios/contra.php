<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$sql= mysqli_query($conexion,"SELECT COUNT(idU) FROM users WHERE idU='$id' ");
$a= mysqli_fetch_array($sql);

if (isset($id) AND $a[0]>0) {

	$query = mysqli_query($conexion,"SELECT * FROM users WHERE idU='$id'");
	$rowq=mysqli_fetch_array($query);
?>
<link rel="stylesheet" type="text/css" href="../../css/w3.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<a href="../../usuarios.php">
<button class="w3-button w3-blue">Atrás</button></a>
<br><br><br>
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 

        <h2>Editar un usuario : <b><?php echo $rowq[1] ?></b></h2>
      </header>
      <div class="w3-container">
        
<form action="edit_fun.php?id=<?php echo $id ?>" method="POST">
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Nueva contraseña</label>
    <input class="w3-input w3-border" type="text" name="contra" required="">
    <br>
    <button class="w3-button w3-green" type="submit">Editar</button>
</form>
  </div>
  <div class="w3-half">
    <label>Acceso</label>
<br>
<?php 
 if ($rowq[4]=='1') {
              $acceso0="";
              $acceso1="checked";
            }else{
              $acceso1="";
              $acceso0="checked";  
            }

 ?>
<form method="POST" action="acceso.php?id=<?php echo $id ?>">
    <input class="w3-radio" <?php echo $acceso1 ?> type="radio" name="ac" value="si" >
    <label>Si</label>
    <input class="w3-radio" <?php echo $acceso0 ?> type="radio" name="ac" value="no">
    <label>No</label>
<br><br>
     <button class="w3-button w3-green" type="submit">Editar</button>
     </form>
  </div>
 <br>
</div>


 <br>
 <a class="w3-button w3-left w3-red" onclick="document.getElementById('alerta').style.display='inline'" ">Eliminar</a>
 <br>

</form>


      </div>
    </div>
    <br>
<div id="alerta" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('alerta').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>¿Desea eliminar <b>permanentemente</b> los datos de este usuario?</h2>
      <button onclick="document.getElementById('alerta').style.display='none'"  class="w3-button w3-red">Cancelar</button>
      <a href="delete.php?id=<?php echo $id ?>"><button class="w3-button w3-green">Eliminar</button></a>
      <br><br>
    </div>
  </div>
</div>
<?php 
}else{
echo "Error, por favor regresa.";
}
 ?>
