CREATE DATABASE IF NOT EXISTS trailermarine;

USE trailermarine;

CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    cpf VARCHAR(14),
    email VARCHAR(255),
    senha VARCHAR(255),
    admin varchar(1)
);

CREATE TABLE IF NOT EXISTS pacote (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (100),
    valor decimal (10,2),
    descricao varchar (255) not null,
    imagem mediumblob NOT NULL
);

INSERT INTO usuario (nome,cpf,email,senha,admin) values(
    'osmar','12345678901','osmar_email@email.com','12345','s'
);

INSERT INTO pacote (nome,valor,descricao) values(
    'pacote barbados','5.000,00','passeio de 3 dias no mar de barbados'
);
