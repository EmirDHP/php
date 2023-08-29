<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $config = require("../Config/Conexion.php");

    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        
        // Recoge los datos del formulario
        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $categoria = $_POST['CategoriaP'];
        $marca = $_POST['MarcaP'];
        $precio = $_POST['Precio'];

        // Prepara la consulta SQL
        $consultaSQL = "INSERT INTO productos (Nombre, DescripcionProducto, CategoriaId, MarcaId, Precio) VALUES ('$nombre','$descripcion','$categoria', '$marca', '$precio')";
        $sentencia = $conexion->prepare($consultaSQL);

        // Ejecuta la consulta
        $sentencia->execute();

        // Redirecciona a la página principal u otra página después de la inserción
        //header("Location: ../Index.php");
        header("Location: ../Index.php?guardado=2");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}