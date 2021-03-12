<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require("../conexion.php");
$usu = $_SESSION['username'];
$ac=mysqli_query($conexion,"SELECT acceso FROM users WHERE Username='$usu'");
$acc=mysqli_fetch_array($ac);

$bi=mysqli_query($conexion,"SELECT id FROM bimestre");
$bimestre=mysqli_fetch_array($bi);

if ($bimestre[0]==1 OR $bimestre[0]==2 ) {
  $bii ="1";
}else{
  $bii ="2";
}

if ($acc[0]=='1') {

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenido Maestro</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" href="img/1.png">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Maestro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           <!--  <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Estudiantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Profesor guia</a>
            </li> -->
            <li class="nav-item">
              <a style="color: snow;" class="nav-link" href="../sign/destruir.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- <br><br> -->

<?php 

  $usu = $_SESSION['username'];

  $query = mysqli_query($conexion,"SELECT Nombre, Apellido, Puesto, Genero,idM,img FROM maestros WHERE idM = '$usu'");
  $row = mysqli_fetch_array($query);

if ($row[5]=='0') {
  if ($row[3]=="Masculino") {
    $imagen="img/hombre.png";
  }elseif ($row[3]=="Femenino") {
    $imagen="img/mujer.png";
  }

}else{
	$imagen="php/".$row[5];
}



 ?>

    <header class="bg1 bg-primary text-white">
      <div style="margin-top: -30px;" class="container text-center">
        <h2 class="pop">Bienvenido</h2>
        <h5>Prof. <?php echo utf8_encode($row['Nombre']." ".$row[1]) ?></h5>
        <div onclick="document.getElementById('buton').style.display='inline'" class="pimage" style="cursor:pointer;background-image: url('<?php echo $imagen ?>');"></div>
        <form enctype="multipart/form-data" method="POST" action="php/imagen.php?id=<?php echo $row[4] ?>">
        <div id="buton"  style="display:none">
        <input type="file" name="file" required="">
        <button class="w3-button w3-green" type="submit">Cambiar imagen</button>
        </div>
        
        </form>  
        
       <!--  <div class="special">
        <p class="lead">Prof. <?php 
        // echo $row['Puesto'] ?></p>
        </div> -->
      </div>
      <div class="bum">
      <center>
        <a style="text-decoration: none; color: white; display: inline;" class="nav-link js-scroll-trigger" href="#actions"><i class="fa fa-arrow-down yei animated fadeOut infinite" aria-hidden="true"></i></a>
        </center>
        </div>
    </header>




    <section id="actions">
      <div style="margin-top: -70px;" class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto">       
          
            <center>
              <!-- <br> -->
              <h2><strong>Acciones</strong></h2>
              
<MARQUEE BGCOLOR="#FF7070"><strong>CSSJB : " PATRIA VIRTUD CIENCIA LABOR "</strong></MARQUEE>

 <div style="margin-left: 20px;">
  <!-- <a href="php/codigos.php"> -->
  <figure  class="snip1577" onclick="document.getElementById('modal_codi').style.display='block'" style="cursor: pointer;">
  <img src="img/7.jpg" alt="sample99" />
  <figcaption>
    <h3 style="margin-top: -60px;">Códigos de ética</h3>
    <h4>Ver</h4>
  </figcaption>
  <label>Codigos</label>
  <!-- <a href="#"></a> -->
</figure>
  </a>

<figure class="snip1577" onclick="document.getElementById('modal_alum').style.display='block'" style="cursor: pointer;">
  <img src="img/7.jpg" alt="sample99" />
  <figcaption>
    <h3 style="margin-top: -60px;">Estudiantes</h3>
    <h4>Ver</h4>
  </figcaption>
  <label>Estudiantes</label>
</figure>
   
<!--  <figure class="snip1577" onclick="document.getElementById('modal').style.display='block'" style="cursor: pointer;" ><img src="img/7.jpg" alt="sample109" />
  <figcaption>
    <h3 style="margin-top: -60px;">Notas Bimestrales</h3>
    <h4>Ver</h4>
  </figcaption>
  <label>Notas Bimestrales</label>
</figure>

<figure class="snip1577" onclick="document.getElementById('modal_final').style.display='block'" style="cursor: pointer;" ><img src="img/7.jpg" alt="sample109" />
  <figcaption>
    <h3 style="margin-top: -60px;">Notas Finales</h3>
    <h4>Ver</h4>
  </figcaption>
  <label>Notas Finales</label>
</figure>    -->

<figure onclick="document.getElementById('modal_reporte').style.display='block'" style="cursor: pointer;" class="snip1577"><img src="img/9.jpg" alt="sample117" />
  <figcaption>
    <h3 style="margin-top: -60px;">Acumulados</h3>
    <h4>Ingresar</h4>
  </figcaption>
  <label>Acumulados</label>
  <!-- <a href=""></a> -->
</figure>


<figure onclick="document.getElementById('modal_acumu').style.display='block'" style="cursor: pointer;" class="snip1577"><img src="img/9.jpg" alt="sample117" />
  <figcaption>
    <h3 style="margin-top: -60px;">Notas</h3>
    <h4>Ingresar</h4>
  </figcaption>
  <label>Notas</label>
  <!-- <a href=""></a> -->
</figure>

<MARQUEE BGCOLOR="#FF7070"><strong>CSSJB : " PATRIA VIRTUD CIENCIA LABOR "</strong></MARQUEE>

</center>
</div>
 </div>
        </div>
      </div>
    </section>

   <div id="modal_reporte" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_reporte').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Notas </h2>
      </header>
<?php 
  $oso = $_SESSION['username'];
  $pop = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='0' AND (idM ='$oso' OR 2idM='$oso')  ");
  $pop1 = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='$bii' AND idM = '$oso'");
  ?>
      <div class="w3-container " >
  <center><h1>Seleccione una materia:</h1> <br> </center>
    <h5><strong>*Materias anuales</strong></h5>
 
    <?php  while($row = mysqli_fetch_array($pop)){

      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$row[3]'");
      $gg =mysqli_fetch_array($g);

     ?>
   <a href="php/menu.php?id=<?php echo $row[0] ?>">  

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
        <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($row[1]); ?></span>
      </div>
    </div>
    
</a>

<?php } ?>

   </div>
<div class="w3-container">

<h5><strong>*Materias semestrales</strong></h5> 
 
 
 
    <?php  
    if (mysqli_num_rows($pop1)=='0') {
?>
<center>
<label><strong>*Materias semestrales no asignadas</strong></label>
  </center> 
   <?php  
   }else{
    while($rowww = mysqli_fetch_array($pop1))
    {
      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$rowww[3]'");
      $gg =mysqli_fetch_array($g);
      ?>
 
   <a href="php/menu.php?id=<?php echo $rowww[0] ?>">  

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
      <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($rowww[1]); ?></span>
      </div>
    </div>
    
</a>

<?php }}?>
<br>
      
</div>

    </div>
  </div>

  <div id="modal_acumu" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_acumu').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Notas </h2>
      </header>
<?php 
  // $oso = $_SESSION['username'];
  $pop = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='0' AND (idM ='$oso' OR 2idM='$oso')  ");
  $pop1 = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='$bii' AND idM = '$oso'");

  ?>

      <div class="w3-container">
  <center><h1>Seleccione una materia:</h1> <br> </center>
    <h5><strong>*Materias anuales</strong></h5>
 
 

    <?php  while($row = mysqli_fetch_array($pop)){
            $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$row[3]'");
      $gg =mysqli_fetch_array($g);
     ?>
   
 <a href="php/menu2.php?id=<?php echo $row[0] ?>">  

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
           <label><?php echo $gg[0]." ".$gg[1] ?></label> 
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($row[1]); ?><span>
      </div>
    </div>
    
</a>
<?php } ?>

  </div>
<div class="w3-container">
<h5><strong>*Materias semestrales</strong></h5> 
 

    <?php  
    if (mysqli_num_rows($pop1)=='0') {
?>
<center>
<label><strong>*Materias semestrales no asignadas</strong></label>
 </center>
   <?php  
   }else{
    while($rowww = mysqli_fetch_array($pop1))
    {
      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$rowww[3]'");
      $gg =mysqli_fetch_array($g);
      ?>
  
<a href="php/menu2.php?id=<?php echo $rowww[0] ?>">  
    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
          <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($rowww[1]); ?><span>
      </div>
    </div>
</a>

<?php }}?>
</div>
      </div>
    </div>
  </div>


  <!-- ===================================================================-->
   <div id="modal" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Notas Bimestrales</h2>
      </header>
<?php 
  $oso = $_SESSION['username'];
  $pop = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='0' AND (idM ='$oso' OR 2idM='$oso')  ");
  $pop1 = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='$bii' AND idM = '$oso'");
  ?>
      <div class="w3-container " >
  <center><h1>Seleccione una materia:</h1> <br> </center>
    <h5><strong>*Materias anuales</strong></h5>
 
    <?php  while($row = mysqli_fetch_array($pop)){

      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$row[3]'");
      $gg =mysqli_fetch_array($g);

     ?>
   <a href="php/BoletinMaestro.php?id=<?php echo $row[0] ?>">  

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
        <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($row[1]); ?></span>
      </div>
    </div>
    
</a>

<?php } ?>

   </div>
<div class="w3-container">

<h5><strong>*Materias semestrales</strong></h5> 
 
 
 
    <?php  
    if (mysqli_num_rows($pop1)=='0') {
?>
<center>
<label><strong>*Materias semestrales no asignadas</strong></label>
  </center> 
   <?php  
   }else{
    while($rowww = mysqli_fetch_array($pop1))
    {
      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$rowww[3]'");
      $gg =mysqli_fetch_array($g);
      ?>
 
  <a href="php/BoletinMaestro.php?id=<?php echo $rowww[0] ?>">  

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
      <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($rowww[1]); ?></span>
      </div>
    </div>
    
</a>

<?php }}?>
<br>
      
</div>

    </div>
  </div>


     <!--  ======================   Reportes de profesor guia  =====================    -->

 <div id="principal">
      <div class="w3-container">
  <center><h3>Reporte Guía:</h3> <br>
  <div class="3-row">

<a href="../Administrador/grados/bimestreD.php"><button class="btn btn-info btn-lg"><i class="fa fa-file" aria-hidden="true"></i>        Guiado</button></a>
    
  </div>
  <br>
  </center>
      </div>
    </div>

     <!--  ======================   Fin de Reportes de profesor guia  =======================  -->


  <!-- ============================================ -->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">&copy; Colegio Salesiano San Juan Bosco</p>
        <p class="m-0 text-center text-white">C Real Jalteva Granada - Nic</p>
        <p class="m-0 text-center text-white">(505) 2522 2533</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>


 <div id="id01" class="w3-modal"  >
    <div class="w3-modal-content">
      <div class="w3-container">
        <h1>Cambiar la contraseña nos ayudara con la seguridad</h1>
        <label>Por favor ingresa una nueva contraseña:</label>
        <form action="php/fun/contra.php?id=<?php echo $usu ?>" method="POST">
        <input type="Password" class="w3-input w3-border" name="contra">
        <br>
        <button class="w3-button w3-green" type="submit" style="float: right;">Cambiar</button>
        </form>
        <br><br>
      </div>
    </div>
  </div>
<?php 
// VALIDACION CONTRASEÑA=====================================
$opContra=md5($usu);
$contrasql=mysqli_query($conexion,"SELECT Password FROM users WHERE Username='$usu'");
$contrarow=mysqli_fetch_array($contrasql);
if ($contrarow[0]<>$opContra) {
}else{
	echo "<script>function myFunction() {
    document.getElementById('id01').style.display = 'block';}
myFunction()</script>";
  
}

// VALIDACION CONTRASEÑA=====================================
 ?>

       <!-- Inicio Estudiantes  -->

             <div id="modal_alum" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_alum').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Notas </h2>
      </header>
<?php 
  $oso = $_SESSION['username'];
  $pop = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='0' AND (idM ='$oso' OR 2idM='$oso')  ");
  $pop1 = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='$bii' AND idM = '$oso'");

  ?>

      <div class="w3-container">
  <center><h1>Seleccione una materia:</h1> <br> </center>
    <h5><strong>*Materias anuales</strong></h5>
 
 

    <?php  while($row = mysqli_fetch_array($pop)){
            $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$row[3]'");
      $gg =mysqli_fetch_array($g);
     ?>
   
 <a href="php/Esview.php?id=<?php echo $row[0] ?>">  

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
           <label><?php echo $gg[0]." ".$gg[1] ?></label> 
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($row[1]); ?><span>
      </div>
    </div>
    
</a>
<?php } ?>

  </div>
<div class="w3-container">
<h5><strong>*Materias semestrales</strong></h5> 
 

    <?php  
    if (mysqli_num_rows($pop1)=='0') {
?>
<center>
<label><strong>*Materias semestrales no asignadas</strong></label>
 </center>
   <?php  
   }else{
    while($rowww = mysqli_fetch_array($pop1))
    {
      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$rowww[3]'");
      $gg =mysqli_fetch_array($g);
      ?>
  
<a href="php/Esview.php?id=<?php echo $rowww[0] ?>">  
    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
          <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($rowww[1]); ?><span>
      </div>
    </div>
</a>

<?php }}?>
</div>
      </div>
    </div>
  </div>
    <!-- Fin Estudiantes  -->


     <!-- Inicio Notas Fnales   -->


   <div id="modal_final" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_final').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Notas Finales</h2>
      </header>
<?php 
  $oso = $_SESSION['username'];
  $pop = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='0' AND (idM ='$oso' OR 2idM='$oso')  ");
  $pop1 = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='$bii' AND idM = '$oso'");
  ?>
      <div class="w3-container " >
  <center><h1>Seleccione una materia:</h1> <br> </center>
    <h5><strong>*Materias anuales</strong></h5>
 
    <?php  while($row = mysqli_fetch_array($pop)){

      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$row[3]'");
      $gg =mysqli_fetch_array($g);

     ?>
   <a href="php/BoletinMaestro_final.php?id=<?php echo $row[0] ?>">  

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
        <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($row[1]); ?></span>
      </div>
    </div>
    
</a>

<?php } ?>

   </div>
<div class="w3-container">

<h5><strong>*Materias semestrales</strong></h5> 
 
 
 
    <?php  
    if (mysqli_num_rows($pop1)=='0') {
?>
<center>
<label><strong>*Materias semestrales no asignadas</strong></label>
  </center> 
   <?php  
   }else{
    while($rowww = mysqli_fetch_array($pop1))
    {
      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$rowww[3]'");
      $gg =mysqli_fetch_array($g);
      ?>
 
  <a href="php/BoletinMaestro_final.php?id=<?php echo $rowww[0] ?>">  

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
      <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($rowww[1]); ?></span>
      </div>
    </div>
    
</a>

<?php }}?>
<br>
      
</div>

    </div>
  </div>




   <!-- Fin Notas Fnales   -->



     


  <div id="modal_codi" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_codi').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Notas Bimestrales</h2>
      </header>
<?php 
  $oso = $_SESSION['username'];
  $pop = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='0' AND (idM ='$oso' OR 2idM='$oso')  ");
  $pop1 = mysqli_query($conexion, "SELECT * FROM materias WHERE Role='$bii' AND idM = '$oso'");
  ?>
      <div class="w3-container " >
  <center><h1>Seleccione una materia:</h1> <br> </center>
    <h5><strong>*Materias anuales</strong></h5>
 
    <?php  while($row = mysqli_fetch_array($pop)){

      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$row[3]'");
      $gg =mysqli_fetch_array($g);

     ?>
<a href="php/codigos.php?id=<?php echo $row[0] ?>">

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
        <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($row[1]); ?></span>
      </div>
    </div>
    
</a>

<?php } ?>

   </div>
<div class="w3-container">

<h5><strong>*Materias semestrales</strong></h5> 
 
 
 
    <?php  
    if (mysqli_num_rows($pop1)=='0') {
?>
<center>
<label><strong>*Materias semestrales no asignadas</strong></label>
  </center> 
   <?php  
   }else{
    while($rowww = mysqli_fetch_array($pop1))
    {
      $g=mysqli_query($conexion,"SELECT Nombre,Seccion FROM grados WHERE idG='$rowww[3]'");
      $gg =mysqli_fetch_array($g);
      ?>
 
<a href="php/codigos.php?id=<?php echo $rowww[0] ?>">

    <div class="w3-quarter w3-padding" style="height: 25%;width: 50%">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
      <label><?php echo $gg[0]." ".$gg[1] ?></label>
        </div>
        <div class="w3-clear"></div>
        <span><?php echo  utf8_encode($rowww[1]); ?></span>
      </div>
    </div>
    
</a>

<?php }}?>
<br>
      
</div>

  </div>

  </body>

</html>
<?php 
}else{
  echo "Sin Acceso a la plataforma, Por favor comunicarse con el administrador";
}
}else{
  header("location:../sign/destruir.php");
}
 ?>