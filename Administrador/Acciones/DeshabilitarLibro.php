<?php
    require_once('../../Util/conexion.php');
	require_once('../Crud/A_crud.php');
	
    $obj= new A_crud();

    echo $obj->deshabilitarLibro( $_POST['cod_libro']);
    
?>