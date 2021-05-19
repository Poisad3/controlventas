<?php
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $direccion = $_GET['direccion'];
    $telefono = $_GET['telefono'];
    
    include_once '../conexion.php';

    $sql_editar = 'UPDATE proveedor SET nombre_proveedor=?, direccion_proveedor=?, telefono_proveedor=? WHERE id_proveedor=?';
    $seditar = $con->prepare($sql_editar);
    $seditar->execute(array($nombre,$direccion,$telefono,$id));
    header('location:proveedores.php');

?>