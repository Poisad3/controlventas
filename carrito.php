<?php
   include_once 'conexion.php';
   session_start();
  
  if(isset($_GET['btnAccion'])){
    
    switch($_GET['btnAccion']){
        
      case 'Agregar':
           
      //$cantidad=$_GET['cantidad'];
      $cod_barra_producto = $_GET['cod_barra_producto'];
      $sql_editar = 'SELECT * FROM producto WHERE cod_barra_producto=?';
      $seditar = $con->prepare($sql_editar);
      $seditar->execute(array($cod_barra_producto));
      
      $datos_editar = $seditar->fetchall();

    foreach($datos_editar as $datos) {
          $ID=$datos['cod_barra_producto'];
          $NOMBRE=$datos['nombre_producto'];
          $DESCRIPCION=$datos['detalle_producto'];
          $PRECIO=$datos['precio'];
          $CANTIDAD=$_GET['cantidad'];
        }
        
        if(!isset($_SESSION['CARRITO'])){
  
           $producto=array(
            'ID'=>$ID,
            'NOMBRE'=>$NOMBRE,
            'DESCRIPCION'=>$DESCRIPCION,
            'PRECIO'=>$PRECIO,
            'CANTIDAD'=>$CANTIDAD
             );
          
          $_SESSION['CARRITO'][0]=$producto;
          
          }else{
          $NumeroProductos=count($_SESSION['CARRITO']);
          $producto=array(
            'ID'=>$ID,
            'NOMBRE'=>$NOMBRE,
            'DESCRIPCION'=>$DESCRIPCION,
            'PRECIO'=>$PRECIO,
            'CANTIDAD'=>$CANTIDAD
            );
          
          $_SESSION['CARRITO'][$NumeroProductos]=$producto;
          }
        brake;
        
    }
  }
?>