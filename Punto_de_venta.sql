CREATE DATABASE Punto_de_venta;
USE Punto_de_venta;

CREATE TABLE usuario(
    id_usuario VARCHAR(256) PRIMARY KEY NOT NULL,
    nombre VARCHAR(512) NOT NULL,
    contrasena VARCHAR(256) NOT NULL,
    tipo   INT NOT NULL
);

INSERT INTO usuario VALUES ('cipher', 'Pedro', md5(1234), 0);