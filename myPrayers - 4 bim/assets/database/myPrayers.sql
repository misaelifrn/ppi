CREATE DATABASE myPrayers;

USE myPrayers;

CREATE TABLE user(
    id_user             INT AUTO_INCREMENT NOT NULL,
    name                VARCHAR(255) NOT NULL,
    email               VARCHAR(200) NOT NULL,
    password            VARCHAR(200) NOT NULL,

    PRIMARY KEY (id_user)
);