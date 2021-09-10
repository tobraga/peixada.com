create database peixada;

use peixada;

create table login(
    idLogin int(5) not null auto_increment,
    nome varchar (30),
    senha varchar (10),
    primary key (idLogin)
);

INSERT INTO login (nome, senha) VALUES ('admin','123');
ALTER TABLE login CHANGE nome user varchar(30);

create table empregado(
    id 
    nome
    senha
    
);

create table empresa(
    id 
    nome
    senha
    
)

