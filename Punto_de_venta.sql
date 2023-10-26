CREATE DATABASE Punto_de_venta;
USE Punto_de_venta;

CREATE TABLE usuario(
    id_usuario VARCHAR(256) PRIMARY KEY NOT NULL,
    nombre VARCHAR(512) NOT NULL,
    telefono VARCHAR(16),
    contrasena VARCHAR(256) NOT NULL
);

CREATE TABLE permiso(
    id_permiso INT PRIMARY KEY AUTO_INCREMENT,
    usuario INT,
    inventario INT,
    cliente INT,
    venta INT,
    id_usuario VARCHAR(256) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

INSERT INTO usuario VALUES ('administrador', 'Pedro Hdez', '2223718938', md5(1234));
INSERT INTO usuario VALUES ('root', 'Pedro Hdez', '2223718938', md5(1234));
INSERT INTO permiso(usuario, inventario, cliente, venta, id_usuario) VALUES (1, 1, 1, 1, 'administrador');
INSERT INTO permiso(usuario, inventario, cliente, venta, id_usuario) VALUES (1, 0, 1, 0, 'root');