<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
      <br>
      <h1 class="text-center" style="background-color: black; color:white;">Listado de Productos</h1>
    </div>
  <br>

    <div class="container">

    <?php
    // Verificar si se pasó el parámetro de guardado en la URL
    if (isset($_GET['editado']) && $_GET['editado'] == 1) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                ¡Se ha editado el registro!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if (isset($_GET['guardado']) && $_GET['guardado'] == 2) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              ¡Se ha guardado el registro!.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if (isset($_GET['eliminado']) && $_GET['eliminado'] == 3) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              ¡Se ha eliminado el registro!.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>      

      <a href="Formularios/AgregarProducto.php" class="btn btn-primary">Agregar producto</a>
      </p>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Marca</th>
            <th scope="col">Precio</th>          
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $error = false;
              $config = require ("Config/Conexion.php");

              $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
              $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
          
              $consultaSQL = "SELECT * FROM productos
                              INNER JOIN categorias ON productos.CategoriaId = categorias.IdCategoria
                              INNER JOIN marcas ON productos.MarcaId = marcas.IdMarcas";

              $sentencia = $conexion->prepare($consultaSQL);
              $sentencia->execute();
          
              $resultado = $sentencia->fetchAll();

              if ($resultado && $sentencia->rowCount() > 0) {
                foreach ($resultado as $fila) {
            ?>
          <tr>
            <th><?php echo $fila['IdProducto']?></th>
            <td><?php echo $fila['Nombre']?></td>
            <td><?php echo $fila['DescripcionProducto']?></td>
            <td><?php echo $fila['NombreCategoria']?></td>
            <td><?php echo $fila['NombreMarca']?></td>            
            <td><?php echo $fila['Precio']?></td>
            <td>
              <a href="Formularios/EditarProducto.php?Id=<?php echo $fila['IdProducto']?>" class="btn btn-secondary">Editar</a>
              <a href="CRUD/EliminarProducto.php?Id=<?php echo $fila['IdProducto']?>" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          <?php
              }
            }
          ?>

        </tbody>
      </table>

      <!-- <div class="container">
        <a href="" class="btn btn-primary">Agregar producto</a>
      </div> -->

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>