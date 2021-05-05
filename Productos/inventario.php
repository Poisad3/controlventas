<?php 
    include_once '../conexion.php';

    //Leer base de datos
    $sql_leer = 'SELECT * FROM producto';
    $sleer = $con->prepare($sql_leer);
    $sleer->execute();
    $datosarray = $sleer->fetchall();

    //Agregar a base de datos
    if($_POST){
      $nombre_producto = $_POST['producto'];
      $detalle_producto = $_POST['detalle_producto'];
      $precio = $_POST['precio'];
      $cod_barra_producto = $_POST['cod_barra_producto'];
      $proveedor = $_POST['proveedor'];


      $sql_agregar = 'INSERT INTO producto (nombre_producto,detalle_producto, precio,cod_barra_producto,proveedor_id_proveedor) VALUES (?,?,?,?,?)';
      $sagregar = $con->prepare($sql_agregar);
      $sagregar->execute(array($nombre_producto,$detalle_producto,$precio,$cod_barra_producto,$proveedor));
      header('location:inventario.php');
    }


    //Editar a base de datos
    if($_GET){
      $id = $_GET['id'];
      $sql_editar = 'SELECT * FROM producto WHERE id_producto=?';
      $seditar = $con->prepare($sql_editar);
      $seditar->execute(array($id));
      $datos_editar = $seditar->fetch();
    }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <!--Import Google Icon Font-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <!-- Navbar goes here -->
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Miscelanea Emanuel</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../ofertas.html">Ofertas</a></li>
        <li><a href="inventario.php">Inventario</a></li>
        <li><a href="../configuracion.html">Configuracion</a></li>
        <li><a href="../logout.html">Logout</a></li>
      </ul>
    </div>
  </nav>
  <nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
  <!-- Page Layout here -->
  <div class="row">

    <div class="col s12 m4 l3">
      <!-- Grey navigation panel -->
      <ul class="collection">
        <li class="collection-header"><h4>Opciones</h4></li>
        <li class="collection-item"><a href="../Clientes/clientes.php">Clientes</a></li>
        <li class="collection-item">Proveedores</li>
        <li class="collection-item">Factura</li>
      </ul>
    </div>

    <div class="col s12 m8 l9">
      <!-- Agregar Producto a Base de Datos -->
      <?php if(!$_GET): ?>
      <h3 align="center">Agregar Producto</h3><br>
      <form class="col s12" method="POST">
        <div class="row">

          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Nombre Producto" id="producto" type="text" class="validate" name='producto'>
              <label for="producto">Producto</label>
            </div>
            <div class="input-field col s6">
              <input id="detalle_producto" type="text" class="validate"  name='detalle_producto'>
              <label for="detalle_producto">Detealle Producto</label>
            </div>
            <div class="input-field col s6">
              <input id="precio" type="text" class="validate" name='precio'>
              <label for="precio">Precio</label>
            </div>
            <div class="input-field col s6">
              <input id="cod_barra_producto" type="text" class="validate" name='cod_barra_producto'>
              <label for="cod_barra_producto">Codigo Barras</label>
            </div>
            <div class="input-field col s6">
              <input id="proveedor" type="text" class="validate" name='proveedor'>
              <label for="proveedor">Codigo Proveedor</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
    <i class="material-icons right">save</i>
  </button>
            </div>
          </div>
        </div>
      </form>
      <?php endif ?>
      
            <!-- Editar Productos a Base de Datos -->
      <?php if($_GET): ?>
      <h3 align="center">Editar Producto</h3><br>
      <form class="col s12" method="GET" action="editar.php">
        <div class="row">

          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Nombre Producto" id="producto" type="text" class="validate" name='producto' value="<?php echo $datos_editar['nombre_producto'] ?>">
              <label for="producto">Producto</label>
            </div>
            <div class="input-field col s6">
              <input id="detalle_producto" type="text" class="validate"  name='detalle_producto' value="<?php echo $datos_editar['detalle_producto'] ?>">
              <label for="detalle_producto">Detealle Producto</label>
            </div>
            <div class="input-field col s6">
              <input id="precio" type="text" class="validate" name='precio' value="<?php echo $datos_editar['precio'] ?>">
              <label for="precio">Precio</label>
            </div>
            <div class="input-field col s6">
              <input id="cod_barra_producto" type="text" class="validate" name='cod_barra_producto' value="<?php echo $datos_editar['cod_barra_producto'] ?>">
              <label for="cod_barra_producto">Codigo Barras</label>
            </div>
            <div class="input-field col s6">
              <input id="proveedor" type="text" class="validate" name='proveedor' value=" <?php echo $datos_editar['proveedor_id_proveedor'] ?>">
              <label for="proveedor">Codigo Proveedor</label>
            </div>
          </div>
          <input id="id" type="hidden" class="validate" name='id' value=" <?php echo $datos_editar['id_producto'] ?>">
          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit" name="action">Editar
    <i class="material-icons right">edit</i>
  </button>
            </div>
          </div>
        </div>
      </form>
      <?php endif ?>
      <!-- Teal page content  -->
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Detalle</th>
            <th>Precio</th>
            <th>Codigo Barras</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($datosarray as $datos): ?>
          <tr>
            <td>
              <?php echo $datos['id_producto'] ?>
            </td>
            <td>
              <?php echo $datos['nombre_producto'] ?>
            </td>
            <td>
              <?php echo $datos['detalle_producto'] ?>
            </td>
            <td>
              Q<?php echo $datos['precio'] ?>
            </td>
            <td>
              <?php echo $datos['cod_barra_producto'] ?>
            </td>
            <td>
            <a href="inventario.php?id=<?php echo $datos['id_producto'] ?>"><i class="material-icons">edit</i></a>
              </td>
          </tr>
          <?php endforeach ?>
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