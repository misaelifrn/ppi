CREATE DATABASE login;

USE login;

CREATE TABLE usuarios(
    id          INT AUTO_INCREMENT NOT NULL,
    nome        VARCHAR(100) NOT NULL,
    email       VARCHAR(150) NOT NULL,
    senha       VARCHAR(150) NOT NULL
);



/*
show databases;
show tables;
describe usuarios;
*/