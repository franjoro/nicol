<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require("../../conexion.php");
$id = $_GET["id"];
$ma = $_GET["ma"];
$sql= mysqli_query($conexion,"SELECT COUNT(IdEs),IdG FROM estudiantes WHERE IdEs='$id' ");
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

        <h2>Aplicar código de ética Estudiante: <b><?php echo $id ?></b></h2>
      </header>
      <div class="w3-container">
        
<form action="fun/add_cod.php?id=<?php echo $id ?>" method="POST">
<div class="w3-row-padding">
  <br>

<div class="w3-half">

  <label>ID código</label>
  <input type="text" id="id" style="width: 50px" value="0" class="w3-input w3-border">
</div>  
<div class="w3-half">
      <label>Código</label>
    <div id="cod"></div>

</div>
 <br>
</div>
<div class="w3-row-padding">
  <br>


    <label>Descripción:</label>
    <textarea style="max-width: 100%; min-width: 100%" class="w3-input w3-border" type="text" id="des" name="des" ></textarea>


 <br>

</div>


</form>
 <br>
 <button class="w3-button w3-right w3-teal" id="boton">Ingresar</button>
 <br>
 <br>


      </div>
    </div>
    <br>










<?php 
$sqll=mysqli_query($conexion,"SELECT * FROM codigo");

 ?>



<div class="w3-modal-content w3-card-4 w3-animate-opacity" ">
      <header class="w3-container w3-teal" > 
        <h2>Lista de códigos</b></h2>
      </header>

      <div class="w3-container" >
        <center>
      <table border="1" class="w3-table">
        <thead>
          <th>N°</th>
          <th>Código</th>
          <th>Valor </th>
        </thead>
        <?php 
        while($codd=mysqli_fetch_array($sqll)){
         ?>
      <tr>
        <td><?php echo $codd[0] ?></td>
        <td><?php echo utf8_encode($codd[1]) ?></td>
        <td><?php echo $codd[2] ?></td>
      </tr>


        <?php 
          }
         ?>
      </table>
      </center>
      </div>
</div>
  


    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript">
      function obtener(id){
        $.ajax({
          url:"fun/actualizarcodigo.php",
          method: "POST", 
          data:{id:id},
          success: function(data){
             $("#cod").html(data)

          }
        })
      }
$(document).on("blur","#id", function(){
    var id = $("#id").val();
    obtener(id);
})
$(document).on("click","#boton", function(){
    var op = $("#option").val();
    var id = $("#id").val();
    var des = $("#des").val();
   if (op.length > 1) {
        $.ajax({
          url:"fun/add_cod.php?id=<?php echo $id ?>",
          method: "POST", 
          data:{option:id,des:des},
          success: function(data){
             alert(data);
             location.href="codigos.php?id=<?php echo $ma ?>  "
          }
        })



    }else{
      alert("Código no valido")
    }


})
</script>
<script>

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
