CREATE DATABASE login;

USE login;

CREATE TABLE usuarios(
    id          INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome        VARCHAR(100) NOT NULL,
    email       VARCHAR(150) NOT NULL,
    senha       VARCHAR(150) NOT NULL
);


/*
show databases;
show tables;
describe usuarios;

quando quiserem criar um usuário usem esse comando no terminal, peguem o hash e usem no comando sql abaixo
php -r "echo password_hash('123456', PASSWORD_DEFAULT), PHP_EOL;"

INSERT INTO usuarios (nome, email, senha)
VALUES (
    'João',
    'joao@teste.com',
    'COLA AQUI O HASH GERADO'
);
*/