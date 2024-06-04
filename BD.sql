drop database if EXISTS social;
create database social;
use social;


create table usuario (
    id int unsigned not null primary key auto_increment,
    usuario varchar(30) not null UNIQUE,
    email varchar(60) not null UNIQUE,
    contrasena varchar(200) not null
);

--  crear los subtipos de usuario (premium y normal) heredan la clave primaria de usuario comop primaria foranea

create table usuario_premium(
    id_usuario_premium int unsigned not null primary key,
    foreign key (id_usuario_premium) references usuario(id)
);

create table usuario_normal(
    id_usuario_normal int unsigned not null primary key,
    foreign key (id_usuario_normal) references usuario(id)
);

create table perfil (
    id_usuario int unsigned not null primary key AUTO_INCREMENT,
    nombre varchar(30) not null,
    icono varchar(200),
    descripcion varchar(200) DEFAULT "No hay descripcion",
    foreign key (id_usuario) references usuario (id)
);

create table publicaciones(
    id_publicaciones int not null primary key AUTO_INCREMENT,
    fecha DATETIME default CURRENT_TIMESTAMP,
    contenido varchar(1000),
    imagen blob,
    id_usuario int unsigned not null,
    foreign key (id_usuario) references usuario (id)
);
create table grupos(
    id_grupo int unsigned not null primary key AUTO_INCREMENT,
    nombre varchar(30) not null,
    descripcion varchar(200),
    imagen varchar(200),
    id_usuario_premium int unsigned not null,
    foreign key (id_usuario_premium) references usuario_premium (id_usuario_premium)
);

create table pertenecer_grupo(
    id_usuario int unsigned not null,
    id_grupo int unsigned not null,
    PRIMARY KEY(id_usuario,id_grupo),
    foreign key (id_usuario) references usuario (id),
    foreign key (id_grupo) references grupos (id_grupo)
);

use social;
select * from usuario;

insert into usuario_premium values (18)