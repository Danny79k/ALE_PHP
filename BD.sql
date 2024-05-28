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

-- comandito bakanos
insert into usuario (usuario, email, contrasena) values ('Danny', 'belloli.danny@correo.com', sha1('1234'))

select * from usuario;

select * from usuario_normal;

-- la maldita consulta multitabla

select * from usuario inner JOIN usuario_normal on usuario.id = usuario_normal.id_usuario_normal;

delete from usuario;
delete from usuario_normal;

select * from publicaciones;

select * from usuario inner join publicaciones on usuario.id = publicaciones.id_usuario


select * from publicaciones;

delete from publicaciones;


select * from perfil;
select * from usuario;

insert into publicaciones (contenido, id_usuario) values ("dsdsdsd", 11);

select * from perfil where id_usuario =11

select * from usuario where usuario like '% %'

INSERT INTO usuario (usuario, email, contrasena) VALUES ('JuanPerez', 'juan.perez@example.com', 'passwordJuan');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('MariaGonzalez', 'maria.gonzalez@example.com', 'passwordMaria');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('CarlosLopez', 'carlos.lopez@example.com', 'passwordCarlos');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('AnaMartinez', 'ana.martinez@example.com', 'passwordAna');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('LuisGarcia', 'luis.garcia@example.com', 'passwordLuis');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('LauraRodriguez', 'laura.rodriguez@example.com', 'passwordLaura');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('JoseHernandez', 'jose.hernandez@example.com', 'passwordJose');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('ElenaSanchez', 'elena.sanchez@example.com', 'passwordElena');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('MiguelRamirez', 'miguel.ramirez@example.com', 'passwordMiguel');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('CarmenTorres', 'carmen.torres@example.com', 'passwordCarmen');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('JavierDiaz', 'javier.diaz@example.com', 'passwordJavier');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('LuciaFernandez', 'lucia.fernandez@example.com', 'passwordLucia');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('ManuelRuiz', 'manuel.ruiz@example.com', 'passwordManuel');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('SaraJimenez', 'sara.jimenez@example.com', 'passwordSara');
INSERT INTO usuario (usuario, email, contrasena) VALUES ('DanielMoreno', 'daniel.moreno@example.com', 'passwordDaniel');

update perfil set icono = "https://tantie77.files.wordpress.com/2014/06/someday-i-will-murder-u.jpg" where id_usuario = 11;
select * from perfil;

UPDATE perfil SET descripcion = 'Disfrutando cada momento 🌟' WHERE id_usuario = 12;
UPDATE perfil SET descripcion = 'Siempre aprendiendo algo nuevo 📚' WHERE id_usuario = 13;
UPDATE perfil SET descripcion = 'La música es mi vida 🎵' WHERE id_usuario = 14;
UPDATE perfil SET descripcion = 'Aventuras en cada esquina 🚴‍♂️' WHERE id_usuario = 15;
UPDATE perfil SET descripcion = 'Explorando el mundo 🌍' WHERE id_usuario = 16;
UPDATE perfil SET descripcion = 'Amante de la tecnología 💻' WHERE id_usuario = 17;
UPDATE perfil SET descripcion = 'Cocinero en mis ratos libres 🍳' WHERE id_usuario = 18;
UPDATE perfil SET descripcion = 'Siempre en busca de conocimiento 🔍' WHERE id_usuario = 19;
UPDATE perfil SET descripcion = 'Pasión por los videojuegos 🎮' WHERE id_usuario = 20;
UPDATE perfil SET descripcion = 'Viajar es vivir ✈️' WHERE id_usuario = 21;
UPDATE perfil SET descripcion = 'Enamorado del arte 🎨' WHERE id_usuario = 22;
UPDATE perfil SET descripcion = 'Fotografía es mi hobby 📸' WHERE id_usuario = 23;
UPDATE perfil SET descripcion = 'Apasionado del deporte ⚽️' WHERE id_usuario = 24;
UPDATE perfil SET descripcion = 'Leyendo siempre 📖' WHERE id_usuario = 25;
UPDATE perfil SET descripcion = 'Amante de los animales 🐶' WHERE id_usuario = 26;
UPDATE perfil SET descripcion = 'El cine es mi pasión 🎬' WHERE id_usuario = 27;
UPDATE perfil SET descripcion = 'Viviendo al máximo 🚀' WHERE id_usuario = 28;


describe perfil;

select * from perfil;

delete from publicaciones where id_usuario = 11;

select * from perfil;

select * from usuario inner join publicaciones on usuario.id = publicaciones.id_usuario

select * from usuario;

use social;
