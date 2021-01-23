<?php
session_start();
//error_reporting(0);
if(isset( $_SESSION['nombre'])){
    $nombre=$_SESSION['nombre'];
    $rol=$_SESSION['rol'];
}else{
echo 'usted no tiene autorizacion';
die();}
require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);

    if($conexion->connect_error) die("Error fatal");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>vista de cursos</title>
    <link rel="stylesheet" href="stylevista.css">
  </head>
  <body>
    <section class="form-vista">
      <h1>Cursos</h1>
    <?php
    
    
    ?>
    </section>
    
  </body>
</html>