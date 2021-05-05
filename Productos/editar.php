<?php
    $id = $_GET['id'];
    $nombre = $_GET['producto'];
    $descripcion = $_GET['detalle_producto'];
    $precio = $_GET['precio'];
    $barras = $_GET['cod_barra_producto'];
    $proveedor =$_GET['proveedor'];

    include_once '../conexion.php';

    $sql_editar = 'UPDATE producto SET nombre_producto=?, detalle_producto=?, precio=?, cod_barra_producto=?, proveedor_id_proveedor=? WHERE id_producto=?';
    $seditar = $con->prepare($sql_editar);
    $seditar->execute(array($nombre,$descripcion,$precio,$barras,$proveedor,$id));
    header('location:inventario.php');

?>