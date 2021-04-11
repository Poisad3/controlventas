<?php 
    include_once 'conexion.php';

    //Leer base de datos
    $sql_leer = 'SELECT * FROM producto';
    $sleer = $conn->prepare($sql_leer);
    $sleer->execute();
    $datosarray = $sleer->fetchall();
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
        <li><a href="index.html">Inicio</a></li>
        <li><a href="ofertas.html">Ofertas</a></li>
        <li><a href="inventario.php">Inventario</a></li>
        <li><a href="configuracion.html">Configuracion</a></li>
        <li><a href="logout.html">Logout</a></li>
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
       <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>NIT</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($datosarray as $datos): ?>
          <tr>
            <td><?php echo $datos['id_cliente'] ?></td>
            <td><?php echo $datos['nombre_cliente'] ?></td>
            <td><?php echo $datos['nit_cliente'] ?></td>
            <a href="clientes.php?id=<?php echo $datos['id_cliente'] ?>"></a>
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