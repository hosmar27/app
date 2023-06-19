CREATE DATABASE IF NOT EXISTS trailermarine;

USE trailermarine;

CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    admin varchar(1) NOT null
);

CREATE TABLE IF NOT EXISTS pacote (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (100) NOT NULL,
    valor VARCHAR (10) NOT NULL,
    imagem mediumblob NOT NULL
);

INSERT INTO pacote (nome,valor) values(
    'pacote barbados','R$5.000,00'
);
