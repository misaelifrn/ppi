CREATE DATABASE sistema;

USE sistema;

CREATE TABLE usuarios(
    id_usuario      INT AUTO_INCREMENT NOT NULL,
    nome            VARCHAR(100) NOT NULL,
    email           VARCHAR(150) NOT NULL,
    senha           VARCHAR(150) NOT NULL,

    PRIMARY KEY (id_usuario)
);

CREATE TABLE tarefas(
    id_tarefa       INT AUTO_INCREMENT NOT NULL,
    id_usuario      INT NOT NULL,
    descricao       VARCHAR(255) NOT NULL,
    concluida       TINYINT(1) DEFAULT 0,
    data_criacao    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (id_tarefa),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

INSERT INTO usuarios (nome, email, senha) VALUES 
('João', 'joao@teste.com', '$2y$10$osVIO4cPLWwZ5ozihmJccu0r1x/iXohecRnXkMDr.9M4m9oP7e8xe');

INSERT INTO usuarios (nome, email, senha) VALUES 
('Pedro', 'pedro@gmail.com', '$2y$10$osVIO4cPLWwZ5ozihmJccu0r1x/iXohecRnXkMDr.9M4m9oP7e8xe');

INSERT INTO usuarios (nome, email, senha) VALUES 
('José', 'jose@gmail.com', '$2y$10$osVIO4cPLWwZ5ozihmJccu0r1x/iXohecRnXkMDr.9M4m9oP7e8xe');

INSERT INTO tarefas (id_usuario, descricao, concluida, data_criacao) VALUES
(1, 'Terminar trabalho de PPI', null, '2026-02-11');

SELECT * FROM usuarios WHERE id_usuario = 1;

-- SELECT COUNT(*) FROM tarefas;

-- php -r "echo password_hash('123', PASSWORD_DEFAULT), PHP_EOL;"

"SELECT * FROM tarefas WHERE id_usuario = 1 ORDER BY data_criacao DESC";