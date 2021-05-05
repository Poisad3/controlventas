<?php 
    include_once '../conexion.php';

    //Leer base de datos
    $sql_leer = 'SELECT * FROM cliente';
    $sleer = $con->prepare($sql_leer);
    $sleer->execute();
    $datosarray = $sleer->fetchall();

    //Agregar a base de datos
    if($_POST){
      $nombre = $_POST['nombre'];
      $nit = $_POST['nit'];
      $sql_agregar = 'INSERT INTO cliente (nombre_cliente,nit_cliente) VALUES (?,?)';
      $sagregar = $con->prepare($sql_agregar);
      $sagregar->execute(array($nombre,$nit));
      header('location:clientes.php');
    }


    //Editar a base de datos
    if($_GET){
      $id = $_GET['id'];
      $sql_editar = 'SELECT * FROM cliente WHERE id_clientes=?';
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
</head>

<body>
  <!-- Navbar goes here -->
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Miscelanea Emanuel</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../ofertas.html">Ofertas</a></li>
        <li><a href="../Productos/inventario.php">Inventario</a></li>
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
      <ul class="collection with-header" id="nav-mobile">
        <li class="collection-header"><h4>Opciones</h4></li>
        <li class="collection-item"><a href="clientes.php">Clientes</a></li>
        <li class="collection-item">Proveedores</li>
        <li class="collection-item">Factura</li>
      </ul>
    </div>

    <div class="col s12 m8 l9">
      
      <!-- Teal page content  -->
   <?php if(!$_GET): ?>
      <h3 align="center">Agregar Clientes</h3><br>
      <form class="col s12" method="POST">
        <div class="row">

          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Nombre Cliente" id="nombre" type="text" class="validate" name='nombre'>
              <label for="nombre">Nombre Cliente</label>
            </div>
            <div class="input-field col s6">
              <input id="nit" type="text" class="validate"  name='nit'>
              <label for="nit">NIT</label>
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
      <h3 align="center">Editar Clientes</h3><br>
      <form class="col s12" method="GET" action="editar.php">
        <div class="row">

          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Nombre Cliente" id="nombre" type="text" class="validate" name='nombre' value="<?php echo $datos_editar['nombre_cliente'] ?>">
              <label for="nombre">Nombre Cliente</label>
            </div>
            <div class="input-field col s6">
              <input id="nit" type="text" class="validate"  name='nit' value="<?php echo $datos_editar['nit_cliente'] ?>">
              <label for="nit">NIT Cliente</label>
            </div>
          </div>
          <input id="id" type="hidden" class="validate" name='id' value=" <?php echo $datos_editar['id_clientes'] ?>">
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
       <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>NIT</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($datosarray as $datos): ?>
          <tr>
            <td><?php echo $datos['id_clientes'] ?></td>
            <td><?php echo $datos['nombre_cliente'] ?></td>
            <td><?php echo $datos['nit_cliente'] ?></td>
            <td>
            <a href="clientes.php?id=<?php echo $datos['id_clientes'] ?>"><i class="material-icons">edit</i></a>
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