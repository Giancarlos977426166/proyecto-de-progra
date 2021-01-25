<?php
session_start();
//error_reporting(0);
if(isset( $_SESSION['correo'])){
    $nombre=$_SESSION['correo'];
    $rol=$_SESSION['rol'];
    $a =  "Alumno";
}else{
echo 'usted no tiene autorizacion';
die();}
require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);

    if($conexion->connect_error) die("Error fatal");
    
$query = "SELECT * FROM estudiante where correo='$nombre'";
$result = $conexion->query($query);
if (!$result) die ("Falló el acceso a la base de datos");
$rows = $result->num_rows;
$row = $result->fetch_array(MYSQLI_NUM);

$idestu = htmlspecialchars($row[0]);
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
    $query2 = "SELECT * FROM asignatura";
    $result = $conexion->query($query2);
    if (!$result) die ("Falló el acceso a la base de datos");
    $rows = $result->num_rows;
    for ($j = 0; $j < $rows; $j++)
    {
    $row = $result->fetch_array(MYSQLI_NUM);
    $cod = htmlspecialchars($row[0]);
    $nom = htmlspecialchars($row[1]);
    $sem = htmlspecialchars($row[2]);
    echo "$cod";
    echo "$nom";
    //echo "
    echo <<<_END
    <br>
    <form name="asis" action="matricular.php" method="POST">
    <input type='hidden' name='codigocurso' value='$cod'>
    <input type='hidden' name='semestre' value='$sem'>
    <input type='hidden' name='codigoestudiante' value='$idestu'>
    <input class="buttons" type="submit" name="" value="matricularse" >
    </form>
    <br>
    _END;
    //";
    }
    
    ?>
    </section>
    
  </body>
</html>