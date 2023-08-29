<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $config = require("../Config/Conexion.php");

    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        
        // Recoge los datos del formulario
        $id = $_POST['Id'];
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $categoria = $_POST['Categorias'];
        $marca = $_POST['Marcas'];
        $precio = $_POST['Precio'];

        // Prepara la consulta SQL
        $consultaSQL = "UPDATE productos SET
                                Nombre='".$nombre."',
                                DescripcionProducto='".$descripcion."',
                                CategoriaId='".$categoria."',
                                MarcaId='".$marca."',
                                Precio='".$precio."' WHERE IdProducto = ".$id."";
        $sentencia = $conexion->prepare($consultaSQL);

        // Ejecuta la consulta
        $sentencia->execute();

        // Redirecciona a la página principal u otra página después de la inserción
        //header("Location: ../Index.php");
        header("Location: ../Index.php?editado=1");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}