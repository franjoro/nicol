<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require_once("../../conexion.php");
$id=$_GET['id'];
$sql= mysqli_query($conexion,"SELECT * FROM materias WHERE idMa='$id'");
$row=mysqli_fetch_array($sql);

$bi=mysqli_query($conexion,"SELECT * FROM bimestre");
$rowbi=mysqli_fetch_array($bi);
// $edit1="btn-info";
// $edit2="btn-info";
// $edit3="btn-info";

$sql1=mysqli_query($conexion,"SELECT Role,Num FROM actividades WHERE idMa='$id' AND Role='1' AND Bimestre='$rowbi[0]' ");
$roww=mysqli_fetch_array($sql1);

if (isset($roww[0]) AND $roww[0]=='1') {
  if ($row[6]=='0') {
  	$edit1=" ";
		$link1=" ";
		$texto1="Sin permisos de edición" ;
  }else{
    $edit1="btn-info";
    $link1="editar.php?id=".$id."&act=1";
    $texto1="*Perfil ingresado, editar. <br> N°Acumulados: <b>".$roww[1]."</b>" ;
  }
	}else{

		$edit1="btn-info";
		$link1="acumulados.php?id=". $id."&act=1";
		$texto1="*Perfil no ingresado";
	}

$sql2=mysqli_query($conexion,"SELECT Role,Num FROM actividades WHERE idMa='$id' AND Role='2' AND Bimestre='$rowbi[0]'");
$row2=mysqli_fetch_array($sql2);
if (isset($row2[0]) AND $row2[0]=='2') {
	 


    if ($row[7]=='0') {
    $edit2=" ";
    $link2=" ";
    $texto2="Sin permisos de edición" ;
  }else{
    $edit2="btn-info";
    $link2="editar.php?id=".$id."&act=2";
    $texto2="*Perfil ingresado, editar. <br> N°Acumulados: <b>".$row2[1]."</b>" ;
  }}else{
		$edit2="btn-info";
		$link2="acumulados.php?id=". $id."&act=2";
		$texto2="*Perfil no ingresado";
	}

$sql3=mysqli_query($conexion,"SELECT Role FROM actividades WHERE idMa='$id' AND Role='3' AND Bimestre='$rowbi[0]'");
$row3=mysqli_fetch_array($sql3);
if (isset($row3[0]) AND $row3[0]=='3') {

  if ($row[8]=='0') {
    $edit3=" ";
    $link3=" ";
    $texto3="Sin permisos de edición" ;
  }else{
    $edit3="btn-info";
    $link3="editarE.php?id=".$id."&act=3";
    $texto3="*Perfil ingresado, editar.</b>" ;
  }
	}else{
		$edit3="btn-info";
    $link3="examen.php?id=".$id."&act=3";
    $texto3="*Perfil no ingresado";
	}

 $sql4=mysqli_query($conexion,"SELECT Role,Num FROM actividades WHERE idMa='$id' AND Role='4' AND Bimestre='$rowbi[0]'");
$row4=mysqli_fetch_array($sql4);




if (isset($row4[0]) AND $row4[0]=='4') {
    $edit4="btn-info";
    $link4="editar.php?id=".$id."&act=4";
    $texto4="*Perfil ingresado, editar." ;
  }else{
    $edit4="btn-info";
    $link4="acumulados.php?id=".$id."&act=4";
    $texto4="*Perfil no ingresado";
  }


   $sql5=mysqli_query($conexion,"SELECT Role,Num FROM actividades WHERE idMa='$id' AND Role='5' AND Bimestre='$rowbi[0]'");
$row5=mysqli_fetch_array($sql5);


if (isset($row5[0]) AND $row5[0]=='5') {
    $edit5="btn-info";
    $link5="editarE.php?id=".$id."&act=5";
    $texto5="*Perfil ingresado, editar." ;
  }else{
    $edit5="btn-info";
    $link5="examen.php?id=".$id."&act=5";
    $texto5="*Perfil no ingresado";
  }











    if ($row[6]=='0') {
    $text="<div class='w3-panel w3-red'>
  <h3>¡Atención!</h3>
  <p>Permisos de edición bloqueados</p>
</div> ";
$abajo=" ";
  }elseif($row[6]==''){
 $text="<div class='w3-panel w3-red'>
  <h3>¡Atención!</h3>
  <p>Permisos de edición bloqueados</p>
</div> ";
$abajo='<div align="center" class="container">
    <h2>Notas de período de reparación</h2><br>
    <div class="row">
      <div class="col-md-6">
        <div class="w3-card-4" style="max-width:55%">
    <img src="../img/1.jpg" alt="Norway" style="width:100%">
    <div class="w3-container w3-center">
      <a href="'.$link4.'"><button style="margin: 10px;" class="btn '.$edit4.' btn-lg">Actividad</button></a>
      <br>
     '.$texto4.'
      
    </div>
  </div>
</div>

  <div class="col-md-6">
  <div class="w3-card-4" style="max-width:55%">
    <img src="../img/1.jpg" alt="Norway" style="width:100%">
    <div class="w3-container w3-center">
      <a href="'.$link5.'"><button style="margin: 10px;" class="btn <?php echo '.$edit5.' ?> btn-lg">Examen</button></a><br>
      '.$texto5.'
    </div>
   
  </div>
  </div>
      </div>
    </div>';
  }else{
    $abajo=" ";
    $text=" ";
  }
 
 ?>

<!DOCTYPE html>
<html>
<head>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Menu de acciones</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
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
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="menu2.php?id=<?php echo $id ?>">Notas <?php echo utf8_encode($row[1]) ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Selecciona la actividad para <b>editar</b> e <b>ingresar</b> información</h1>
        <p class="lead">Materia: <?php echo utf8_encode($row[1]) ?></p>
        <p> Bimestre número: <?php echo $rowbi[0] ?></p>	
      </div>
    </header>

    <br><br>

	<div align="center" class="container">
    <?php echo $text ?>
		<div class="row">
			<div class="col-md-4">
				<div class="w3-card-4" style="width:80%">
    <img src="../img/1.jpg" alt="Norway" style="width:100%">
    <div class="w3-container w3-center">
      <a href="<?php echo $link1 ?>"><button style="margin: 10px;" class="btn <?php echo $edit1 ?> btn-lg">Primer 30%</button></a>
      <p><?php echo $texto1 ?></p>
    </div>
  </div>
</div>
<div class="col-md-4">
	<div class="w3-card-4" style="width:80%">
    <img src="../img/1.jpg" alt="Norway" style="width:100%">
    <div class="w3-container w3-center">
     <a href="<?php echo $link2 ?>"><button style="margin: 10px;" class="btn <?php echo $edit2 ?> btn-lg">Segundo 30%</button></a>
     <p><?php echo $texto2 ?></p>
    </div>
  </div>
	</div>
	<div class="col-md-4">
	<div class="w3-card-4" style="width:80%">
    <img src="../img/1.jpg" alt="Norway" style="width:100%">
    <div class="w3-container w3-center">
      <a href="<?php echo $link3 ?>"><button style="margin: 10px;" class="btn <?php echo $edit3 ?> btn-lg">Examen 40%</button></a>
      <p><?php echo $texto3 ?></p>
    </div>
  </div>
	</div>
			</div>
		</div>


    <hr>
    <?php echo $abajo ?>
    <div class="clear" style="width: 100%; height: 200px;"></div>


</body>
</html>
<?php 
}else{
  header("location:../../sign/destruir.php");
}
 ?>
