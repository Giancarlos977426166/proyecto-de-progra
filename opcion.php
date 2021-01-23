<?php
session_start();
//error_reporting(0);
if(isset( $_SESSION['nombre'])){
    $nombre=$_SESSION['nombre'];
    $rol=$_SESSION['rol'];
    $a =  "Alumno";
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
    <?php
    if($rol==$a){
      echo <<<_END
      <form name="asistencia" action="vista.php" method="POST">
        <input class="buttons" type="submit" value="Asistencia">
        </form>
        <form name="Matricula" action="lista.php" method="POST">
        <input class="buttons" type="submit" value="Matricularse">
        </form>
        <form name="salir" action="cerrar.php" method="POST">
        <input class="buttons" type="submit" value="salir">
        </form>
      _END;
    }else{
      echo <<<_END
      <form name="asistencia" action="vista.php" method="POST">
        <input class="buttons" type="submit" value="Asistencia">
        </form>
        <form name="salir" action="cerrar.php" method="POST">
        <input class="buttons" type="submit" value="salir">
        </form>
      _END;
    }    
    ?>
    </section>
  </body>
</html>