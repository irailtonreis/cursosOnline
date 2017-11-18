
create database curso_online;

create table conta (
	codigo INT(6) unsigned auto_increment primary key,
    email varchar(100) not null,
    senha varchar(255) not null);

create table tentativas (
	id INT(6) unsigned auto_increment primary key,
    email varchar(100) not null,
    datahora datetime default current_timestamp );

 create table cursos(
    id int (6) unsigned auto_increment primary key,
    nome varchar(50) not null,
    descricao varchar(100) not null
    );