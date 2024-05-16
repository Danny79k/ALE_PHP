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
    descripcion varchar(200),
    foreign key (id_usuario) references usuario (id)
);

drop table publicaciones;
create table publicaciones(
    id_publicaciones int not null primary key AUTO_INCREMENT,
    fecha DATETIME default CURRENT_TIMESTAMP,
    contenido varchar(200),
    imagen varchar(200),
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

insert into publicaciones (contenido, imagen, id_usuario) values ("dsdsds","https://png.pngtree.com/background/20230524/original/pngtree-sad-pictures-for-desktop-hd-backgrounds-picture-image_2705986.jpg","6")

select * from publicaciones;

select * from usuario inner join publicaciones on usuario.id = publicaciones.id_usuario

INSERT INTO publicaciones (contenido, imagen, id_usuario) VALUES
('Primera publicación', 'https://png.pngtree.com/background/20230524/original/pngtree-sad-pictures-for-desktop-hd-backgrounds-picture-image_2705986.jpg', 6),
('Segunda publicación', 'https://png.pngtree.com/background/20230524/original/pngtree-sad-pictures-for-desktop-hd-backgrounds-picture-image_2705986.jpg', 9),
('Tercera publicación', 'https://png.pngtree.com/background/20230524/original/pngtree-sad-pictures-for-desktop-hd-backgrounds-picture-image_2705986.jpg', 9),
('Cuarta publicación', 'https://png.pngtree.com/background/20230524/original/pngtree-sad-pictures-for-desktop-hd-backgrounds-picture-image_2705986.jpg', 8),
('hola que tal', 'https://ethic.es/wp-content/uploads/2023/03/imagen.jpg', 9);

select * from publicaciones;

delete from publicaciones;

select id from usuario where id=8;