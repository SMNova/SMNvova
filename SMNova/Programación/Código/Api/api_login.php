<?php
// ===== API ENDPOINT PARA LOGIN =====
// Este archivo verifica las credenciales y crea una sesión

header('Content-Type: application/json');

require_once '../Config/Database.php';
require_once '../Model/Usuario.php';
require_once '../Config/sesion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['mensaje' => 'Método no permitido']);
    exit;
}

try {
    $datos = json_decode(file_get_contents('php://input'), true);
    
    // Validamos que email y password estén presentes
    if (!isset($datos['email']) || !isset($datos['password'])) {
        http_response_code(400);
        echo json_encode(['mensaje' => 'Email y contraseña son requeridos']);
        exit;
    }
    
    $email = trim($datos['email']);
    $password = trim($datos['password']);
    
    // Buscamos al usuario por email
    $db = Database::getInstance();
    $stmt = $db->prepare("SELECT id_usuario, nombre, apellido, email, password_hash, rol_id FROM usuarios WHERE email = ? AND estado = 'Activo'");
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() === 0) {
        http_response_code(401); // Unauthorized
        echo json_encode(['mensaje' => 'Email o contraseña incorrectos']);
        exit;
    }
    
    $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verificamos la contraseña
    if (!password_verify($password, $usuarioData['password_hash'])) {
        http_response_code(401);
        echo json_encode(['mensaje' => 'Email o contraseña incorrectos']);
        exit;
    }
    
    // Creamos un objeto Usuario para la sesión
    $usuario = new Usuario(
        $usuarioData['id_usuario'],
        $usuarioData['rol_id'],
        $usuarioData['email'],
        $usuarioData['password_hash'],
        $usuarioData['nombre'],
        $usuarioData['apellido']
    );
    
    // Iniciamos la sesión
    SesionUsuario::iniciarSesion($usuario);
    
    http_response_code(200);
    echo json_encode([
        'mensaje' => 'Login exitoso',
        'usuario' => [
            'id' => $usuario->getUser_id(),
            'nombre' => $usuario->getNombre(),
            'apellido' => $usuario->getApellido(),
            'email' => $usuario->getEmail()
        ]
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['mensaje' => 'Error en el servidor: ' . $e->getMessage()]);
}
?>
