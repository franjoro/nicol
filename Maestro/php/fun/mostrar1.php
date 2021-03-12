<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php 
require("../../../conexion.php");
$id=$_GET['id'];
$act = $_GET['act'];

$query = mysqli_query($conexion, "SELECT * FROM materias WHERE idMa = '$id'");
$row = mysqli_fetch_array($query);
$grado =$row[3];
$permiso=$row[6];
$permiso2=$row[7];
$permiso3=$row[8];

  if ($permiso2=='0' AND $act=='2') {
    $text="disabled";
  }else{
    $text=" ";
  }
    if ($permiso=='0' AND $act=='1') {
    $text1="disabled";
  }else{
    $text1=" ";
  }

    if ($permiso3=='0' AND $act=='3') {
    $text2="disabled";
  }else{
    $text2=" ";
  }




$query111 = mysqli_query($conexion, "SELECT * FROM bimestre");
$row111 = mysqli_fetch_array($query111);

$sql=mysqli_query($conexion,"SELECT * FROM actividades WHERE idMa='$id' AND Role='$act' AND Bimestre='$row111[0]' ");
$row1=mysqli_fetch_array($sql);
$num=$row1[17];


if ($num=='0') {
  $up='<th scope="col">Nota1-<font style="color:red">'.$row1[7].'</font></th> ';
}
if ($num=='1') {
  $up='<th scope="col">Nota1-<font style="color:red">'.$row1[7].'</font></th>';
}elseif ($num=='2') {
  $up='
  <th scope="col" >Nota1-<font style="color:red">'.$row1[7].'</font></th>
  <th scope="col">Nota2-<font style="color:red">'.$row1[9].'</font></th> 
  <th>Sumatoria</th>';
}elseif ($num=='3') {
   $up='
  <th scope="col">Nota1-<font style="color:red">'.$row1[7].'</font></th>
  <th scope="col">Nota2-<font style="color:red">'.$row1[9].'</font></th>
  <th scope="col">Nota3-<font style="color:red">'.$row1[11].'</font></th>
  <th>Sumatoria</th>';
}elseif ($num=='4') {
   $up='
  <th scope="col">Nota1-<font style="color:red">'.$row1[7].'</font></th>
  <th scope="col">Nota2-<font style="color:red">'.$row1[9].'</font></th>
  <th scope="col">Nota3-<font style="color:red">'.$row1[11].'</font></th>
  <th scope="col">Nota4-<font style="color:red">'.$row1[13].'</font></th>
  <th>Sumatoria</th>';
}elseif ($num=='5') {
   $up='
  <th scope="col">Nota1-<font style="color:red">'.$row1[7].'</font></th>
  <th scope="col">Nota2-<font style="color:red">'.$row1[9].'</font></th>
  <th scope="col">Nota3-<font style="color:red">'.$row1[11].'</font></th>
  <th scope="col">Nota4-<font style="color:red">'.$row1[13].'</font></th>
  <th scope="col">Nota5-<font style="color:red">'.$row1[15].'</font></th>
  <th>Sumatoria</th>';
}
?>

<?php 
  


     ?>
    <br>
    <?php $query = mysqli_query($conexion,"SELECT idEs, Nombre, Apellido FROM estudiantes WHERE IdG='$grado'ORDER BY Apellido ASC  "); ?>

     <div class="container">
    <div class="row">
    	<div class="col-lg-12">
        <div class="table-responsive">

<style type="text/css">
  td{
    width: 30px;
  }
</style>
          
    		<table align="center" class="table">
  <thead class="">
    <tr align="center">
      <th scope="col">Código</th>
      <th scope="col">Estudiante</th>

      	<?php echo $up ?>

    <div>
      </div>

    </tr>
  </thead>
  <?php  while($row = mysqli_fetch_array($query)){

// funcion NOTAS=============================
	$notas=mysqli_query($conexion,"SELECT * FROM notas WHERE idAct='$row1[0]' AND IdEs='$row[0]' AND Role='1'   ");
	$rownotas =mysqli_fetch_array($notas);

	$notas1=mysqli_query($conexion,"SELECT * FROM notas WHERE idAct='$row1[0]' AND IdEs='$row[0]' AND Role='2'  ");
	$rownotas1 =mysqli_fetch_array($notas1);

	$notas2=mysqli_query($conexion,"SELECT * FROM notas WHERE idAct='$row1[0]' AND IdEs='$row[0]' AND Role='3'  ");
	$rownotas2 =mysqli_fetch_array($notas2);

	$notas3=mysqli_query($conexion,"SELECT * FROM notas WHERE idAct='$row1[0]' AND IdEs='$row[0]' AND Role='4'  ");
	$rownotas3 =mysqli_fetch_array($notas3);

	$notas4=mysqli_query($conexion,"SELECT * FROM notas WHERE idAct='$row1[0]' AND IdEs='$row[0]' AND Role='5'  ");
	$rownotas4 =mysqli_fetch_array($notas4);

  $notas5=mysqli_query($conexion,"SELECT * FROM notas WHERE idAct='$row1[0]' AND IdEs='$row[0]' AND Role='0'  ");
  $rownotas5 =mysqli_fetch_array($notas5);


// funcion NOTAS=============================
  	?>
  <tbody>
    <tr align="center">

      <td style="width: 150px" scope="row"><?php echo $row['idEs']; ?></td>
      <td style="width: 300px"><?php  echo utf8_encode($row['Apellido']) . "\n" . utf8_encode($row['Nombre'])  ?></td>
      <div>
<?php 
if ($num=='0') {
  $down='<td><input  '.$text.' '.$text1.''.$text2.'   style="width:10" onkeypress="return soloLetras(event)" maxlength="2" data-num='.$row1[7].' data-id_notas='.$rownotas5[0].' value='.$rownotas5[1].'  class="form-control"  type="text" id="uno" name="uno"></td>';
}	
if ($num=='1') {
  $down='<td><input style="width:10" '.$text.''.$text1.''.$text2.' onkeypress="return soloLetras(event)" maxlength="2" data-num='.$row1[7].' data-id_notas='.$rownotas[0].' value='.$rownotas[1].'  class="form-control"  type="text" id="uno" name="uno"></td>';
}elseif ($num=='2') {
  $sumaa=$rownotas[1]+$rownotas1[1];
  $down='
  <td><input onkeypress="return soloLetras(event)" '.$text.' '.$text1.''.$text2.' maxlength="2" data-num='.$row1[7].' data-id_notas='.$rownotas[0].' value='.$rownotas[1].' class="form-control"  type="text" id="uno" name="uno"></td>
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[9].' data-id_notas='.$rownotas1[0].' value='.$rownotas1[1].' class="form-control"  type="text" id="dos" name="dos"></td>
  <td><strong><span style="color:red">'.$sumaa.'</span></strong></td>';
}elseif ($num=='3') {
   $sumaa=$rownotas[1]+$rownotas1[1]+$rownotas2[1];
  $down='
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'   maxlength="2" data-num='.$row1[7].' data-id_notas='.$rownotas[0].' value='.$rownotas[1].' class="form-control"  type="text" id="uno" name="uno"></td>
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[9].' data-id_notas='.$rownotas1[0].' value='.$rownotas1[1].' class="form-control"  type="text" id="dos" name="dos"></td>
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[11].' data-id_notas='.$rownotas2[0].' value='.$rownotas2[1].' class="form-control"  type="text" id="tres" name="tres"></td>
   <td><strong><span style="color:red">'.$sumaa.'</span></strong></td>';
}elseif ($num=='4') {
   $sumaa=$rownotas[1]+$rownotas1[1]+$rownotas2[1]+$rownotas3[1];
  $down='
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[7].' data-id_notas='.$rownotas[0].' value='.$rownotas[1].' class="form-control"  type="text" id="uno" name="uno"></td>
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[9].' data-id_notas='.$rownotas1[0].' value='.$rownotas1[1].' class="form-control"  type="text" id="dos" name="dos"></td>
   <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[11].' data-id_notas='.$rownotas2[0].' value='.$rownotas2[1].' class="form-control"  type="text" id="tres" name="tres"></td>
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[13].' data-id_notas='.$rownotas3[0].' value='.$rownotas3[1].' class="form-control"  type="text" id="cuatro" name="cuatro"></td>
   <td><strong><span style="color:red">'.$sumaa.'</span></strong></td>';
}elseif ($num=='5') {
     $sumaa=$rownotas[1]+$rownotas1[1]+$rownotas2[1]+$rownotas3[1]+$rownotas4[1];
  $down='
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[7].' data-id_notas='.$rownotas[0].' value='.$rownotas[1].' class="form-control"  type="text" id="uno" name="uno"></td>
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[9].' data-id_notas='.$rownotas1[0].' value='.$rownotas1[1].' class="form-control"  type="text" id="dos" name="dos"></td>
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[11].' data-id_notas='.$rownotas2[0].' value='.$rownotas2[1].' class="form-control"  type="text" id="tres" name="tres"></td>
  <td><input onkeypress="return soloLetras(event)"'.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[13].' data-id_notas='.$rownotas3[0].' value='.$rownotas3[1].' class="form-control"  type="text" id="cuatro" name="cuatro"></td>
  <td><input onkeypress="return soloLetras(event)" '.$text.''.$text1.''.$text2.'  maxlength="2" data-num='.$row1[15].' data-id_notas='.$rownotas4[0].' value='.$rownotas4[1].' class="form-control"  type="text" id="cinco" name="cinco"></td>
   <td><strong><span style="color:red">'.$sumaa.'</span></strong></td>';
}  echo $down;
 ?>
      </div>
    </tr>
  
  </tbody>
  <?php } ?>
</table>
 <!--  <button style="float: right; margin: 10px; " class="btn btn-info">Entregar</button>
  <button style="float: right; margin: 10px;" class="btn btn-success">Guardar</button> -->
</div>
    	</div>
    	
    </div>
   </div>

   <script type="text/javascript">
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