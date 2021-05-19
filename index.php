<?php 
    include 'carrito.php';
    include_once 'conexion.php';
    include 'templates/header.php';

    
    if($_GET){
      $cantidad=$_GET['cantidad'];
      $cod_barra_producto = $_GET['cod_barra_producto'];
      $sql_editar = 'SELECT * FROM producto WHERE cod_barra_producto=?';
      $seditar = $con->prepare($sql_editar);
      $seditar->execute(array($cod_barra_producto));
      
      $datos_editar = $seditar->fetchall();
      //$consultar= array();
      //array_push($consultar,$datos_editar);
    }
     
  
     // foreach ($_SESSION['CARRITO'] as $indice=>$producto){
      //  echo $producto['NOMBRE'];
     //}   
    
?>

  <!-- Page Layout here -->
  <div class="row">

    <div class="col s12 m4 l3">
      <!-- Grey navigation panel -->
      <ul class="collection with-header" id="nav-mobile">
        <li class="collection-header"><h4>Opciones</h4></li>
        <li class="collection-item"><a href="Clientes/clientes.php">Clientes</a></li>
        <li class="collection-item"><a href="proveedores/proveedores.php">Proveedores</a></li>
      </ul>
    </div>

    <div class="col s12 m8 l9">
      <!-- Teal page content  -->
      <h3 align="center">Agregar Producto</h3><br>
      <form class="col s12" method="GET">
        <div class="row">
           <div class="input-field col s6">
              <input id="cod_barra_producto" type="text" class="validate" name='cod_barra_producto'>
              <label for="cod_barra_producto">Codigo Barras</label>
            </div>
             <div class="input-field col s6">
              <input id="cantidad" type="text" class="validate" name='cantidad'>
              <label for="cantidad">Cantidad</label>
            </div>      
                  </div>
          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit" name="btnAccion" value="agregar">Buscar
    <i class="material-icons right">search</i>
  </button>
            </div>
          </div>
      </form>
      <table>
        <thead>
          <tr>
            <th>Producto</th>
            <th>Marca</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
             <?php if($_GET): ?>
          <?php $total=0; ?>
          
                    <?php foreach($datos_editar as $datos): ?>
          <tr>
            <td><?php echo $datos['nombre_producto']?></td>
            <td><?php echo $datos['detalle_producto']?></td>
            <td><?php echo $cantidad?></td>
            <td>Q<?php echo $datos['precio']?></td>
            <td><?php echo number_format($datos['precio']*$cantidad,2);?></td>
            
            <td><i class="material-icons">delete</i></a></td>
          </tr>
            <?php $total=$total+($datos['precio']*$cantidad);?>
          <?php endforeach ?>
          <tr>
            <td colspan="3" aling="right"><h3>
              Total
              </h3></td>
            <td aling="right"><h3>
              Q <?php echo number_format($total);?>
              </h3></td>
             <td></td>
          </tr>
         <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems);
    });
    <!--JavaScript at end of body for optimized loading-->
    <
    script type = "text/javascript"
    src = "js/materialize.min.js" >
  </script>
</body>

</html>