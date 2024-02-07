CREATE DATABASE Punto_de_venta;
USE Punto_de_venta;

CREATE TABLE usuario(
    id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(256) NOT NULL UNIQUE,
    nombre VARCHAR(512) NOT NULL,
    ap_paterno VARCHAR(512) NOT NULL,
    ap_materno VARCHAR(512) NOT NULL,
    telefono VARCHAR(16),
    contrasena VARCHAR(256) NOT NULL,
    empleado INT,
    inventario INT,
    cliente INT,
    proveedor INT,
    venta INT
);

INSERT INTO usuario(usuario, nombre, ap_paterno, ap_materno, telefono, contrasena, empleado, inventario, cliente, proveedor, venta) 
VALUES ('root', 'Pedro L.', 'Zoyoquila', 'Hernández', '2223718938', CONCAT('abcd/',md5("abcd1234")), 1, 0, 1, 0, 1);