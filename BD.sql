create database admisiones;

use admisiones;

create table Postulantes(
    id_postulante int primary key auto_increment,
    Nombre varchar(50),
    Apellido varchar(50),
    Fecha_de_nacimiento date,
    DNI double,
    Email varchar(50),
    Celular double,
    Pais varchar(50)
);
create table cv_Postulante(
    id_cv int primary key auto_increment,
    id_postulante int unique,
    foreign key (id_postulante) references Postulantes(id_postulante),
    Nombre_archivo varchar (50)
);