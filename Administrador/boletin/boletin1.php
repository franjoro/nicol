<?php 
session_start();
require '../../conexion.php';

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Boletin de Estudiantes</title>

    <link href="../../Maestro/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../Maestro/css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
      .pip{
        padding: 1px;
        border: 3px solid black;
      }
      span{
      	font-size: 12px;
      	font-family: Arial;
        
      }
      .up{
      	font-size: 14px;
      }


}




    </style>
 </head>
 <body>

  <?php 
  $ani = date('Y');
  $id = $_GET['id'];
    $query87 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$id' ORDER BY Apellido");
  while ($rowoo = mysqli_fetch_array($query87)){
    // $a=mysqli_num_rows($query87);
    // echo $a;
    $lala = $rowoo['IdEs'];
    $lele = $rowoo['Nombre'];
    $lili = $rowoo['Apellido'];
    $lolo = $rowoo['IdG'];
    $nana = $rowoo['conducta1'];
    $nene = $rowoo['conducta2'];
    $nini = $rowoo['conducta3'];
    $nono = $rowoo['conducta4'];
    
    
    $query2 = mysqli_query($conexion, "SELECT Nombre, Seccion,idG FROM grados WHERE idG = '$lolo' ");

    $rowi = mysqli_fetch_array($query2);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];
    $ji = $rowi['idG'];
    
   ?>

   <?php 
//           if (isset($_GET['idb'])) {
//             $bimestre = $_GET['idb'];
//           }else{
           $sqlbi = mysqli_query($conexion,"SELECT * FROM bimestre");
           $rowb = mysqli_fetch_array($sqlbi);
           $bimestre = $rowb[0];
//           }

   if ($bimestre=='1') {
   $nunu = $nana;
 }elseif ($bimestre=='2') {
   $nunu = $nene;
 }elseif ($bimestre=='3') {
   $nunu = $nini;
 }elseif ($bimestre=='4') {
   $nunu = $nono;
 }

         ?>


  <div class="container">

<div class="w3-row" >
  <div class="w3-col s2"> 
    <img style="margin-left: 10px; height: 75px;" src="img/logoo.png">
  </div>


  <div class="w3-col s10">
  	 <strong> <h2>Colegio Salesiano San Juan Bosco</h2> </strong>
	
 <table >

    <tr style='height:75px;'>
      <td style="width:250px;"><span class="up">Carné: <b><?php echo $lala ?></b></span></td>
      <td><span class="up">Alumno: <b><?php echo utf8_encode($lili).", ".utf8_encode($lele) ?></b></span></td>
    </tr>
    <tr >
      <td style="width:250px;"><span class="up">Grado: <b><?php echo $ja ."-". $je; ?></b></span></td>
  <td><span class="up">Año Lectivo: <b><?php echo $ani;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($bimestre!=4){ echo "Bimestre: ".$bimestre;}?></span></td>
      
    </tr>
    
  </table>
  </div>
</div><br><br>	<br>
  <!-- NUEVA TABLITAA================================== -->
  <table  class="w3-table w3-bordered" style="margin-top: -100px">
   <thead style="background-color: #D8D7D7;" > 
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col"><b><span >Materia</span></b></th>
      <th scope="col"><b><span >I</span></b></th>
      <th scope="col"><b><span >20%</span></b></th>
      <th scope="col"><b><span >II</span></b></th>
      <th scope="col"><b><span >30%</span></b></th>
      <th scope="col"><b><span >III</span></b></th>
      <th scope="col"><b><span >20%</span></b></th>
      <th scope="col"><b><span >IV</span></b></th>
      <th scope="col"><b><span >30%</span></b></th>
      <th ><b><span>Nota Final</span></b></th>
    

    </tr>
  </thead>
  <tbody>
  <?php 

    $query = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id' AND Role='0' ");
    while($row = mysqli_fetch_array($query)){
  
    $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = '1' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = '1' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = '1' ");

    $rowi2 = mysqli_fetch_array($query3);
    $rowi5 = mysqli_fetch_array($query5);
    $rowi7 = mysqli_fetch_array($query7);
    $query4 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi2[0]' AND IdEs='$lala' ");
    $query6 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi5[0]' AND IdEs='$lala' ");
    $query8 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi7[0]' AND IdEs='$lala'");


    $rowi3 = mysqli_fetch_array($query4);
    $rowi6 = mysqli_fetch_array($query6);
    $rowi8 = mysqli_fetch_array($query8);

    $haha = $rowi3[0];
    $hehe = $rowi6[0];
    $hihi = $rowi8[0];
    $rowi9 =($haha + $hehe + $hihi);
    $porce1 = $rowi9 * 0.2;


   // Bimestre 2

    $query21 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = 2");
    $query22 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = 2 ");
    $query23 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = 2 ");

    $rowi21 = mysqli_fetch_array($query21);
    $rowi22 = mysqli_fetch_array($query22);
    $rowi23 = mysqli_fetch_array($query23);
    $query24 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi21[0]' AND IdEs='$lala' ");
    $query25 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi22[0]' AND IdEs='$lala' ");
    $query26 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi23[0]' AND IdEs='$lala' ");


    $rowi27 = mysqli_fetch_array($query24);
    $rowi28 = mysqli_fetch_array($query25);
    $rowi29 = mysqli_fetch_array($query26);

    $zaza = $rowi27[0];
    $zeze = $rowi28[0];
    $zizi = $rowi29[0];
    $zozo = $zaza + $zeze + $zizi;


    $porce2 = $zozo * 0.3;

    // Bimestre 3

    $query31 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = 3 ");
    $query32 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = 3 ");
    $query33 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = 3 ");

    $rowi31 = mysqli_fetch_array($query31);
    $rowi32 = mysqli_fetch_array($query32);
    $rowi33 = mysqli_fetch_array($query33);
    $query34 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi31[0]' AND IdEs='$lala' ");
    $query35 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi32[0]' AND IdEs='$lala' ");
    $query36 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi33[0]' AND IdEs='$lala' ");


    $rowi37 = mysqli_fetch_array($query34);
    $rowi38 = mysqli_fetch_array($query35);
    $rowi39 = mysqli_fetch_array($query36);

    $qaqa = $rowi37[0];
    $qeqe = $rowi38[0];
    $qiqi = $rowi39[0];
    $qoqo = $qaqa + $qeqe + $qiqi;
    $porce3 = $qoqo * 0.2;


    // bimestre 4

    $query41 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = 4 ");
    $query42 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = 4 ");
    $query43 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = 4 ");

    $rowi41 = mysqli_fetch_array($query41);
    $rowi42 = mysqli_fetch_array($query42);
    $rowi43 = mysqli_fetch_array($query43);
    $query44 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi41[0]' AND IdEs='$lala' ");
    $query45 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi42[0]' AND IdEs='$lala' ");
    $query46 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi43[0]' AND IdEs='$lala' ");


    $rowi47 = mysqli_fetch_array($query44);
    $rowi48 = mysqli_fetch_array($query45);
    $rowi49 = mysqli_fetch_array($query46);

    $wawa = $rowi47[0];
    $wewe = $rowi48[0];
    $wiwi = $rowi49[0];
    $wowo = $wawa + $wewe + $wiwi;
    $porce4 = $wowo * 0.3;

    // $promf = ($rowi9 + $zozo + $qoqo + $wowo)/4;
    $promf = $porce1 + $porce2 + $porce3 + $porce4;


   ?>
    
    <tr>
      <td><b><span ><?php echo utf8_encode($row['1']) ?></span></b></td>      <!-- Materia -->     

<?php 
  if ($bimestre=='1') {
  ?>
      <td><span ><?php echo $rowi9?></span></td> <!-- prom 1 -->
      <td><b><span ><?php echo money_format("%i",$porce1)?></span></b></td> <!-- Porce 20% -->
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    <?php 

  }
 
  if ($bimestre=='2') {
  ?>
      <td><span ><?php echo $rowi9?></span></td> <!-- prom 1 -->
      <td><b><span ><?php echo money_format("%i",$porce1)?></span></b></td> <!-- Porce 20% -->
      <td><span ><?php echo $zozo ?></span></td> <!-- prom 2 -->
      <td><b><span ><?php echo money_format("%i",$porce2) ?></span></b></td> <!-- Porce 30% -->
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    <?php 

  }
    if ($bimestre=='3') {
  ?>
      <td><span ><?php echo $rowi9 ?></span></td> <!-- prom 1 -->
      <td><b><span ><?php echo money_format("%i",$porce1) ?></span></b></td> <!-- Porce 20% -->
      <td><span ><?php echo $zozo ?></span></td> <!-- prom 2 -->
      <td><b><span ><?php echo money_format("%i",$porce2) ?></span></b></td> <!-- Porce 30% -->
      <td><span ><?php echo $qoqo ?></span></td> <!-- prom 2 -->
      <td><b><span ><?php echo money_format("%i",$porce3) ?></span></b></td> <!-- Porce 30% -->
      <td></td>
      <td></td>
      <td></td>
      <td></td>

    <?php 

  }
      if ($bimestre=='4') {
  ?>
      <td><span ><?php echo $rowi9?></span></td> <!-- prom 1 -->
      <td><b><span ><?php echo money_format("%i",$porce1)?></span></b></td> <!-- Porce 20% -->
      <td><span ><?php echo $zozo ?></span></td> <!-- prom 2 -->
      <td><b><span ><?php echo money_format("%i",$porce2) ?></span></b></td> <!-- Porce 30% -->
      <td><span ><?php echo $qoqo ?></span></td> <!-- prom 2 -->
      <td><b><span ><?php echo money_format("%i",$porce3) ?></span></b></td> <!-- Porce 30% -->
      <td><span ><?php echo $wowo ?></span></td> <!-- prom 4 -->
      <td><b><span ><?php echo money_format("%i",$porce4) ?></span></b></td> <!-- Porce 30% -->
      <td style="text-align: center;width: 95px;"><span ><?php echo round($promf) ?></span></td> <!-- Prom final -->

    <?php 

  }
  
 ?>


    </tr> 
   

    <?php } ?>
<tr>
  <?php 
  if ($bimestre=='1') {
   ?>
 <td><b><span >Conducta</span></b></td> <!-- Conducta -->
    <td><span ><?php echo $nana?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nana*0.20) ?></b></span></td> 

   <?php 
  }
  if ($bimestre=='2') {
   ?>
   <td><b><span >Conducta</span></b></td> <!-- Conducta -->
    <td><span ><?php echo $nana?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nana*0.20) ?></b></span></td> 
    <td><span ><?php echo $nene?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nene*0.30) ?></b></span></td> 

   <?php 
  }
  if ($bimestre=='3') {  
   ?>
  <td><b><span >Conducta</span></b></td> <!-- Conducta -->
    <td><span ><?php echo $nana?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nana*0.20) ?></b></span></td> 
    <td><span ><?php echo $nene?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nene*0.30) ?></b></span></td> 
    <td><span ><?php echo $nini?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nini*0.20) ?></b></td> 

   <?php 
  }
  if ($bimestre=='4') {   
   ?>
 <td><b><span >Conducta</span></b></td> <!-- Conducta -->
    <td><span ><?php echo $nana?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nana*0.20) ?></b></span></td> 
    <td><span ><?php echo $nene?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nene*0.30) ?></b></span></td> 
    <td><span ><?php echo $nini?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nini*0.20) ?></b></td> 
    <td><span ><?php echo $nono?></span></td> 
    <td><b><span ><?php echo money_format("%i",$nono*0.30) ?></b></span></td> 
    <td style="text-align: center;"><span ><?php echo round(($nana*0.20)+($nene*0.30)+($nini*0.20)+($nono*0.30)) ?></span></td> 

   <?php 
  }



   ?>
   

</tr>



<?php 
$se1=mysqli_query($conexion,"SELECT * FROM materias WHERE Role='1' AND idG='$ji' ");
$se2=mysqli_query($conexion,"SELECT * FROM materias WHERE Role='2' AND idG='$ji' ");
$nume=mysqli_num_rows($se1);
$nume2=mysqli_num_rows($se2);

if ($nume != '0' AND $nume2 != '0' ) {

 ?>

<tr style="background-color: #D8D7D7"><br><br>
	  <th scope="col"><b><span >Materias Semestrales</span></b></th>
      <th scope="col"><b><span >I</span></b></th>
      <th scope="col"><b><span >50%</span></b></th>
      <th scope="col"><b><span >II</span></b></th>
      <th scope="col"><b><span >50%</span></b></th>
      <th scope="col"><b><span >III</span></b></th>
      <th scope="col"><b><span >50%</span></b></th>
      <th scope="col"><b><span >IV</span></b></th>
      <th scope="col"><b><span >50%</span></b></th>
      <th ><b></b></th>
</tr>

	<tr>
		<?php 
			while ($row=mysqli_fetch_array($se1)){
		 ?>
		 <td><strong><span><?php echo $row[1] ?></span></strong></td>
		 <?php
		       
    $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = '1' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = '1' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = '1' ");

    $rowi2 = mysqli_fetch_array($query3);
    $rowi5 = mysqli_fetch_array($query5);
    $rowi7 = mysqli_fetch_array($query7);
    $query4 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi2[0]' AND IdEs='$lala' ");
    $query6 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi5[0]' AND IdEs='$lala' ");
    $query8 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi7[0]' AND IdEs='$lala'");


    $rowi3 = mysqli_fetch_array($query4);
    $rowi6 = mysqli_fetch_array($query6);
    $rowi8 = mysqli_fetch_array($query8);

    $haha = $rowi3[0];
    $hehe = $rowi6[0];
    $hihi = $rowi8[0];
    $rowi9 =($haha + $hehe + $hihi);
    $porce1 = $rowi9 * 0.5;


    // BIMESTRE 2 SEMESTRALES 

        $query21 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = 2");
    $query22 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = 2 ");
    $query23 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = 2 ");

    $rowi21 = mysqli_fetch_array($query21);
    $rowi22 = mysqli_fetch_array($query22);
    $rowi23 = mysqli_fetch_array($query23);
    $query24 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi21[0]' AND IdEs='$lala' ");
    $query25 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi22[0]' AND IdEs='$lala' ");
    $query26 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi23[0]' AND IdEs='$lala' ");


    $rowi27 = mysqli_fetch_array($query24);
    $rowi28 = mysqli_fetch_array($query25);
    $rowi29 = mysqli_fetch_array($query26);

    $zaza = $rowi27[0];
    $zeze = $rowi28[0];
    $zizi = $rowi29[0];
    $zozo = $zaza + $zeze + $zizi;


    $porce2 = $zozo * 0.5;

}
		
if ($bimestre=='1') {
		 ?>
		 <td><span><?php echo $rowi9 ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce1) ?></b></span></td>
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>	
		 <td></td>
		 <td></td>	
		 <td></td>
<?php 
}


 if ($bimestre=='2') {
		 ?>
		 <td><span><?php echo $rowi9 ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce1) ?></b></span></td>
		 <td><span><?php echo $zozo ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce2) ?></b></span></td>
		 <td></td>
		 <td></td>	
		 <td></td>
		 <td></td>
		 <td></td>
<?php 
} if ($bimestre=='3') {
		 ?>
		 <td><span><?php echo $rowi9 ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce1) ?></b></span></td>
		 <td><span><?php echo $zozo ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce2) ?></b></span></td>
		 <td></td>
		 <td></td>	
		 <td></td>
		 <td></td>
		 <td></td>
<?php 
} if ($bimestre=='4') {
		 ?>
		 <td><span><?php echo $rowi9 ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce1) ?></b></span></td>
		 <td><span><?php echo $zozo ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce2) ?></b></span></td>
		 <td></td>
		 <td></td>	
		 <td></td>
		 <td></td>
		 <td style="text-align: center;"><span><?php echo round($porce1+$porce2)?></span></td>
<?php 
}
 ?>

	
	</tr>


	<tr>
		 <?php
			while ($row=mysqli_fetch_array($se2)){

  $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = '3' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = '3' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = '3' ");

    $rowi2 = mysqli_fetch_array($query3);
    $rowi5 = mysqli_fetch_array($query5);
    $rowi7 = mysqli_fetch_array($query7);
    $query4 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi2[0]' AND IdEs='$lala' ");
    $query6 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi5[0]' AND IdEs='$lala' ");
    $query8 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi7[0]' AND IdEs='$lala'");


    $rowi3 = mysqli_fetch_array($query4);
    $rowi6 = mysqli_fetch_array($query6);
    $rowi8 = mysqli_fetch_array($query8);

    $haha = $rowi3[0];
    $hehe = $rowi6[0];
    $hihi = $rowi8[0];
    $rowi9 =($haha + $hehe + $hihi);
    $porce1 = $rowi9 * 0.5;


    // BIMESTRE 2 SEMESTRALES 

        $query21 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = '4'");
    $query22 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = '4' ");
    $query23 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = '4' ");

    $rowi21 = mysqli_fetch_array($query21);
    $rowi22 = mysqli_fetch_array($query22);
    $rowi23 = mysqli_fetch_array($query23);
    $query24 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi21[0]' AND IdEs='$lala' ");
    $query25 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi22[0]' AND IdEs='$lala' ");
    $query26 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi23[0]' AND IdEs='$lala' ");


    $rowi27 = mysqli_fetch_array($query24);
    $rowi28 = mysqli_fetch_array($query25);
    $rowi29 = mysqli_fetch_array($query26);

    $zaza = $rowi27[0];
    $zeze = $rowi28[0];
    $zizi = $rowi29[0];
    $zozo = $zaza + $zeze + $zizi;


    $porce2 = $zozo * 0.5;

		
if ($bimestre=='1') {
		 ?>
		 <td><strong><span><?php echo $row[1] ?></span></strong></td>
		 <td></td>
		 <td></td>	
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>	
		 <td></td>
		 <td></td>
		 <td></td>
<?php 
}


 if ($bimestre=='2') {
		 ?>
		 <td><strong><span><?php echo $row[1] ?></span></strong></td>
		 <td></td>	
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>	
		 <td></td>
		 <td></td>
		 <td></td>
<?php 
} if ($bimestre=='3') {
		 ?> <!-- te de notas -->  
		 <td><strong><span><?php echo $row[1] ?></span></strong></td>
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>
		 <td><span><?php echo $rowi9 ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce1) ?></b></span></td>
		 <td></td>
		 <td></td>
		 <td></td>
<?php 
} if ($bimestre=='4') {
		 ?>
		 <td><strong><span><?php echo $row[1] ?></span></strong></td>
		 
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>
		 <td><span><?php echo $rowi9 ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce1) ?></b></span></td>
		 <td><span><?php echo $zozo ?></span></td>
		 <td><b><span><?php echo money_format("%i",$porce2) ?></b></span></td>		 
		 <td style="text-align: center;"><span><?php echo round($porce1+$porce2) ?></span></td>		
<?php 
}
 ?>



	
		 	 
		 <?php
		 }}
		 ?>
	</tr>
<tr>
	<hr>
</tr>

  </tbody>

</table>




<!-- <p style="display: inline; float: right">_____________________________________________________________________________</p> -->
<!--  -->
<tr>
    <td><b><span >Observaciones :</span></b></td><br>
</tr>

<!--<div style="float: right; border: 2px solid #000; padding: 2px; border-radius: 3px;"> 
      <h5>Conducta: <?php 
//echo $nunu ?>
</h5>
 </div>-->
	<br>
  <p style="display: inline;"><b>Profesor Guia&nbsp;</p></b><p style="display: inline;">_________________</p>
  <p style="display: inline; float: right">_________________</p><p style="display: inline; float: right"><b>Director&nbsp;</b></p>
  <div style="page-break-before: always;height:0; line-height:0;">

  </div>
</div>
 <?php } ?>
 </body>
 </html>