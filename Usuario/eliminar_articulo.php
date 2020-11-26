<?php

session_start();


if($_SESSION['nameU']==null)
{
    header("Location: ../Util/logout.php");
}
$codU = $_SESSION['codeU'];
$cod_doc = $_GET['cod_doc'];

$src = $_GET['src'];

require_once '../Util/conexion.php';

$obj=new Conexion();
$conexion=$obj->conectarBD();
$fecha = new DateTime("now", new DateTimeZone('America/Bogota'));
            $fecha->setTimezone(new DateTimeZone('America/Bogota'));
            $fechaF = $fecha->format('Y-m-d H:i:s');


$sqlveri="select user_code from audit_doc where cod_doc='".$cod_doc."'";
$result = pg_query($conexion, $sqlveri);

while ($row = pg_fetch_row($result))
{
    if($row[0]==$codU){
        $sql = "delete from article where cod_doc='".$cod_doc."'";
        $result = pg_query($conexion, $sql);
        $sql1 = "delete from document_author where cod_doc='".$cod_doc."'";
        $result = pg_query($conexion, $sql1);
        $sql2 = "delete from documents where cod_doc='".$cod_doc."'";
        $result = pg_query($conexion, $sql2);  
        $sql4 = "insert into audit_doc (audit_doc_code, cod_doc, user_code, actions, audit_date) VALUES (DEFAULT, '".$cod_doc."', '".$codU."', 'D', '".$fechaF."');"; 
        pg_query($conexion,$sql4); 
        if($src == 'u'){
            echo "<script language='javascript'>alert('articulo Eliminado');window.location.href='articulos_usuario.php'     </script>";

        }else{
            echo "<script language='javascript'>alert('articulo Eliminado');window.location.href='articulos.php'     </script>";

        }           
    }
}
if($src == 'u'){
    echo "<script language='javascript'>alert(''Para eliminar un libro debe ser el quien lo creo');window.location.href='articulos_usuario.php'     </script>";

}else{
    echo "<script language='javascript'>alert(''Para eliminar un libro debe ser el quien lo creo');window.location.href='articulos.php'     </script>";

}






//echo '<script language="javascript">alert("Datos Guardados");window.location.href="perfil_usuario.php"     </script>';


?>




