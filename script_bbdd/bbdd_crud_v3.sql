-- DROP DATABASE IF EXISTS crud_v3;

-- Creacion de la base de datos (crud_bbdd)        
CREATE DATABASE crud_v3;
USE crud_v3;

-- Creacion de la tabla usuarios (crud_bbdd) 
CREATE TABLE usu_usuarios (
  usu_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  usu_usuario varchar(45) NOT NULL,
  usu_clave varchar(255) NOT NULL,
  usu_nombre varchar(200) NOT NULL,
  usu_apellido varchar(200) NOT NULL,
  PRIMARY KEY (usu_id),
  UNIQUE KEY usu_usuario (usu_usuario)
) ENGINE=InnoDB;

-- Insertamos un usuario: nombre de usuario: ejemplo - Clave: 1234 (encriptada)
INSERT INTO usu_usuarios (usu_usuario, usu_clave, usu_nombre, usu_apellido)
VALUES ('ejemplo','$2y$10$MKEZOE1o/HEE2KAgDMBkq.j6kjw0tiu.FGMSKLdi9wU8MMDQIlpFO','Fulano','de Tal');

-- Creacion de la tabla alumno       
CREATE TABLE alu_alumnos (
  alu_id int(11) NOT NULL AUTO_INCREMENT,
  usu_id int(11) unsigned NOT NULL,
  alu_dni int(11) NOT NULL,
  alu_nombres varchar(20) NOT NULL,
  alu_apellidos varchar(30) NOT NULL,
  alu_nota int(2) NOT NULL,
  PRIMARY KEY (alu_id),
  FOREIGN KEY (usu_id) REFERENCES usu_usuarios (usu_id)
  
)ENGINE=InnoDB;

-- Insertamos un alumno

INSERT INTO alu_alumnos (usu_id, alu_dni, alu_nombres, alu_apellidos, alu_nota) VALUES
('1','30112308', 'Hernán', 'Gobulin', '10');