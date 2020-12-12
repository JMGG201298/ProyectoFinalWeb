create database presidencia;
use presidencia;

create table apoyo
(
    id_apoyo int primary key auto_increment,
    nombre varchar(50) not null,
    estatus enum('1','0'),
    presupuesto decimal(10,2),
    cantidad decimal(10,2),
    descripcion text
);

create table beneficiario
(
    id_persona int auto_increment primary key not null,
    nombre varchar(50) not null,
    apellido_paterno varchar(50) not null,
    apellido_materno varchar(50) not null,
    curp varchar(20) not null,
    ine blob,
    telefono_fijo char(10),
    telefono_celular char(10),
    direccion varchar(80),
    municipio varchar (50),
    id_apoyo int,
    estatus varchar(30),
    foreign key (id_apoyo) references presidencia.apoyo (id_apoyo)

);

create table usuario
(
    id_usuario  int primary key,
    nombre varchar(50) not null,
    apellido1 varchar(50) not null,
    apellido2 varchar(50),
    cargo varchar(80) not null,
    contraseña varchar(100)
);

-- INSERTS
insert into usuario (id_usuario, nombre, apellido1, apellido2, cargo, contraseña) values
(1, 'edgar', 'benavides', 'rodriguez', 'Administrador', sha1('12345'));
insert into apoyo (nombre,estatus,presupuesto,cantidad, descripcion) VALUES ('Becas','1', 12345678, 532123, 'Becas par alumnos');

