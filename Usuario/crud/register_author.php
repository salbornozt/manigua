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

$auth_name = $_POST["auth_name"];
$auth_mail = $_POST["auth_mail"];
$auth_phone = $_POST["auth_phone"];
$auth_address = $_POST["auth_address"];
$auth_id = $_POST["auth_id"];
/*

*/


$sql0 = "select * from author where author_id = '".$auth_id."'";
$r=pg_query($conexion,$sql0);
$rows = pg_num_rows($r);
if($rows == 0){
               
    $sql2 = "insert into author values ('".$auth_id."', '".$auth_name."', '".$auth_mail."', '".$auth_phone."', '".$auth_address."');";
    pg_query($conexion,$sql2);
    alert("El registro fue exitoso");
        

}else{
    alert("ya existe un autor con esa identificación");

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