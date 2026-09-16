<?php
// ===== GESTIÓN DE SESIONES =====
// Este archivo maneja la lógica de autenticación y sesiones

session_start();

// Clase para manejar las sesiones de usuario
class SesionUsuario {
    
    // Iniciamos sesión con los datos del usuario
    public static function iniciarSesion($usuario) {
        $_SESSION['usuario_id'] = $usuario->getUser_id();
        $_SESSION['usuario_nombre'] = $usuario->getNombre();
        $_SESSION['usuario_apellido'] = $usuario->getApellido();
        $_SESSION['usuario_email'] = $usuario->getEmail();
        $_SESSION['usuario_rol'] = $usuario->getId_rol();
        $_SESSION['inicio_sesion'] = time();
    }
    
    // Verificamos si el usuario tiene sesión activa
    public static function estaAutenticado(): bool {
        return isset($_SESSION['usuario_id']) && !empty($_SESSION['usuario_id']);
    }
    
    // Obtenemos los datos del usuario autenticado
    public static function obtenerUsuario(): ?array {
        if (self::estaAutenticado()) {
            return [
                'id' => $_SESSION['usuario_id'],
                'nombre' => $_SESSION['usuario_nombre'],
                'apellido' => $_SESSION['usuario_apellido'],
                'email' => $_SESSION['usuario_email'],
                'rol' => $_SESSION['usuario_rol']
            ];
        }
        return null;
    }
    
    // Cerramos la sesión del usuario
    public static function cerrarSesion(): void {
        session_destroy();
        header('Location: login.html');
        exit();
    }
    
    // Verificamos la sesión (por seguridad, agregamos un timeout)
    public static function verificarSesion(): bool {
        $timeout = 3600; // 1 hora de inactividad
        
        if (self::estaAutenticado()) {
            if (time() - $_SESSION['inicio_sesion'] > $timeout) {
                self::cerrarSesion();
                return false;
            }
            // Actualizamos el tiempo de la última actividad
            $_SESSION['inicio_sesion'] = time();
            return true;
        }
        return false;
    }
}
?>
