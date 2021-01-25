<?php
session_start();
//error_reporting(0);
if(isset( $_SESSION['nombre'])){
    $nombre=$_SESSION['nombre'];
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
      <form name="sigup" action="signup.php" method="POST">
     ID Curso:<input class="Rcontrols" type="text" name="nombre" value="" placeholder="Cesar..">
     <br>
     Nombre:<input class="Rcontrols" type="text" name="apellido" value="" placeholder="Martel Caldas..">
     <br>
     Rol:
     <select name="rol" id="seleccion" class="Rcontrols">
      <option value="Alumno">Alumno</option>
      <option value="Docente">Docente</option>
  </select>
     <br>     
     Codigo:<input class="Rcontrols" type="text" name="Codigo" value="" placeholder="Codigo Docente/Estudiante">
     <br>
     Usuario : <input class="Rcontrols" type="text" name="user" value="" placeholder="Usuario">
     <br>
     Contrase:<input class="Rcontrols" type="password" name="contra" value="" placeholder="*******">
    <br>
     Correo   :   <input class="Rcontrols" type="text" name="correo" value="" placeholder="Cesar@example.com">
     <br>
      Telefono:<input class="Rcontrols" type="text" name="telefono" value="" placeholder="+51 987654321">
      <br>
      <br>
      <center><input class="Rbuttons" type="submit" name="" value="Crear Cuenta" ></center>
      <br>
      <p></p><a href="index.html">Inicio</a></p>
      </form>
    
    </section>
    
  </body>
</html>