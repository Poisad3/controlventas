<?php
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $nit = $_GET['nit'];
    
    include_once '../conexion.php';

    $sql_editar = 'UPDATE cliente SET nombre_cliente=?, nit_cliente=? WHERE id_clientes=?';
    $seditar = $con->prepare($sql_editar);
    $seditar->execute(array($nombre,$nit,$id));
    header('location:clientes.php');

?>