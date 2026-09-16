<?php
// ===== VERIFICACIÓN DE SESIÓN (API) =====
// Este archivo verifica si el usuario está autenticado y retorna sus datos

header('Content-Type: application/json');

require_once '../Config/sesion.php';

try {
    if (SesionUsuario::estaAutenticado()) {
        $usuario = SesionUsuario::obtenerUsuario();
        http_response_code(200);
        echo json_encode([
            'autenticado' => true,
            'usuario' => $usuario
        ]);
    } else {
        http_response_code(200);
        echo json_encode([
            'autenticado' => false,
            'usuario' => null
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
