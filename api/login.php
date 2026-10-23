<?php
session_start();

header("Content-Type: application/json; charset=UTF-8");

require_once "conexion.php";

$datos = json_decode(file_get_contents("php://input"), true);

$email = trim($datos["email"] ?? "");
$password = $datos["password"] ?? "";

if ($email === "" || $password === "") {
    echo json_encode([
        "success" => false,
        "mensaje" => "Completá todos los campos."
    ]);
    exit;
}

try {
    $consulta = $conexion->prepare(
        "SELECT id, nombre, email, password_hash
         FROM usuarios
         WHERE email = :email
         LIMIT 1"
    );

    $consulta->execute(["email" => $email]);
    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if (!$usuario || !password_verify($password, $usuario["password_hash"])) {
        echo json_encode([
            "success" => false,
            "mensaje" => "El correo o la contraseña son incorrectos."
        ]);
        exit;
    }

    session_regenerate_id(true);

    $_SESSION["usuario_id"] = $usuario["id"];
    $_SESSION["usuario_nombre"] = $usuario["nombre"];
    $_SESSION["usuario_email"] = $usuario["email"];

    echo json_encode([
        "success" => true,
        "mensaje" => "¡Inicio de sesión exitoso!"
    ]);

} catch (PDOException $e) {
    http_response_code(500);

    echo json_encode([
        "success" => false,
        "mensaje" => "Ocurrió un error al iniciar sesión."
    ]);
}