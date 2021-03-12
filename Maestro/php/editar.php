<?php 
session_start();
require '../../conexion.php';
$id = $_GET['id'];
$bum = $_GET['act'];

$query111 = mysqli_query($conexion, "SELECT * FROM bimestre");
$row111 = mysqli_fetch_array($query111);

$sql= mysqli_query($conexion,"SELECT * FROM actividades WHERE idMa='$id' AND Role='$bum' AND Bimestre='$row111[0]'");
$row=mysqli_fetch_array($sql);

    $disabled2="";
    $disabled3="";
    $disabled4="";
    $disabled5="";
if ($row[17]=='1') {
    $disabled2="disabled";
    $disabled3="disabled";
    $disabled4="disabled";
    $disabled5="disabled";
}

if ($row[17]=='2') {
    $disabled3="disabled";
    $disabled4="disabled";
    $disabled5="disabled";
}
if ($row[17]=='3') {
    $disabled4="disabled";
    $disabled5="disabled";
}
if ($row[17]=='4') {
    $disabled5="disabled";
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <title>Acumulados - Actividades</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

   

    <script>
        $(document).ready(function(){
            setInterval(function(){ sumatoria();
            color(); }, 3000);

function sumatoria(){
    var p1 = $("#por1").val();
    var p2 = $("#por2").val();
    var p3 = $("#por3").val();
    var p4 = $("#por4").val();
    var p5 = $("#por5").val();

    var resultado = parseFloat(p1) + parseFloat(p2)+ parseFloat(p3)+ parseFloat(p4)+ parseFloat(p5);
    // var exp = (p1)+(p2)+(p3)+(p4)+(p5);
    $("#sum").val(resultado);
}
function color(){
    var i= $("#sum").val();
    if (i=="30") {
        $("#sum").removeClass("border-dark");
        $("#sum").removeClass("border-danger");
        $("#sum").removeClass("bg-danger");
        $("#sum").addClass("border-success");
        $("#sum").addClass("bg-success");
    }else{
        $("#sum").removeClass("border-dark");
        $("#sum").removeClass("border-success");
        $("#sum").removeClass("bg-success");
        $("#sum").addClass("border-danger");
        $("#sum").addClass("bg-danger");

    }
}

$(document).on("blur","#por1", function(){
    sumatoria();
    color();
})

$(document).on("blur","#por2", function(){
    sumatoria();
    color();
})

$(document).on("blur","#por3", function(){
    sumatoria();
    color();
})

$(document).on("blur","#por4", function(){
    sumatoria();
    color();
})

$(document).on("blur","#por5", function(){
    sumatoria();
    color();
})
$(document).on("click","#boton", function(){
     var i= $("#sum").val();
    if (i!="30") {
        alert("Error, Recuerda que la sumatoria debe ser 30")
    }else{
        var t1 = $("#one").val();
        var t2 = $("#two").val();
        var t3 = $("#three").val();
        var t4 = $("#four").val();
        var t5 = $("#five").val();

        var p1 = $("#por1").val();
        var p2 = $("#por2").val();
        var p3 = $("#por3").val();
        var p4 = $("#por4").val();
        var p5 = $("#por5").val();
        var ti = $("#titulo").val();
        var des= $("#des").val();
         $.ajax({
        url:"fun/actualizar.php?id=<?php echo $id ?>&act=<?php echo $bum ?>",
        method: "POST",
        data: {t1:t1,t2:t2,t3:t3,t4:t4,t5:t5,p1:p1,p2:p2,p3:p3,p4:p4,p5:p5,ti:ti,des:des},
        success:function(data){
            alert(data);
            location.href='menu.php?id=<?php echo $id ?>';
        }
      })

    }
})

$(document).on("click","#eliminar", function(){

    var si = confirm("¿Eliminar actividad permanentemente?, las notas ingresadas de esta actividad seran eliminadas")
    if (si) {
                 $.ajax({
        url:"fun/eliminar.php?id=<?php echo $id ?>&act=<?php echo $bum ?>",
        method: "POST",
        success:function(data){
            alert(data);
            location.href='menu.php?id=<?php echo $id ?>';
        }
      })
 
    }
})
   
});
    </script>

</head>
<body >

	 <body id="page-top" >

    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Acumulados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
             <a style="color: snow;" class="nav-link js-scroll-trigger" href="../index.php"><i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="menu.php?id=<?php echo $id ?>"><i class="fas fa-arrow-left"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Aquí podra <b>editar</b> los acumulados de su actividad</h1>
      </div>
    </header>

    <br>
    <div class="container">
        <button type="button" id="eliminar" class="btn btn-danger" style="float: right;">Eliminar actividad</button><div class="row">

        <div class="col-lg-6"><h4>Titulo de la actividad</h4><textarea id="titulo" class="form-control one border border-dark"><?php echo $row[1] ?></textarea> </div>
        <div class="col-lg-6"><h4>Descripción de la actividad</h4> <textarea id="des" class="form-control one border border-dark"><?php echo $row[2] ?></textarea></div>    
    </div>
    </div>
    <div class="container" >
    <hr><br><br>
    	<div class="row">
    		<div class="col-lg-4 col-md-12">
    			<h4>Número de acumulados: <b><?php echo $row[17] ?></b></h4>

    		</div>
            <br>
    		<div align="center" style="margin-top: -5px;" class="col-sm-6 col-md-6 col-lg-5">
                <h4>Descripción</h4>
    			<textarea id="one"  class="taera inv form-control one border border-dark"> <?php echo $row[6] ?></textarea>
    			<textarea id="two" <?php echo $disabled2 ?> class="taera inv form-control two border border-dark"><?php echo $row[8] ?></textarea>
    			<textarea id="three" <?php echo $disabled3 ?> class="taera inv form-control three border border-dark"><?php echo $row[10] ?></textarea>
    			<textarea id="four" <?php echo $disabled4 ?> class="taera inv form-control four border border-dark"><?php echo $row[12] ?></textarea>
    			<textarea id="five" <?php echo $disabled5 ?> class="taera inv form-control five border border-dark"><?php echo $row[14] ?></textarea>
    		</div>
    		<div class="col-sm-6 col-md-6 col-lg-2">
                <h4>Porcentaje</h4>
    			<input type="text" id="por1" maxlength="2" value="<?php echo $row[7] ?>"  class="form-control inv porce one por border border-dark" name="" onkeypress="return soloLetras(event)">
    			<input type="text" id="por2" maxlength="2" value="<?php echo $row[9] ?>" <?php echo $disabled2 ?> class="form-control inv porce two por border border-dark" name="" onkeypress="return soloLetras(event)">
    			<input type="text" id="por3" maxlength="2" value="<?php echo $row[11] ?>" <?php echo $disabled3 ?> class="form-control inv porce three por border border-dark" name="" onkeypress="return soloLetras(event)">
    			<input type="text" id="por4" maxlength="2" value="<?php echo $row[13] ?>" <?php echo $disabled4 ?> class="form-control inv porce four por border border-dark" name="" onkeypress="return soloLetras(event)">
    			<input type="text" id="por5" maxlength="2" value="<?php echo $row[15] ?>" <?php echo $disabled5 ?> class="form-control inv porce five por border border-dark" name="" onkeypress="return soloLetras(event)">
    		</div>
            <div style="margin-top: 40px;" class="col-lg-1">
                <label>Sumatoria</label>
                <input type="text" class="form-control border border-dark" id="sum" disabled name="" style="width:60px; color:white;" >
<!--                 <p class="porce">%</p>
                <p class="porce">%</p>
                <p class="porce">%</p>
                <p class="porce">%</p> -->
            </div>
    	</div><br>
        <button type="button" id="boton" class="btn btn-success" style="float: right;">Editar</button><br><br>
    </div>


<!-- 
<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">&copy; iCoding 2018</p>
      </div>
      <!-- /.container -->
    <!-- </footer> -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="../js/scrolling-nav.js"></script>
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
</body>
</html>
