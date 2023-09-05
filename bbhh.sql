
use clinic_project;

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    dni INT(20) NOT NULL UNIQUE,
    lastName VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    birthday DATE NOT NULL,
    affiliateName INT(10) DEFAULT NULL,
    affiliateNumber VARCHAR(50) DEFAULT NULL,
    phone INT(20) NOT NULL,
    email VARCHAR(60) NOT NULL UNIQUE,
    state VARCHAR(50) NOT NULL,
    municipality VARCHAR(50) NOT NULL,
    locality VARCHAR(50) NOT NULL,
    zip INT(10) DEFAULT NULL,
    address VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

INSERT INTO users (dni, lastName, name, birthday, affiliateName, affiliateNumber, phone, email, state, municipality, locality, zip, address, password)
VALUES
(12345678, 'Smith', 'John', '1990-05-15', 123, 'A45678', 5551234567, 'john@example.com', 'California', 'Los Angeles', 'Downtown', 90001, '123 Main St', '123456');



CREATE TABLE usuario 
(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    dni int(20) NOT NULL UNIQUE,
    apellido varchar(50) NOT NULL,        
    nombre varchar(50) NOT NULL,  
    fecha_nacimiento date NOT NULL,
    nombre_obra_social int(10) DEFAULT NULL,
    nro_afiliado_obra_social varchar(50) DEFAULT NULL,
    telefono INT(20) NOT NULL,
    email varchar(60) NOT NULL UNIQUE,
    provincia varchar(50) NOT NULL,
    municipio varchar(50) NOT NULL,
    localidad varchar(50) NOT NULL,
    codigo_postal int(10) DEFAULT NULL,
    direccion varchar(100) NOT NULL,
    password varchar(100) NOT NULL    
);


CREATE TABLE especialidad 
(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    nombre varchar(25) NOT NULL,
    ruta_img varchar(100) DEFAULT NULL,
    descripcion varchar(255) NOT NULL
);



CREATE TABLE profesional
(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    rol varchar(15) DEFAULT NULL,
    apellido varchar(25) NOT NULL,        
    nombre varchar(25) NOT NULL,  
    ruta_img varchar(100) DEFAULT NULL,
    descripcion varchar(255) NOT NULL, 
    especialidad_id INT NOT NULL,
    FOREIGN KEY (especialidad_id) REFERENCES especialidad(id)
);



CREATE TABLE turno 
(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    fecha date NOT NULL,
    hora time NOT NULL,
    consultorio int(2) DEFAULT NULL,
    especialidad_id int(11) DEFAULT NULL,
    profesional_id int(11) DEFAULT NULL,
    usuario_id int(11) DEFAULT NULL,
    FOREIGN KEY (especialidad_id) REFERENCES especialidad(id),
    FOREIGN KEY (profesional_id) REFERENCES profesional(id),      
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

