CREATE DATABASE sistema;

USE sistema;

CREATE TABLE usuarios(
    id_usuarios     INT AUTO_INCREMENT NOT NULL,
    nome            VARCHAR(100) NOT NULL,
    email           VARCHAR(150) NOT NULL,
    senha           VARCHAR(150) NOT NULL,

    PRIMARY KEY (id_usuarios)
);

CREATE TABLE tarefas(
    id_tarefas      INT AUTO_INCREMENT NOT NULL,
    id_usuarios     INT NOT NULL,
    descricao       VARCHAR(255) NOT NULL,
    concluida       TINYINT(1) DEFAULT 0,
    data_criacao    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (id_tarefas),
    FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios)
);

INSERT INTO usuarios (nome, email, senha) VALUES 
('José', 'jose@gmail.com', '$2y$10$.LzF.YIR/vfvvEso.d/k9uc2DNHAVYn.ilxhpU.kvdWoM4WfeK92.');

INSERT INTO tarefas (id_usuarios, descricao, concluida, data_criacao) VALUES
(1, 'Jayane é chata. Cortar amizade.', null, '2026-02-11');

SELECT * FROM usuarios WHERE id_usuarios = 1;

SELECT * FROM tarefas WHERE id_tarefas = 1;

