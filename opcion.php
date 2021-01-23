<?php
session_start();
//error_reporting(0);
if(isset( $_SESSION['nombre'])){
    $nombre=$_SESSION['nombre'];
    $rol=$_SESSION['rol'];
}else{
echo 'usted no tiene autorizacion';
die();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registro de usuario</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <section class="form-login">
        <form name="asistencia" action="lista.php" method="POST">
        <input class="controls" type="hidden" name="user" value="$nombre">
        <input class="buttons" type="submit" value="Asistencia">
        </form>
        <form name="Matricula" action="lista.php" method="POST">
        <input class="controls" type="hidden" name="user" value="$nombre">
        <input class="buttons" type="submit" value="Matricularse">
        </form>
      <br>
    </section>
  </body>
</html>