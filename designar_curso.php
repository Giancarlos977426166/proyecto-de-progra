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
        <h5>Designar Docente</h5>
        </br>
        <?php
        require_once 'login.php';
        $conexion = new mysqli($hn, $un, $pw, $db, $port);
    
        if($conexion->connect_error) die("Error fatal");
    
        if(isset($_POST['codigoasignatura']) && isset($_POST['codigodocente'] && isset($_POST['semestre']))
        {
            $codigoasignatura = mysql_entities_fix_string($conexion, $_POST['codigoasignatura']);
            $codigodocente = mysql_entities_fix_string($conexion, $_POST['codigodocente']);
            $semestre = mysql_entities_fix_string($conexion, $_POST['semestre']);
            
    
            $query = "INSERT INTO docente_asignatura VALUES('$codigoasignatura', '$codigodocente', '$semestre')";       
            $result = $conexion->query($query);
            if (!$result) die ("Falló el acceso a la base de datos");
            
        }
    
        function mysql_entities_fix_string($conexion, $string)
        {
            return htmlentities(mysql_fix_string($conexion, $string));
          }
        function mysql_fix_string($conexion, $string)
        {
            if (get_magic_quotes_gpc()) $string = stripslashes($string);
            return $conexion->real_escape_string($string);
          } 
        ?>
        <form name="sigup" action="docente_asignatura.php" method="POST">
        <center><input class="Rbuttons" type="submit" name="" value="Designar curso" ></center>
        </form>
    
    </section>
    
  </body>
</html>