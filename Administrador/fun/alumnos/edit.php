<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$sql= mysqli_query($conexion,"SELECT COUNT(IdEs) FROM estudiantes WHERE IdEs='$id' ");
$a= mysqli_fetch_array($sql);

if (isset($id) AND $a[0]>0) {

	$query = mysqli_query($conexion,"SELECT * FROM estudiantes WHERE IdEs='$id'");
	$rowq=mysqli_fetch_array($query);
?>
<link rel="stylesheet" type="text/css" href="../../css/w3.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<a href="../../estudiantes.php">
<button class="w3-button w3-blue">Atrás</button></a>
<br><br><br>
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 

        <h2>Editar un estudiante</h2>
      </header>
      <div class="w3-container">
        
<form action="edit_fun.php?id=<?php echo $id ?>" method="POST">
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Código</label>
    <input class="w3-input w3-border" disabled type="text" name="codigo" value="<?php echo $id ?>" >
  </div>
  <div class="w3-half">
    <label>Grado <b>*No tocar si no se cambiara de grado</b></label>
     <select class="w3-select w3-border" name="option">
    <option value="<?php echo $rowq[4] ?>" selected></option>
    <?php 
    $sql1=mysqli_query($conexion,"SELECT * FROM grados");

    while ($roww=mysqli_fetch_array($sql1)) {
     ?>
    <option value="<?php echo $roww[0] ?>"><?php echo $roww[1]." ".$roww[2] ?></option>
    <?php } ?>
  </select>
  </div>
 <br>
</div>
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Apellido</label>
    <input class="w3-input w3-border" type="text" name="apellido" value="<?php echo utf8_encode($rowq[2]) ?>" >
  </div>
  <div class="w3-half">
    <label>Nombre</label>
    <input class="w3-input w3-border" type="text" name="nombre" value="<?php echo utf8_encode($rowq[1]) ?>" >
  </div>
 <br>

</div>

 <br>
 <button class="w3-button w3-right w3-teal">Editar</button>
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
      <h2>¿Desea eliminar <b>permanentemente</b> los datos de este alumno?</h2>
      <p>Los datos no podran ser recuperados</p>
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
