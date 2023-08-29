<?php
try {
    $config = require("../Config/Conexion.php");
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $id = $_GET['Id'];
    
    // Prepara la consulta SQL
    $consultaSQL = "DELETE FROM productos WHERE IdProducto ='$id'";
    $sentencia = $conexion->prepare($consultaSQL);

    // Ejecuta la consulta
    $sentencia->execute();

    // Redirecciona a la página principal u otra página después de la inserción
    header("Location: ../Index.php");
    exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    