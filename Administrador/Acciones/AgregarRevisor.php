<?php
    require_once ('../../Util/conexion.php');
    require_once ('../Crud/A_crud.php');
    $obj= new A_crud();

    $datos=array(
        
        $_POST['nom'],
        $_POST['doc'],
        $_POST['cel'],
        $_POST['dir'],
        $_POST['correo']

    );

    echo $obj->agregarRevisor($datos);

?>