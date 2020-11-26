<?php
    require_once('../../Util/conexion.php');
	require_once('../crud/Reserva_crud.php');
	
    $obj= new Reserva_crud();

    echo $obj->devolverDocumento($_POST['cod_booking'],$_POST['cod_doc']);    
?>