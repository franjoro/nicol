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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  

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
    <input class="w3-input w3-border"  type="text" name="name" value="<?php echo utf8_encode($rowq[1]) ?>" >
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
    <option value="<?php echo $roww[0] ?>"><?php echo utf8_encode($roww[1]." ".$roww[2]) ?></option>
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
    <option value="<?php echo $roww[0] ?>"><?php echo utf8_encode($roww[1]." ".$roww[2]) ?></option>
    <?php } ?>
  </select>   
  </div>
 <br>

</div>

 <br>
 <button class="w3-button w3-right w3-teal" type="submit">Editar materia</button>
 <a class="w3-button w3-left w3-red" onclick="document.getElementById('alerta').style.display='inline'" ">Eliminar materia</a>
 <br>

</form>
<br>
  <hr>
<?php 
$sql2=mysqli_query($conexion,"SELECT * FROM materias WHERE idMa='$id' "); 
$roooo=mysqli_fetch_array($sql2);
  if ($roooo[6]=='1') {
  $text ="Activo";
  $color="w3-red";
  $adentro="Bloquear";
  $link="permiso0.php?id=".$id."&n=1";
}elseif($roooo[6]=='0'){
  $text="Bloqueado";
  $color="w3-green";
  $adentro="Desbloquear";
  $link="permiso1.php?id=".$id."&n=1";
}

  if ($roooo[7]=='1') {
  $text1 ="Activo";
  $color1="w3-red";
  $adentro1="Bloquear";
  $link1="permiso0.php?id=".$id."&n=2";
}elseif($roooo[7]=='0'){
  $text1="Bloqueado";
  $color1="w3-green";
  $adentro1="Desbloquear";
  $link1="permiso1.php?id=".$id."&n=2";
}

  if ($roooo[8]=='1') {
  $text2 ="Activo";
  $color2="w3-red";
  $adentro2="Bloquear";
  $link2="permiso0.php?id=".$id."&n=3";
}elseif($roooo[8]=='0'){
  $text2="Bloqueado";
  $color2="w3-green";
  $adentro2="Desbloquear";
  $link2="permiso1.php?id=".$id."&n=3";
}


//    $bum='<div class="w3-half">
// <h3>Activar período de reparación de notas</h3>
// </div>
// <form method="POST" action="repa.php?id='.$id.'">
// <div class="w3-half" style="margin-top:10px">
// <input class="w3-check" value="2" name=repa type="radio" '.$ck1 .' >
// <label>Activo</label>

// <input class="w3-check" value="0" name=repa type="radio" '. $ck0 .'>
// <label>Desactivo</label>

// <button style="margin-left: 10px;" class="w3-button w3-blue">Editar estado</button>
// </form>
// </div>';
// }else{
//   $text="Bloqueado";
//   $ck1="";
//   $ck0="checked ";
//    $bum='<div class="w3-half">
// <h3>Activar período de reparación de notas</h3>
// </div>
// <form method="POST" action="repa.php?id='.$id.'">
// <div class="w3-half" style="margin-top:10px">
// <input class="w3-check" value="2" name=repa type="radio" '.$ck1 .' >
// <label>Activo</label>

// <input class="w3-check" value="0" name=repa type="radio" '. $ck0 .'>
// <label>Desactivo</label>

// <button style="margin-left: 10px;" class="w3-button w3-blue">Editar estado</button>
// </form>
// </div>';

// }
?>
  <h3>Panel de permisos de edición. </h3> 
  <table>
    <tr>
      <td><h4>Act1 Estado:</h4></td>
      <td><b><h4><?php echo $text ?></b></h4></td>
      <td><a href="<?php echo $link ?>"><button class="w3-button <?php echo $color ?>"><?php echo $adentro ?></button></a></td>
    </tr>
    <tr>
      <td><h4>Act2 Estado:</h4></td>
      <td><h4><b><?php echo $text1 ?></b></h4></td>
      <td><a href="<?php echo $link1 ?>"><button class="w3-button <?php echo $color1 ?>"><?php echo $adentro1 ?></button></a></td>
    </tr> 
      <tr>
      <td><h4>Exa. Estado:</h4></td>
      <td><h4><b><?php echo $text2 ?></b></h4></td>
      <td><a href="<?php echo $link2 ?>"><button class="w3-button <?php echo $color2 ?>"><?php echo $adentro2 ?></button></a></td>
    </tr>    
  </table>
 

<br><br>
<h3>Desbloquear o bloquear todas las actividades de esta materia</h3>

  <button id="si" class="w3-button w3-red">Bloquear actividades</button>
  <button id="no" class="w3-button w3-green">Desbloquear actividades</button>
  <br><br>

<hr> 
<?php
 // echo $bum ?>

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
<script type="text/javascript">
  $("#si").click(function(){
    var pre=confirm("La siguiente acción bloqueara la edicion para todas las materias ¿Deseá continuar?");
    if (pre) {
      location.href="permiso0.php?id=<?php echo $id ?>"
    }
});
    $("#no").click(function(){
     var pre=confirm("La siguiente acción desbloqueara la edicion para todas las materias ¿Deseá continuar?");
    if (pre) {
      location.href="permiso1.php?id=<?php echo $id ?>"
    }
});
</script>
<?php 
}else{
echo "Error, por favor regresa.";
}


 ?>
