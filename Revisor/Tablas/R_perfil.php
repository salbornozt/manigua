<?php
session_start();
if($_SESSION['nameR']==null)
{
    header("Location: ../Util/logout.php");
}

$cod = $_SESSION['codeR'] ;
$name= $_SESSION['nameR'] ;
$add= $_SESSION['addrR'] ;
$celu = $_SESSION['celuR'] ;
$mail=  $_SESSION['mailR'] ;

$booksReviewed = 0;
$presentationReviewed = 0;
$articleReviewed = 0;

require_once '../../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$sql="SELECT user_name, user_code, phone, address, email FROM customer WHERE user_code ='".$cod."';";
$result=pg_query($conexion,$sql);

while ($mostrar=pg_fetch_row($result))
{
?>

<html class="no-js" lang="">
<body>
<div>
  <br>
  <br>
	 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data" method="post" class="form-horizontal">

      <div class="row form-group">
        <div class="col col-md-4" align="right"><label for="text-input" class=" form-control-label">Nombre</label></div>
        <div class="col-12 col-md-6" align="center"><input type="text" id="nombre" name="nombre"  placeholder="NOMBRE" required="true" value="<?php echo $mostrar[0] ?>" class="form-control"></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-4" align="right"><label for="text-input" class=" form-control-label">Documento</label></div>
        <div class="col-12 col-md-6" align="center"><input type="text" id="documento" name="documento" placeholder="DOCUMENTO" required="true" value="<?php echo $mostrar[1] ?> " class="form-control" disabled></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-4" align="right"><label for="text-input" class=" form-control-label">Celular</label></div>
        <div class="col-12 col-md-6" align="center"><input type="text" id="celular" name="celular" placeholder="CELULAR" required="true" value="<?php echo $mostrar[2] ?> " class="form-control"></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-4" align="right"><label for="text-input" class=" form-control-label">Dirección</label></div>
        <div class="col-12 col-md-6" align="center"><input type="text" id="direccion" name="direccion"  placeholder="DIRECCIÓN" required="true"  value="<?php echo $mostrar[3] ?> " class="form-control"></div>
      </div>

      <div class="row form-group">
        <div class="col col-md-4" align="right"><label for="text-input" class=" form-control-label">Correo electrónico</label></div>
        <div class="col-12 col-md-6" align="center"><input type="text" id="email" name="email"  placeholder="CORREO" required="true" value="<?php echo $mostrar[4] ?> " class="form-control" disabled></div>
      </div>
        <br>                        
       <div class="form-actions form-group">
        <center>
          <button type="submit" class="btn btn-success" name="submit">
          <i class="fa fa-floppy-o"></i> Guardar cambios
          </button>
          <button type="submit" class="btn btn-warning" name="submit1">
          <i class="fa fa-floppy-o"></i> Cambiar clave
          </button>
      </center>
      </div>
        <br>
        <br>
      <?php 
      }
      ?>
  </form>                                      
</div>

<?php

if (isset($_POST['submit'])) 
{
  $obj1=new Conexion();
  $conexion1=$obj1->conectarBD();


  $nom= $_POST['nombre'];
  $cel= $_POST['celular'];
  $dir= $_POST['direccion'];
  
  $patronC= "([0-9]{10})";

  if (preg_match($patronC, $cel)) 
  {
    $sql3="UPDATE customer SET user_name='$nom', phone='$cel', address='$dir' WHERE user_code='".$cod."';";
    pg_query($conexion1,$sql3);
            
    header("Location: ../index.php");
  }
    else
  {
      header("Location: ../perfil.php");
  }
}


if (isset($_POST['submit1']))
{
  header("Location: ../modificar.php");
}
?>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function() 
  {
		$('#iddatatable').DataTable();
	} );

</script>