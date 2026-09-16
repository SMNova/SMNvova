<?php
    require_once '../Config/Database.php';
    require_once '../Model/Usuario.php';

    class UsuarioRepository {
        private PDO $db;

        public function __construct() {
            $this->db = Database::getInstance();
        }

        public function obtenerTodos(): array {
            $stmt = $this->db->query("SELECT id_usuario, rol_id, nombre, apellido, email, estado, torneos_participados, victorias, mvps, creado_en FROM usuarios");
            $filas = $stmt->fetchAll();
            $usuarios = [];
            foreach ($filas as $fila) {
                $usuarios[] = new Usuario(
                    $fila['id_usuario'],
                    $fila['rol_id'],
                    $fila['email'],
                    null,
                    $fila['nombre'],
                    $fila['apellido']
                );
            }
            return $usuarios;
        }

        public function obtenerPorId(int $id): ?Usuario {
            $stmt = $this->db->prepare("SELECT id_usuario, rol_id, nombre, apellido, email, password_hash, estado, torneos_participados, victorias, mvps, creado_en FROM usuarios WHERE id_usuario = ?");
            $stmt->execute([$id]);
            
            if ($stmt->rowCount() === 0) {
                return null;
            }
            
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            return new Usuario(
                $fila['id_usuario'],
                $fila['rol_id'],
                $fila['email'],
                $fila['password_hash'],
                $fila['nombre'],
                $fila['apellido']
            );
        }

        public function guardar(Usuario $usuario): bool {
            $stmt = $this->db->prepare("INSERT INTO usuarios (rol_id, nombre, apellido, email, password_hash, estado, torneos_participados, victorias, mvps) VALUES (:rol_id, :nombre, :apellido, :email, :password_hash, :estado, :torneos_participados, :victorias, :mvps)");
            return $stmt->execute([
                ':rol_id' => $usuario->getId_rol(),
                ':nombre' => $usuario->getNombre(),
                ':apellido' => $usuario->getApellido(),
                ':email' => $usuario->getEmail(),
                ':password_hash' => $usuario->getPassword_hash(),
                ':estado' => 'Activo',
                ':torneos_participados' => $usuario->getTorneos_participados(),
                ':victorias' => $usuario->getTorneos_ganados(),
                ':mvps' => $usuario->getMvp()
            ]);
        }

        public function actualizar(Usuario $usuario): bool {
            $stmt = $this->db->prepare("UPDATE usuarios SET rol_id = :rol_id, nombre = :nombre, apellido = :apellido, email = :email WHERE id_usuario = :id_usuario");
            return $stmt->execute([
                ':id_usuario' => $usuario->getUser_id(),
                ':rol_id' => $usuario->getId_rol(),
                ':nombre' => $usuario->getNombre(),
                ':apellido' => $usuario->getApellido(),
                ':email' => $usuario->getEmail()
            ]);
        }

        public function eliminar(int $id): bool {
            $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
            return $stmt->execute([$id]);
        }
    }
?>