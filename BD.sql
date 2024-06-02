drop database if EXISTS social;
create database social;
use social;


drop table usuario;
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

drop table perfil;
create table perfil (
    id_usuario int unsigned not null primary key AUTO_INCREMENT,
    nombre varchar(30) not null,
    icono varchar(200),
    descripcion varchar(200) DEFAULT "No hay descripcion",
    foreign key (id_usuario) references usuario (id)
);

drop table publicaciones;
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

-- cracion del admin

insert into usuario (id, usuario, email, contrasena) value (0, 'admin', 'admin', sha1('admin'));
-- Inserciones en la tabla usuario
INSERT INTO usuario (usuario, email, contrasena) VALUES ('mariagarcia', 'mariagarcia@example.com', 'contrasena2');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('juanlopez', 'juanlopez@example.com', 'contrasena3');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('carmenfernandez', 'carmenfernandez@example.com', 'contrasena4');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('luisrodriguez', 'luisrodriguez@example.com', 'contrasena5');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('anaperez', 'anaperez@example.com', 'contrasena6');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('manuelgonzalez', 'manuelgonzalez@example.com', 'contrasena7');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('martamorales', 'martamorales@example.com', 'contrasena8');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('albertoramirez', 'albertoramirez@example.com', 'contrasena9');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('cristinaruiz', 'cristinaruiz@example.com', 'contrasena10');

-- Inserciones en la tabla perfil
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (19, 'Maria Garcia', 'Descripcion de Maria');
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (20, 'Juan Lopez', 'Descripcion de Juan');
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (21, 'Carmen Fernandez', 'Descripcion de Carmen');
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (22, 'Luis Rodriguez', 'Descripcion de Luis');
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (23, 'Ana Perez', 'Descripcion de Ana');
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (24, 'Manuel Gonzalez', 'Descripcion de Manuel');
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (25, 'Marta Morales', 'Descripcion de Marta');
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (26, 'Alberto Ramirez', 'Descripcion de Alberto');
INSERT INTO perfil (id_usuario, nombre, descripcion) VALUES (27, 'Cristina Ruiz', 'Descripcion de Cristina');

SELECT * from usuario;
