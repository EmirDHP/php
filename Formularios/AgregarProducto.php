<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
      <br>
      <h1 class="text-center" style="background-color: black; color:white;">Agregar Producto</h1>
    </div>

    <div class="container">
      <form action="../CRUD/Crear.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Nombre">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" name="Descripcion">
        </div>

        <label class="form-label">Categoria</label>
        <select class="form-select mb-3" name="CategoriaP">
            <option selected disabled>Seleccion la categoria</option>            
            <?php
                $config = require ("../Config/Conexion.php");
                $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
                $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            
                $consultaSQL = "SELECT * FROM categorias";
                $sentencia = $conexion->prepare($consultaSQL);
                $sentencia->execute();
                $categorias = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
                foreach ($categorias as $categoria) {
                    echo "<option value='".$categoria['IdCategoria']."'>".$categoria['NombreCategoria']."</option>";
                }
            ?>
        </select>

        <label class="form-label">Marca</label>
        <select class="form-select mb-3" name="MarcaP">
            <option selected disabled>Seleccion la marca</option>            
            <?php
                $config = require ("../Config/Conexion.php");
                $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
                $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            
                $consultaSQL = "SELECT * FROM marcas";
                $sentencia = $conexion->prepare($consultaSQL);
                $sentencia->execute();
                $marcas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
                foreach ($marcas as $marca) {
                    echo "<option value='".$marca['IdMarcas']."'>".$marca['NombreMarca']."</option>";
                }
            ?>
        </select>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="Precio">
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
        <a href="../Index.php" class="btn btn-secondary">Regresar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>