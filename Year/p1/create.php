<?php
$conexion=mysqli_connect("localhost","root","bermont30"); 
$date =date('y')+1;
$base="dbnicol";
$xd =$base.$date;
mysqli_query($conexion,"CREATE DATABASE $xd ;");
header ("location:../");
 ?>
