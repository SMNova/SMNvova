-- bueno esto es para q si la bd no existe, se crea y si ya existe, no hace nada
--nada despues se selecciona para q se creen las tablas adentro 
CREATE DATABASE IF NOT EXISTS canopus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE canopus;


-- Rol
CREATE TABLE roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255)
) ENGINE=InnoDB;


-- Usuario
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    rol_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'Activo',
-- un usuario recien registrado puede usar el
-- sistema rapido? osea de manera inmediate,entonces si un admin lo da de baja, pasa a 'Inactivo'
-- sin borrar el registro para poder mantener los torneo 
    torneos_participados INT NOT NULL DEFAULT 0,
    victorias INT NOT NULL DEFAULT 0,
    mvps INT NOT NULL DEFAULT 0,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES roles(id_rol) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;


-- Participante (comparte PK con usuarios)

CREATE TABLE participantes (
    id_usuario INT PRIMARY KEY,
    alias VARCHAR(50) NOT NULL UNIQUE,
    fecha_nacimiento DATE NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 1FN: el cos multivaluado telefono* sgerenaba tabla
CREATE TABLE telefonos_participante (
    id_usuario INT NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    PRIMARY KEY (id_usuario, telefono),
    FOREIGN KEY (id_usuario) REFERENCES participantes(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


-- Equipo

CREATE TABLE equipos (
    id_equipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    logo_url VARCHAR(255),
    fecha_creacion DATE NOT NULL,
    torneos_participados INT NOT NULL DEFAULT 0,
    victorias INT NOT NULL DEFAULT 0
) ENGINE=InnoDB;

-- Integra: relación N a N entre participantes y equipos
CREATE TABLE integra (
    id_equipo INT NOT NULL,
    id_usuario INT NOT NULL,
    fecha_ingreso DATE NOT NULL,
    PRIMARY KEY (id_equipo, id_usuario),
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES participantes(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tipo de torneo

CREATE TABLE tipos_torneo (
    id_tipo_torneo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255)
) ENGINE=InnoDB;

-- Torneo

CREATE TABLE torneos (
    id_torneo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE,
    estado VARCHAR(30) NOT NULL,
    visibilidad VARCHAR(20) NOT NULL DEFAULT 'Publico',
    -- 'Publico' por default asi cualquier torneo que se crea es visible
    -- para el usuario publico 
    max_participantes INT,
    permite_empates BOOLEAN NOT NULL DEFAULT FALSE,
    id_tipo_torneo INT NOT NULL,
    id_organizador INT NOT NULL,
    FOREIGN KEY (id_tipo_torneo) REFERENCES tipos_torneo(id_tipo_torneo) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_organizador) REFERENCES usuarios(id_usuario) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Auditoria

CREATE TABLE auditoria (
    id_auditoria INT AUTO_INCREMENT PRIMARY KEY,
    accion VARCHAR(50) NOT NULL,
    tabla_afectada VARCHAR(100) NOT NULL,
    detalle VARCHAR(255),
    fecha_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;


-- Inscripcion
-- (id_usuario e id_equipo van sin valor los dos juntos pq  cal de los dos
-- se completa depende de si el torneo es individual o por equipos,corte la 
-- validacion es desde el codigo php cuando se inscriban s
CREATE TABLE inscripciones (
    id_inscripcion INT AUTO_INCREMENT PRIMARY KEY,
    fecha_inscripcion DATE NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'Activa',
    puntos INT NOT NULL DEFAULT 0,
    jugados INT NOT NULL DEFAULT 0,
    ganados INT NOT NULL DEFAULT 0,
    empatados INT NOT NULL DEFAULT 0,
    perdidos INT NOT NULL DEFAULT 0,
    id_torneo INT NOT NULL,
    id_usuario INT,
    id_equipo INT,
    FOREIGN KEY (id_torneo) REFERENCES torneos(id_torneo) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES participantes(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
-- Ronda
CREATE TABLE rondas (
    id_ronda INT AUTO_INCREMENT PRIMARY KEY,
    id_torneo INT NOT NULL,
    numero_ronda INT NOT NULL,
    fecha DATE,
    estado VARCHAR(30) NOT NULL,
    FOREIGN KEY (id_torneo) REFERENCES torneos(id_torneo) ON DELETE CASCADE ON UPDATE CASCADE,
    UNIQUE (id_torneo, numero_ronda)
) ENGINE=InnoDB;


-- Enfrentamiento
-- (id_ganador es lq referencia a inscripciones q el ganador haya 
-- jugado el enfrentamiento hay q validarlo desde le php tambien 
-- resultado, antes de hacer el upsate.

CREATE TABLE enfrentamientos (
    id_enfrentamiento INT AUTO_INCREMENT PRIMARY KEY,
    id_ronda INT NOT NULL,
    numero_enfrentamiento INT NOT NULL,
    fecha_hora DATETIME,
    estado VARCHAR(20) NOT NULL DEFAULT 'Pendiente',
    puntaje_a INT,
    puntaje_b INT,
    id_ganador INT,
    validado BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (id_ronda) REFERENCES rondas(id_ronda) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_ganador) REFERENCES inscripciones(id_inscripcion) ON DELETE SET NULL ON UPDATE CASCADE,
    UNIQUE (id_ronda, numero_enfrentamiento)
) ENGINE=InnoDB;

-- Compite (N:n  entre inscripciones y la ahi arriba)

CREATE TABLE compite (
    id_inscripcion INT NOT NULL,
    id_enfrentamiento INT NOT NULL,
    rol_competidor VARCHAR(1) NOT NULL,
    PRIMARY KEY (id_inscripcion, id_enfrentamiento),
    FOREIGN KEY (id_inscripcion) REFERENCES inscripciones(id_inscripcion) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_enfrentamiento) REFERENCES enfrentamientos(id_enfrentamiento) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
