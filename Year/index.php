<?php 
session_start();
require "conexion.php";


 ?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container">

  <h2>Configuración año <?php $date = date('Y')+1; echo $date ?></h2>
  <p>A continuación una serie de pasos a seguir para la correcta configuración</p>

	<div class="w3-row">


<div class="w3-half w3-padding">

  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-orange">
      <h1>Paso 1</h1>
    </header>

    <div class="w3-container">
    	<h4><ul><li>Creación de nueva base de datos</li></ul></h4>
    	<ol>
      <li>Hacer click en el botón "Crear base de datos"</li>
      <li>Verificar creación en el servidor. El nombre debe ser "dbnicol"+año. <strong>Ejemplo: "dbnicol19"</strong> </li>
      <li>Posteriormente crear las tablas</li>
      
      <ol><a href="p1/create.php"><button class="w3-button w3-grey">Crear base de datos</button></a></ol>
      <label>*La creación de tablas puede tardar unos segundos</label>
      <ol><a href="p1/createt.php"><button class="w3-button w3-grey">Crear tablas</button></a></ol>
      <li>Verificar tablas en el servidor</li>

      <?php 
      $sql=mysqli_query($conexion,"SELECT id FROM bimestre");
      $sqq =mysqli_fetch_array($sql);
      if (isset($sqq[0])) {
      	$adv ="<p style='color:green'>Creación de base correcta</p>";
      }else{
        $adv ="<p style='color:red'>Creación de base no encontrada</p>";
      }
       ?>
       <ol><strong><?php echo $adv ?></strong></ol>

  </ol>
    </div>

    <footer class="w3-container w3-orange">
      <h5>Técnico</h5>
    </footer>

  </div>

</div>



<div class="w3-half w3-padding">

  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>Paso 2</h1>
    </header>

    <div class="w3-container">
    	<h4><ul><li>Actualización de maestros</li></ul></h4>
    	<ol>
      <li>Seleccionar los maestros que continuarán el siguiente año escolar  &nbsp  <a href="p2/cambiar.php"><button class="w3-button w3-grey">Seleccionar</button></a></li>
      <li>Ingresar nuevos maestros manualmente</li> 
      <li>Verificar &nbsp  <a href="p2/mostrar.php"><button class="w3-button w3-grey">Maestros</button></a></li>
      
     <br><br><br>
   <br><br>
  </ol>
    </div>

    <footer class="w3-container w3-blue">
      <h5>Administración</h5>
    </footer>

  </div>

</div>	


</div>


<div class="w3-row">
	
<div class="w3-half w3-padding">

  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>Paso 3</h1>
    </header>

    <div class="w3-container">
    	<h4><ul><li>Seleccionar los alumnos que continuarán</li></ul></h4>
    	<ol>
      <li>Seleccionar los alumnos por grado que continuarán el siguiente año escolar  &nbsp  <a href="p3/grados.php"><button class="w3-button w3-grey">Seleccionar</button></a></li>
      <li>Ingresar nuevos alumnos manualmente</li> 
      <li>Verificar &nbsp  <a href="p3/mostrar.php"><button class="w3-button w3-grey">Alumnos</button></a></li>

  </ol>
    </div>

    <footer class="w3-container w3-blue">
      <h5>Técnico</h5>
    </footer>

  </div>

</div>



<div class="w3-half w3-padding">

  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>Paso 4</h1>
    </header>

    <div class="w3-container">
 
<h4><ul><li>Actualización de materias</li></ul></h4>
    	<ol>
    	<ol>
      <li>Seleccionar los grados y materias que continuarán  <a href="p4/grados.php"><button class="w3-button w3-grey">Seleccionar por grados</button></a></li>
      <li>Seleccionar los maestros encargados de las materias</a></li> 
      <li>Verificar</li>
     
  </ol>
    </div>

    <footer class="w3-container w3-blue">
      <h5>Administración</h5>
    </footer>

  </div>

</div>	

</div>


<div class="w3-row">
	<div class="w3-half w3-padding">
		 <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-orange">
      <h1>Paso 5</h1>
    </header>

    <div class="w3-container">
<h4><ul><li>Actualización de conexión</li></ul></h4>
    	<ol>
      <li>Abrir el archivo de la raíz llamado <strong>"conexion.php"</strong></li>
      <li>Cambiar el nombre de la base de datos a la creada recientemente</a></li> 
      <li>Verificar</li>
      <li>Abrir el archivo en la ruta: <strong>../sign/login.php</strong></li>
      <li>Cambiar el nombre de la base de datos a la creada recientemente en la variable  <strong>"$database"</strong></a></li> 
      <li>Verificar</li>

    	
     
  </ol>
    </div>

    <footer class="w3-container w3-orange">
      <h5>Ténico</h5>
    </footer>

  </div>
	</div>

	<div class="w3-half w3-padding">
	</div>
</div>

</div>


