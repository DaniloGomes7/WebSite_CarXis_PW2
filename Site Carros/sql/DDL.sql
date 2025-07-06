CREATE DATABASE CarXis;
USE CarXis;


CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    numero_cracha INT NOT NULL
);
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR (255),
);
