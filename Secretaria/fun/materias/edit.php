<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$sql= mysqli_query($conexion,"SELECT COUNT(idMa) FROM materias WHERE idMa='$id' ");
$a= mysqli_fetch_array($sql);

if (isset($id) AND $a[0]>0) {

	$query = mysqli_query($conexion,"SELECT * FROM materias WHERE idMa='$id'");
	$rowq=mysqli_fetch_array($query);
?>
<link rel="stylesheet" type="text/css" href="../../css/w3.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<a href="../../materia.php">
<button class="w3-button w3-blue">Atrás</button></a>
<br><br><br>
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 

        <h2>Editar una materia</h2>
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
    <label>Nombre</label>
    <input class="w3-input w3-border"  type="text" name="name" value="<?php echo $rowq[1] ?>" >
  </select>
  </div>
 <br>
</div>
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Maestro 1</label>
   <select class="w3-select w3-border" name="maestro">
    <option value="" disabled selected>Seleccionar maestro</option>
    <?php 
    $sql1=mysqli_query($conexion,"SELECT * FROM maestros");

    while ($roww=mysqli_fetch_array($sql1)) {
     ?>
    <option value="<?php echo $roww[0] ?>"><?php echo $roww[1]." ".$roww[2] ?></option>
    <?php } ?>
  </select>   
  </div>
  <div class="w3-half">
    <label>Maestro 2</label>
   <select class="w3-select w3-border" name="maestro2">
    <option value="" disabled selected>Seleccionar maestro</option>
    <?php 
    $sql1=mysqli_query($conexion,"SELECT * FROM maestros");

    while ($roww=mysqli_fetch_array($sql1)) {
     ?>
    <option value="<?php echo $roww[0] ?>"><?php echo $roww[1]." ".$roww[2] ?></option>
    <?php } ?>
  </select>   
  </div>
 <br>

</div>

 <br>
 <button class="w3-button w3-right w3-teal">Editar</button>

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
      <h2>¿Desea eliminar <b>permanentemente</b> los datos de esta materia?</h2>
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
