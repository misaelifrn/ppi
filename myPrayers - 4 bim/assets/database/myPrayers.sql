CREATE DATABASE myPrayers;

USE myPrayers;

CREATE TABLE user(
    id_user             INT AUTO_INCREMENT NOT NULL,
    name                VARCHAR(255) NOT NULL,
    email               VARCHAR(200) NOT NULL,
    password            VARCHAR(200) NOT NULL,

    PRIMARY KEY (id_user)
);

CREATE TABLE oracao(
    id_oracao           INT AUTO_INCREMENT NOT NULL,
    id_user             INT NOT NULL,
    title               VARCHAR(150) NOT NULL,
    body                VARCHAR(255) NOT NULL,
    data_create         TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (id_oracao),
    FOREIGN KEY (id_user) REFERENCES user(id_user)
);

INSERT INTO user (name, email, password) 
VALUES ('Misael', 'misael@gmail.com', '$2y$10$6fQ5fdR4sPrvMPb3qHUFj.eOND16YnW5wCzsGaKvMrVLRgysQLpg6');

INSERT INTO user (name, email, password) 
VALUES ('Pedro', 'pedro@gmail.com', '$2y$10$6fQ5fdR4sPrvMPb3qHUFj.eOND16YnW5wCzsGaKvMrVLRgysQLpg6');

INSERT INTO oracao (id_user, title, body, data_create)
VALUES (1, 'Oração de São Bento', '
Não seja o dragão o meu guia.
Retira-te, Satanás!
Nunca me aconselhes coisas vãs.
É mau o que tu me ofereces.
Bebe tu mesmo os teus venenos.
Amém.', '2026-09-11');

INSERT INTO oracao (id_user, title, body, data_create)
VALUES (2, 'Oração de São Miguel Arcanjo', '
São Miguel Arcanjo, defendei-nos no combate, sede nosso refúgio contra a maldade e as ciladas do demônio. Ordene-lhe Deus, instantemente o pedimos, e vós príncipe da milícia celeste, pelo Divino Poder, precipitai no inferno a Satanás e a todos os espíritos malignos, que andam pelo mundo para perder as almas. Amém.', '2026-09-11');

-- php -r "echo password_hash('abc', PASSWORD_DEFAULT), PHP_EOL;"