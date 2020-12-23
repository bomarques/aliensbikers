
drop database if exists aliensdb ;

create database aliensdb;

use aliensdb;

CREATE TABLE ciclistas(
    id int(4) AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    email varchar(50),
    instagram varchar(50),
    nascimento date,
    editar bit,
    senha varchar(15),
    apelido varchar(15),
    criado datetime,
    modificado datetime,
    PRIMARY KEY (id)
);
describe ciclistas;


SELECT * FROM ciclistas;
