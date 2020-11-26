<?php
    require_once('../../Util/conexion.php');
	require_once('../Crud/R_crud.php');
	
    $obj= new R_crud();

    echo $obj->habilitar( $_POST['cod']);
    
?>