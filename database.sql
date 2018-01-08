
/*
create TABLE usuario(
  UsuarioID INT AUTO_INCREMENT PRIMARY KEY,
  Contraseña VARCHAR(15),
  fecha DATETIME,
  RolID INT,
  PersonaID INT,
  FOREIGN KEY (RolID) REFERENCES rol (RolID),
  FOREIGN KEY (PersonaID) REFERENCES persona (PersonaID)
);*/

CREATE TABLE rol(
  RolID INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(15) NOT NULL
);

CREATE TABLE persona(
  PersonaID INT AUTO_INCREMENT PRIMARY KEY ,
  DocumentoIdentidad char(8) not null,
	Nombres varchar(50) not null,
	Apellidos varchar(50) not null
);

create table genero(
	GeneroID int auto_increment primary key,
	Nombre varchar(10) not null
);

create table estado_civil(
	EstadoCivilID int auto_increment primary key,
	Nombre varchar(10) not null
);

create table operadora(
	OperadoraID int auto_increment primary key,
	RazonSocial varchar(100) not null,
	NombreComercial varchar(100) not null,
	RUC char(11) not null,
	created_at timestamp null,
	updated_at timestamp null
);


create table celular(
	Numero int not null primary key,
	OperadoraID int not null,
	foreign key (OperadoraID) references operadora (OperadoraID)
);

create table departamento(
	DepartamentoID int auto_increment primary key,
	Nombre varchar(50) not null
);

create table provincia(
	ProvinciaID int auto_increment primary key,
	Nombre varchar(50) not null,
	DepartamentoID int not null,
	foreign key (DepartamentoID) references departamento (DepartamentoID)
);

create table distrito(
	DistritoID int auto_increment primary key,
	Nombre varchar(50) not null,
	ProvinciaID int not null,
	DepartamentoID int not null,
	foreign key (ProvinciaID, DepartamentoID) references provincia (ProvinciaID, DepartamentoID)
);

create table direccion(
	DireccionID int auto_increment primary key,
	Nombre varchar(50) not null,
	DistritoID int not null,
	ProvinciaID int not null,
	DepartamentoID int not null,
	foreign key (DistritoID, ProvinciaID, DepartamentoID) references distrito (DistritoID, ProvinciaID, DepartamentoID)
);

create table detalle_persona
(
	DetallePersonaID int auto_increment primary key,
	PersonaID int not null,
	FechaNacimiento date not null,
	CorreoElectronico varchar(100) not null,
	EstadoCivilID int not null,
	GeneroID int not null,
	NumeroCelular int not null,
	DireccionID int not null,
	DistritoID int not null,
	ProvinciaID int not null,
	DepartamentoID int not null,
	created_at timestamp null,
	updated_at timestamp null,
	foreign key (PersonaID) references persona (PersonaID),
	foreign key (EstadoCivilID) references estado_civil (EstadoCivilID),
	foreign key (GeneroID) references genero (GeneroID),
	foreign key (NumeroCelular) references celular (Numero),
	foreign key (DireccionID, DistritoID, ProvinciaID, DepartamentoID) references direccion (DireccionID, DistritoID, ProvinciaID, DepartamentoID)
);

create table venta_estado(
	VentaEstadoID int auto_increment primary key,
	Nombre varchar(10) not null
);

create table articulo_estado(
	ArticuloEstadoID int auto_increment primary key,
	Nombre varchar(10) not null
);

create table categoria(
	CategoriaID int auto_increment primary key,
	Imagen varchar(100) not null,
	Nombre varchar(20) not null,
	Descripcion varchar(100) not null,
	created_at timestamp null,
	updated_at timestamp null
);

create table marca(
	MarcaID int auto_increment primary key,
	Nombre varchar(10) not null
);

create table modelo(
	ModeloID int auto_increment primary key,
	Nombre varchar(10) not null
);


create table articulo(
	ArticuloID int auto_increment primary key,
	Nombre varchar(20) not null,
  CategoriaID int NOT NULL ,
  ArticuloEstadoID int NOT NULL ,
  Imagen varchar(100) not null,
  Descripcion varchar(100) not null,
  Stock int not null,
  Precio DECIMAL(8, 2) NOT NULL ,
  ModeloID int ,
  MarcaID int ,
	created_at timestamp null,
	updated_at timestamp null,
  foreign key (CategoriaID) references categoria (CategoriaID),
  foreign key (ArticuloEstadoID) references articulo_estado (ArticuloEstadoID),
  foreign key (MarcaID) references marca (MarcaID),
  foreign key (ModeloID) references modelo (ModeloID)
);


create table venta(
	VentaID int auto_increment primary key,
	DetallePersonaID int not null,
	UsuarioID int not null,
	Total decimal(8,2) not null,
	VentaEstadoID int not null,
	FechaCreacion timestamp null,
	FechaActualizacion timestamp null,
	FechaFacturacion date null
);

create table linea_venta(
	LineaventaID int auto_increment primary key,
	Cantidad smallint(6) not null,
	ArticuloID int not null,
	Descripcion varchar(100) not null,
	Total decimal(8,2) not null,
	VentaID int not null,
  foreign key (ArticuloID) references articulo (ArticuloID),
  foreign key (VentaID) references venta (VentaID)
);

ALTER TABLE users ADD RolID int ; 
ALTER TABLE users ADD PersonaID int ; 
ALTER TABLE users ADD FOREIGN KEY (RolID) REFERENCES rol (RolID);
ALTER TABLE users ADD FOREIGN KEY (PersonaID) REFERENCES persona (PersonaID);
