<?php
session_start();
//error_reporting(0);
if(isset( $_SESSION['correo'])){
    $nombre=$_SESSION['correo'];
    $rol=$_SESSION['rol'];
}else{
echo 'usted no tiene autorizacion';
die();
}
require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);

    if($conexion->connect_error) die("Error fatal");
$codCurso = $_POST['codigocurso'];
$nomCurso = $_POST['nombrecurso'];
$codEstudiante = $_POST['codigoestudiante'];
$nomEstudiante = $_POST['nombreestudiante'];


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registro de asistencia</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <section class="form-registro">
    
    <?php
  $query = "SELECT fecha,estado,observaciones FROM asistencia where codigo_estudiante='$codEstudiante' AND codigo_asignatura='$codCurso'";
  $result = $conexion->query($query);
  if (!$result) die ("Falló el acceso a la base de datos");
  $rows = $result->num_rows;
  echo "$nomCurso"." ";
  echo "$nomEstudiante"."<br />";
  ?>
  
      <table><tr>

        <td width="100">Estado</td>
        <td width="150">Fecha</td>

        <td>Observaciones</td>
      </tr>

      <br>  
      
      <?php
      for ($j = 0; $j < $rows; $j++)
      {
      $row = $result->fetch_array(MYSQLI_NUM);
      $fecha = htmlspecialchars($row[0]);
      $estado = htmlspecialchars($row[1]);
      $observaciones = htmlspecialchars($row[2]);
      echo <<<_END
        <table>
          <tr>
            <td width="100">$estado</td>
            <td width="150">$fecha</td>
            <td>$observaciones</td>
          </tr>  
      _END;
      
      }
    
    ?>
    </section>
        
  </body>
</html>