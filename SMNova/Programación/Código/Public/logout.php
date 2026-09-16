<?php
// ===== LOGOUT API =====
// Este archivo cierra la sesión del usuario

header('Content-Type: application/json');

require_once '../Config/sesion.php';

try {
    SesionUsuario::cerrarSesion();
    echo json_encode(['mensaje' => 'Sesión cerrada']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
