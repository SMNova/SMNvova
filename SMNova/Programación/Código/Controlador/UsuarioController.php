<?php
require_once 'Model/Usuario.php';
require_once 'Repository/UsuarioRepository.php';

class UsuarioController {
    private UsuarioRepository $repository;

    public function __construct() {
        $this->repository = new UsuarioRepository();
    }

    // Acción: Listar usuarios
    public function listar(): void {
        $usuarios = $this->repository->obtenerTodos();
        require 'vistas/usuarios_listado.php';
    }

    // Acción: Registrar usuario
    public function registrar(string $nombre, string $apellido, string $email, string $password, int $id_rol): void {
        if (!empty($nombre) && !empty($apellido) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password) && $id_rol > 0) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $nuevoUsuario = new Usuario(null, $id_rol, $email, $password_hash, $nombre, $apellido);
            $this->repository->guardar($nuevoUsuario);
            header('Location: index.php?action=listar');
        } else {
            echo "Datos inválidos.";
        }
    }

    // Acción: Obtener usuario por ID
    public function obtenerPorId(int $id): ?Usuario {
        return $this->repository->obtenerPorId($id);
    }

    // Acción: Actualizar usuario
    public function actualizar(int $user_id, string $nombre, string $apellido, string $email, int $id_rol): void {
        if (!empty($nombre) && !empty($apellido) && filter_var($email, FILTER_VALIDATE_EMAIL) && $id_rol > 0) {
            $usuario = $this->repository->obtenerPorId($user_id);
            if ($usuario) {
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setId_rol($id_rol);
                $this->repository->actualizar($usuario);
                header('Location: index.php?action=listar');
            } else {
                echo "Usuario no encontrado.";
            }
        } else {
            echo "Datos inválidos.";
        }
    }

    // Acción: Eliminar usuario
    public function eliminar(int $user_id): void {
        $this->repository->eliminar($user_id);
        header('Location: index.php?action=listar');
    }
}