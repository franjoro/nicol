<?php 
require("../../../conexion.php");
$id = $_GET["id"];

if (isset($id)) {

	$query = mysqli_query($conexion,"SELECT * FROM notas WHERE idNota='$id'");
	$rowq=mysqli_fetch_array($query);
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/w3.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<a href="../../notas.php">
<button class="w3-button w3-blue">Atrás</button></a>
<br><br><br>
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 

        <h2>Detalle de nota</h2>
      </header>
      <div class="w3-container">
   

   <?php 
  $acti=mysqli_query($conexion,"SELECT * FROM actividades WHERE idAct='$rowq[2]' ");
  $rowact=mysqli_fetch_array($acti);
  $num=$rowq[4];

    if ($num=='1') {
    $rojo=$rowact[7];
  }elseif ($num=='2') {
    $rojo=$rowact[9];
  }elseif ($num=='3') {
    $rojo=$rowact[11];
  }elseif ($num=='4') {
    $rojo=$rowact[13];
  }elseif ($num=='5') {
    $rojo=$rowact[15];
  }elseif ($num=='0') {
    $rojo=$rowact[7];
  }
   ?>     



<form action="edit_fun.php?id=<?php echo $id ?>" method="POST">
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Actividad N°</label>
    <input class="w3-input w3-border" disabled type="text" value="<?php echo $rowact[4] ?>"  >
  </div>
  <div class="w3-half">
    <label>Código Materia:</label>
    <input class="w3-input w3-border" disabled type="text" value="<?php echo $rowact[3] ?>"  >
  </div>
 <br>
</div>
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Bimestre</label>
    <input class="w3-input w3-border" disabled type="text" value="<?php echo $rowact[5] ?>" >
  </div>
  <div class="w3-half">
    <label>Alumno</label>
    <?php 
    $nam=mysqli_query($conexion,"SELECT Nombre, Apellido FROM estudiantes WHERE IdEs='$rowq[3]'");
    $name=mysqli_fetch_array($nam); ?>
    <input class="w3-input w3-border" disabled type="text" value="<?php echo utf8_decode($name[0]." ".$name[1]) ?>"  >
  </div>
 <br>

</div>
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Acumulado N°</label>
    <input class="w3-input w3-border" disabled type="text"  value="<?php echo $rowq[4] ?>" >
  </div>
  <div class="w3-half">
    <label>Nota, Porcentaje del acumulado: <font style="color: red"><?php echo $rojo ?></font></label>
    <input class="w3-input w3-border" maxlength="2" onkeypress="return soloLetras(event)" data-num="<?php echo $rojo ?>"  type="text" name="nota" value="<?php echo $rowq[1] ?>" id="click"   >
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
      <h2>¿Desea eliminar <b>permanentemente</b> los datos de este alumno?</h2>
      <p>Los datos no podran ser recuperados</p>
      <button onclick="document.getElementById('alerta').style.display='none'"  class="w3-button w3-red">Cancelar</button>
      <a href="delete.php?id=<?php echo $id ?>"><button class="w3-button w3-green">Eliminar</button></a>
      <br><br>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).on("blur","#click", function(){
    var num =$(this).data("num");
    var valor =$(this).val();
    if (valor>num) {
      alert("Nota no valida, excede el porcentaje del acumulado")
      $(this).val("");
    }
})
               function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

</script>
<?php 
}else{
echo "Error, por favor regresa.";
}
 ?>
