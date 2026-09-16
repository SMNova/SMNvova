-- Aseguramos que exista la base antes de otorgar permisos sobre sus tablas
CREATE DATABASE IF NOT EXISTS canopus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- IF NOT EXISTS para poder correr el script más de una vez sin que explote
CREATE USER IF NOT EXISTS 'app_user'@'localhost' IDENTIFIED BY 'Sgdm2026!Torneo';

-- roles y tipos_torneo son catálogos de configuración inicial: la
-- aplicación los consulta (SELECT) pero no los modifica en el uso
-- normal, siguiendo el mismo criterio que usa el profesor con la
-- tabla roles en su ejemplo.
GRANT SELECT ON canopus.roles TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.usuarios TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.participantes TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.telefonos_participante TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.equipos TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.integra TO 'app_user'@'localhost';
GRANT SELECT ON canopus.tipos_torneo TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.torneos TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.inscripciones TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.rondas TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.enfrentamientos TO 'app_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON canopus.compite TO 'app_user'@'localhost';

-- A la tabla auditoria le damos permisos distintos a propósito: solo
-- SELECT (para poder mostrar el historial) e INSERT (para poder ir
-- agregando registros nuevos). Le sacamos UPDATE y DELETE porque no
-- tendría sentido que la aplicación pudiera modificar o borrar el
-- historial de auditoría.
GRANT SELECT, INSERT ON canopus.auditoria TO 'app_user'@'localhost';

-- Restricción de recursos: le ponemos un tope a la cantidad de
-- conexiones y consultas por hora para que, si algo sale mal en el
-- código (por ejemplo un loop infinito haciendo consultas), no se
-- sature todo el servidor de MySQL.
ALTER USER 'app_user'@'localhost' WITH
    MAX_QUERIES_PER_HOUR 1000
    MAX_CONNECTIONS_PER_HOUR 100
    MAX_USER_CONNECTIONS 10;

FLUSH PRIVILEGES;