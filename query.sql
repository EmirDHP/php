-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS crud_ecommerce;

-- Usar la base de datos
USE crud_ecommerce;

-- Crear la tabla categorias
CREATE TABLE IF NOT EXISTS categorias (
    IdCategoria INT PRIMARY KEY AUTO_INCREMENT ,
    NombreCategoria VARCHAR(100),
    Estado TINYINT(1)
);

-- Crear la tabla marcas
CREATE TABLE IF NOT EXISTS marcas (
    IdMarcas INT PRIMARY KEY AUTO_INCREMENT,
    NombreMarca VARCHAR(100),
    Estado INT,
    Imagen LONGBLOB
);

-- Crear la tabla productos
CREATE TABLE IF NOT EXISTS productos (
    IdProducto INT PRIMARY KEY AUTO_INCREMENT,
    CategoriaId INT,
    MarcaId INT,
    Precio VARCHAR(100),
    DescripcionProducto VARCHAR(500),
    Nombre VARCHAR(100),
    FOREIGN KEY (CategoriaId) REFERENCES categorias(IdCategoria),
    FOREIGN KEY (MarcaId) REFERENCES marcas(IdMarcas)
);

-- Insertar datos en la tabla categorias
INSERT INTO categorias (NombreCategoria, Estado)
VALUES
    ('Electrónicos', 1),
    ('Ropa', 1),
    ('Hogar', 1),
    ('Deportes', 1),
    ('Belleza', 1);

-- Insertar datos en la tabla marcas
INSERT INTO marcas (NombreMarca, Estado, Imagen)
VALUES
    ('Sony', 11, NULL),
    ('Nike', 11, NULL),
    ('Samsung', 11, NULL),
    ('Adidas', 11, NULL),
    ('Apple', 11, NULL);

-- Insertar datos en la tabla productos
INSERT INTO productos (CategoriaId, MarcaId, Precio, DescripcionProducto, Nombre)
VALUES
    (1, 1, '$500', 'Televisor LED Full HD', 'Televisor Sony 42"'),
    (2, 2, '$80', 'Playera deportiva transpirable', 'Playera Nike Dri-FIT'),
    (3, 3, '$50', 'Juego de utensilios de cocina', 'Set de cocina Samsung'),
    (4, 4, '$120', 'Zapatillas para correr', 'Zapatillas Adidas Ultraboost'),
    (5, 5, '$700', 'Teléfono inteligente de alta gama', 'iPhone 13 Pro');

