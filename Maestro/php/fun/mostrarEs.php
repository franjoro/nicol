<?php 
require("../../../conexion.php");
$id = $_GET['id'];
$ma=$_GET['g'];
$sql= mysqli_query($conexion,"SELECT * FROM estudiantes WHERE IdEs='$id' ORDER BY Apellido ASC");
$row=mysqli_fetch_array($sql);
 ?>
<!DOCTYPE html>
<html>
<title>Conducta</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<a href="../Esview.php?id=<?php echo $ma ?>">
<button class="w3-button w3-red w3-left">X</button>
</a>
  <div class="w3-content">
      
<br>
    <div class="w3-half">
     <table class="w3-table w3-bordered">
       <thead>
         <th colspan="2"><h1>Estudiante:<b> <?php echo utf8_decode($row[1]." ".$row[2]) ?></b></h1></th>
       </thead>
       <tr>
         <td><h4><b>Grado:</b><?php echo $row[4] ?></h4></td>
         <td><h4><b>Código:</b> <?php echo $row[0] ?></h4></td>
       </tr>
     </table>

    </div>
    <div class="w3-half ">
      <label>Bimestre:</label>
        <select id="acumu" class="w3-select">
            <option class="dis">Selecciona el bimestre</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
    </div>



   <div class="w3-half w3-center">
    
 
    </div>
  
<?php 


if (isset($_GET['b'])) {
  $bimestre=$_GET['b'];
}else{
$sqlBi=mysqli_query($conexion,"SELECT * FROM bimestre");
$rowbi=mysqli_fetch_array($sqlBi);
$bimestre=$rowbi[0];
}

if ($bimestre=='1') {
  $columna="conducta1";
}elseif ($bimestre=='2') {
  $columna="conducta2";
}elseif ($bimestre=='3') {
  $columna="conducta3";
}elseif ($bimestre=='4') {
  $columna="conducta4";
}
$sql1=mysqli_query($conexion,"SELECT * FROM aplicados WHERE IdEs='$id' AND bimestre='$bimestre'");


$sqlEs=mysqli_query($conexion,"SELECT $columna FROM estudiantes WHERE IdEs='$id'");
$rowEs=mysqli_fetch_array($sqlEs);

if ($rowEs[0]>=90) {
  $color='green';
  $texto="¡Excelente!";
}elseif ($rowEs[0]>=95 AND $rowEs[0]<=90 ) {
  $color='green';
  $texto="¡Muy bien!";
}elseif ($rowEs[0]>=80 AND $rowEs[0]<=90 ) {
  $color='black';
  $texto="bien";
}elseif ($rowEs[0]<80 ) {
  $color='yellow';
  $texto="Debe mejorar";
}
 ?>

</div>
</div>
<center><h1>Puntaje: <?php echo $rowEs[0] ?></h1>
<h2 style="color:<?php echo $color ?>"><?php echo $texto ?></h2>
<h4>Bimestre: <?php echo $bimestre ?></h4></center>
<div class="w3-container">
   <table class="w3-table w3-bordered" style="width: 100%">
      <thead>
        <th style="width: 40%">Código</th>
        <th style="width: 40%">Descripción</th>
        <th style="width: 20%"></th>
      </thead>
      <?php 

       while ($row= mysqli_fetch_array($sql1)) { 
            $sql2=mysqli_query($conexion,"SELECT Codigo,valor FROM codigo WHERE idCodigo='$row[1]'");
            $cod =mysqli_fetch_array($sql2);
              ?>
            
        <tr>
          <td><?php echo $cod[0] ?> <br><b>Valor:<?php echo $cod[1] ?></b></td>
          <td><?php echo $row[2] ?></td>
          <td><b>Fecha:</b><?php echo $row[6] ?> <br> <b>Maestro:</b><?php echo $row[4] ?></td>
        </tr>
        <?php 
      }
         ?>
    </table>
</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.js"
  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
  crossorigin="anonymous"></script> 
<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}


    $('#acumu').change(function(){
        var selectedOption = $('#acumu option:selected');
  if (selectedOption.val() == 1) {
        location.href='mostrar.php?id=<?php echo $id ?>&b=1 ';
        }else if (selectedOption.val() == 2) {
          location.href='mostrar.php?id=<?php echo $id ?>&b=2 ';
        }else if (selectedOption.val() == 3) {
          location.href='mostrar.php?id=<?php echo $id ?>&b=3 ';
        }else if (selectedOption.val() == 4) {
          location.href='mostrar.php?id=<?php echo $id ?>&b=4 ';
        }
      })
</script>

</body>
</html>
