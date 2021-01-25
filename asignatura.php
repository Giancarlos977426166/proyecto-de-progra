<?php
session_start();
//error_reporting(0);
if(isset( $_SESSION['correo'])){
    $nombre=$_SESSION['correo'];
    $rol=$_SESSION['rol'];
    $c="Administrador";
}else{
echo 'usted no tiene autorizacion';
die();
}
if ($rol==$c){
    
}else{
    
    function popup($vMsg,$vDestination) {
        echo("<html>\n");
        echo("<head>\n");
        echo("<title>System Message</title>\n");
        echo("<meta http-equiv=\"Content-Type\" content=\"text/html;
        charset=iso-8859-1\">\n");
         
        echo("<script language=\"javascript\" type=\"text/javascript\">\n");
        echo("alert('$vMsg');\n");
        echo("window.location = ('$vDestination');\n");
        echo("</script>\n");
        echo("</head>\n");
        echo("<body>\n");
        echo("</body>\n");
        echo("</html>\n");
        exit;
        }      
    popup('El usuario no tiene permiso para entrar a esta página','opcion.php'.$qr);    
}

require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);

    if($conexion->connect_error) die("Error fatal");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <section class="form-registro">
      <h5>INGENIERIA DE SISTEMAS UNAJMA</h5>
      <form name="Nueva asignatura" action="asignarcurso.php" method="POST">
  </select>
     <br>     
     Codigo_asignatura :<input class="Rcontrols" type="text" name="codigoa" value="" placeholder="IIAC53">
     <br>
     Nombre del curso : <input class="Rcontrols" type="text" name="nombrea" value="" placeholder="Programacion Web">
      <br>
      <br>
      <center><input class="Rbuttons" type="submit" name="" value="Nueva asignatura" ></center>
      <br>
      <a href ="vercursos.php" target="_blank">Ver cursos</a><br><br>
      </form>

      <form action=""></form>


    </section>
    
  </body>
</html>