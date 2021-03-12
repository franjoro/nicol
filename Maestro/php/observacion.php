<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require("../../conexion.php");
$id = $_GET["id"];
$ma=$_GET['ma'];
$sql= mysqli_query($conexion,"SELECT COUNT(IdEs) FROM estudiantes WHERE IdEs='$id' ");
$a= mysqli_fetch_array($sql);

if (isset($id) AND $a[0]>0) {

	$query = mysqli_query($conexion,"SELECT * FROM estudiantes WHERE IdEs='$id'");
	$rowq=mysqli_fetch_array($query);
?>
<link rel="stylesheet" type="text/css" href="../css/w3.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<a href="codigos.php?id=<?php echo $ma ?>">
<button class="w3-button w3-blue">Atrás</button></a>
<br><br><br>
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 

        <h2>Aplicar <b>observación</b>: <b><?php echo $id ?></b></h2>
      </header>
      <div class="w3-container">
        
<form action="fun/add_ob.php?id=<?php echo $id ?>&ma=<?php echo $ma ?>" method="POST">
<div class="w3-row-padding">
  <br>


    <label>Observación:</label>
    <textarea style="max-width: 100%; min-width: 100%;height: 200px" class="w3-input w3-border" type="text" name="des" ></textarea>


 <br>

</div>

 <br>
 <button class="w3-button w3-right w3-teal">Ingresar</button>
 <br>

</form>


      </div>
    </div>
    <br>

<?php 
}else{
echo "Error, por favor regresa.";
}
 ?>
<?php 
}else{
  header("location:../../sign/destruir.php");
}
 ?>