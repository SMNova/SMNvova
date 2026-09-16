<?php
// ===== API ENDPOINT PARA REGISTRO =====
// Este archivo recibe los datos del formulario y los guarda en la BD

header('Content-Type: application/json');

require_once '../Config/Database.php';
require_once '../Model/Usuario.php';
require_once '../Controlador/UsuarioController.php';
require_once '../Config/sesion.php';

// Solo aceptamos peticiones POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['mensaje' => 'Método no permitido']);
    exit;
}

try {
    // Obtenemos los datos JSON del cliente
    $datos = json_decode(file_get_contents('php://input'), true);
    
    // Validamos que todos los campos requeridos estén presentes
    if (!isset($datos['nombre']) || !isset($datos['apellido']) || 
        !isset($datos['email']) || !isset($datos['password'])) {
        http_response_code(400);
        echo json_encode(['mensaje' => 'Faltan campos requeridos']);
        exit;
    }
    
    // Limpiamos los datos de espacios en blanco
    $nombre = trim($datos['nombre']);
    $apellido = trim($datos['apellido']);
    $email = trim($datos['email']);
    $password = trim($datos['password']);
    $id_rol = isset($datos['id_rol']) ? (int)$datos['id_rol'] : 3; // 3 = participante
    
    // Validaciones básicas
    if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
        http_response_code(400);
        echo json_encode(['mensaje' => 'Todos los campos son requeridos']);
        exit;
    }
    
    // Validamos el formato del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['mensaje' => 'El email no es válido']);
        exit;
    }
    
    // Validamos la contraseña (mínimo 6 caracteres)
    if (strlen($password) < 6) {
        http_response_code(400);
        echo json_encode(['mensaje' => 'La contraseña debe tener al menos 6 caracteres']);
        exit;
    }
    
    // Verificamos si el email ya existe
    $db = Database::getInstance();
    $stmt = $db->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        http_response_code(409); // Conflict
        echo json_encode(['mensaje' => 'El email ya está registrado']);
        exit;
    }
    
    // Creamos el usuario con los datos validados
    $controller = new UsuarioController();
    $controller->registrar($nombre, $apellido, $email, $password, $id_rol);
    
    // Si llegamos aquí, el registro fue exitoso
    http_response_code(201); // Created
    echo json_encode(['mensaje' => 'Usuario registrado exitosamente']);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['mensaje' => 'Error en el servidor: ' . $e->getMessage()]);
}
?>
