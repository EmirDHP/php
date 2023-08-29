<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <br>
      <h1 class="text-center" style="background-color: black; color:white;">Editar Producto</h1>
    </div>
    
    <div class="container">
      <form action="../CRUD/Editar.php" method="POST">
        <?php
            $config = require ("../Config/Conexion.php");
            $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
            $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

            $consultaSQL = "SELECT * FROM productos WHERE IdProducto =".$_REQUEST['Id'];
            $sentencia = $conexion->prepare($consultaSQL);
            $sentencia->execute();
            $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
        ?>

        <input type="hidden" class="form-control" name="Id" value="<?php echo $fila['IdProducto']; ?>">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Nombre" value="<?php echo $fila['Nombre']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="Descripcion" value="<?php echo $fila['DescripcionProducto']; ?>">
        </div>

        <label class="form-label">Categoria</label>
        <select class="form-select mb-3" name="Categorias">
            <option selected disabled>Seleccion la categoria</option>
            <?php
                $config = require ("../Config/Conexion.php");
                $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
                $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            
                $consultaSQL = "SELECT * FROM categorias WHERE IdCategoria = ".$fila['CategoriaId'];
                $sentencia = $conexion->prepare($consultaSQL);
                $sentencia->execute();
                $marcas1 = $sentencia->fetch(PDO::FETCH_ASSOC);
            
                echo "<option selected value='".$marcas1['IdCategoria']."'>".$marcas1['NombreCategoria']."</option>";
                
                $consultaSQL = "SELECT * FROM categorias";
                $sentencia = $conexion->prepare($consultaSQL);
                $sentencia->execute();
                $marcas2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
                foreach ($marcas2 as $marca2) {
                    echo "<option value='".$marca2['IdCategoria']."'>".$marca2['NombreCategoria']."</option>";
                }
            ?>
        </select>

        <label class="form-label">Marca</label>
        <select class="form-select mb-3" name="Marcas">
            <option selected disabled>Seleccion la marca</option>            
            <?php
                $config = require ("../Config/Conexion.php");
                $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
                $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            
                $consultaSQL = "SELECT * FROM marcas WHERE IdMarcas = ".$fila['MarcaId'];
                $sentencia = $conexion->prepare($consultaSQL);
                $sentencia->execute();
                $marcas1 = $sentencia->fetch(PDO::FETCH_ASSOC);
            
                echo "<option selected value='".$marcas1['IdMarcas']."'>".$marcas1['NombreMarca']."</option>";
                
                $consultaSQL = "SELECT * FROM marcas";
                $sentencia = $conexion->prepare($consultaSQL);
                $sentencia->execute();
                $marcas2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
                foreach ($marcas2 as $marca2) {
                    echo "<option value='".$marca2['IdMarcas']."'>".$marca2['NombreMarca']."</option>";
                }
            ?>
        </select>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="Precio" value="<?php echo $fila['Precio']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="../Index.php" class="btn btn-secondary">Regresar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>