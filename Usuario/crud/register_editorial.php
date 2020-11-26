<?php 
session_start();


if($_SESSION['nameU']==null)
{
    header("Location: ../Util/logout.php");
}

$codU = $_SESSION['codeU'];


require_once '../../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();

$edit_name = $_POST["edit_name"];
$edit_mail = $_POST["edit_mail"];
$edit_phone = $_POST["edit_phone"];
$edit_address = $_POST["edit_address"];


/*

*/



               
$sql2 = "INSERT into editorial (editorial_code, editorial_name, email, phone, address) values (DEFAULT, '".$edit_name."', '".$edit_mail."', '".$edit_phone."', '".$edit_address."');";
$r1=pg_query($conexion,$sql2);
if ($r1 != false ){
    alert("El registro fue exitoso");
}else{
    alert("Ocurrio un Error");
}
        





function arrayContainsDuplicate($array)  
{  
      return count($array) != count(array_unique($array));    
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');
    history.go(-1);
    </script>";
}



    




    


?>