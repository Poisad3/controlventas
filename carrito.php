<?php
   session_start();
  
  if(isset($_POST['btnAccion'])){
    
    switch($_POST['btnAccion']){
        
      case 'Agregar':
          $ID=$_POST['id'];
          $NOMBRE=$_POST['nombre'];
          $DESCRIPCION=$_POST['descripcion'];
          $PRECIO=$_POST['precio'];
        
        
        if(!isset($_SESSION['CARRITO'])){
  
           $producto=array(
            'ID'=>$ID,
            'NOMBRE'=>$NOMBRE,
            'DESCRIPCION'=>$DESCRIPCION,
            'PRECIO'=>$PRECIO
             );
          
          $_SESSION['CARRITO'][0]=$producto;
          
          }else{
          $NumeroProductos=count($_SESSION['CARRITO']);
          $producto=array(
            'ID'=>$ID,
            'NOMBRE'=>$NOMBRE,
            'DESCRIPCION'=>$DESCRIPCION,
            'PRECIO'=>$PRECIO
            );
          
          $_SESSION['CARRITO'][$NumeroProductos]=$producto;
          }
        brake;
        
    }
  }
?>