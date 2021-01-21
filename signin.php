<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);

    if($conexion->connect_error) die("Error fatal");

    if (isset($_POST['user'])&&
        isset($_POST['contra']))
    {
        $un_temp = mysql_entities_fix_string($conexion, $_POST['user']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['contra']);
        $query   = "SELECT * FROM usuario WHERE idusuario='$un_temp'";
        $result  = $conexion->query($query);
        
        if (!$result) die ("Usuario no encontrado");
        elseif ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();

            if (password_verify($pw_temp, $row[1])) 
            {
                session_start();
                $_SESSION['nombre']=$row[0];
                echo htmlspecialchars("Bienvenido '$row[0]' tu rol es '$row[2]'" );
              
              echo <<<_END
              <pre>
              <form action='ndiario.php' method='post'>
              <input type='hidden' name='user' value='$un_temp'>
              <input type='submit' value='Asistencia'>
              </form>
              _END;

               echo <<<_END
              <pre>
              <form action='vdiario.php' method='post'>
              <input type='hidden' name='user' value='$un_temp'>
              <input type='submit' value='Matricularse'>
              </form>
              _END;
              
    
                die ("<p><a href='logout.php'>
              Click para salir</a></p>");
            }
            else {
                echo "Usuario/password incorrecto <p><a href='registrarse.html'>
            Registrarse</a></p>";
            }
        }
        else {
          echo "Usuario/password incorrecto <p><a href='registrarse.html'>
      Registrarse</a></p>";
      }

    }

    $conexion->close();

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
