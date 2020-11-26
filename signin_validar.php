<?php
session_start();

require_once('Util/conexion.php');

$correo=$_POST["correo"];
$clave=$_POST["pass"];

$password=md5($clave);

$con= new Conexion();
$conexion= $con->conectarBD();

$sql = "SELECT * FROM customer;";
$result = pg_query($conexion, $sql);

while ($row = pg_fetch_row($result))
{
  if ($correo == $row[4])
  {
    if ($row[6] == 1 && $row[7] == 'A') 
    {
      if($password==$row[5])
      {
        $_SESSION['codeU'] = $row[0];
        $_SESSION['nameU'] = $row[1];
        $_SESSION['addrU'] = $row[2];
        $_SESSION['celuU'] = $row[3];
        $_SESSION['mailU'] = $row[4];
        header('Location: Usuario/index.php');
      }
      else
      {
        echo '<script language="javascript">alert("Contraseña Incorrecta - Usuario");window.location.href="Index/index.php#section-4"     </script>';
      }
    }

    else if ($row[6] == 2 && $row[7] == 'A') 
    {
      if($password==$row[5])
      {
        $_SESSION['codeR'] = $row[0];
        $_SESSION['nameR'] = $row[1];
        $_SESSION['addrR'] = $row[2];
        $_SESSION['celuR'] = $row[3];
        $_SESSION['mailR'] = $row[4];
        header('Location: Revisor/index.php');
      }
      else
      {
         echo '<script language="javascript">alert("Contraseña Incorrecta - Revisor");window.location.href="Index/index.php#section-4"     </script>';
      }
    }

    else if ($row[6] == 3 && $row[7] == 'A') 
    {
      if($password==$row[5])
      {
        $_SESSION['codeA'] = $row[0];
        $_SESSION['nameA'] = $row[1];
        $_SESSION['addrA'] = $row[2];
        $_SESSION['celuA'] = $row[3];
        $_SESSION['mailA'] = $row[4];
        header('Location: Administrador/index.php');
      }
      else
      {
        echo '<script language="javascript">alert("Contraseña Incorrecta - Administrador");window.location.href="Index/index.php#section-4"     </script>';
      }
    }
  }
  else
  {
    echo '<script language="javascript">alert("El usuario no existe");window.location.href="Index/index.php#section-4"    </script>';
  }
}
pg_close($conexion);
?>