CREATE DATABASE atividade_um;
USE atividade_um;

CREATE TABLE cliente (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    telefone VARCHAR(20) NOT NULL 
);

CREATE TABLE colaborador (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(200) NOT NULL,
    telefone VARCHAR(20) NOT NULL
);

CREATE TABLE chamado (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cliente_id INT NOT NULL,
    colaborador_id INT,
    data_abertura DATE NOT NULL,
    status VARCHAR(50) NOT NULL,
    criticidade VARCHAR(50) NOT NULL,
    descricao TEXT NOT NULL,

    FOREIGN KEY (cliente_id) REFERENCES cliente(id),
    FOREIGN KEY (colaborador_id) REFERENCES colaborador(id)
);

INSERT INTO cliente (nome, email, telefone) VALUES ('Cliente A', 'cliente@email.com', '1234567890');
INSERT INTO colaborador (nome, email, telefone) VALUES ('Colaborador', 'colaboradro@gmail.com', '1234567890');