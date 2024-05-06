CREATE DATABASE compromissos;
USE compromissos;

CREATE TABLE eventos (
    id INT(5) PRIMARY KEY,
    nome_evento VARCHAR(255),
    data_evento DATE,
    hora_inicio TIME,
    hora_fim TIME,
    descricao VARCHAR(255),
    local_evento VARCHAR(255),
    responsavel VARCHAR(255)
);