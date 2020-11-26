<?php
    require_once('../../Util/conexion.php');
	require_once('../crud/Reserva_crud.php');
	
    $obj= new Reserva_crud();

    echo $obj->reservarDocumento( $_POST['cod_doc']);
    
?>