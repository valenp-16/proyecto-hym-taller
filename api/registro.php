<?php
header("Content-Type: application/json; charset=UTF-8");

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode([
        "mensaje" => "Método no permitido"
    ]);
    exit;
}

$datos = json_decode(file_get_contents("php://input"), true);

if (!is_array($datos)) {
    $datos = $_POST;
}

$nombre = trim($datos["nombre"] ?? "");
$email = trim($datos["email"] ?? "");
$password = $datos["password"] ?? "";

if ($nombre === "" || $email === "" || $password === "") {
    http_response_code(400);
    echo json_encode([
        "mensaje" => "Todos los campos son obligatorios"
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        "mensaje" => "El correo electrónico no es válido"
    ]);
    exit;
}

if (strlen($password) < 8) {
    http_response_code(400);
    echo json_encode([
        "mensaje" => "La contraseña debe tener al menos 8 caracteres"
    ]);
    exit;
}

try {
    $sql = "INSERT INTO usuarios (nombre, email, password_hash)
            VALUES (:nombre, :email, :password_hash)";

    $consulta = $conexion->prepare($sql);

    $consulta->execute([
        ":nombre" => $nombre,
        ":email" => $email,
        ":password_hash" => password_hash($password, PASSWORD_DEFAULT)
    ]);

    http_response_code(201);
    echo json_encode([
        "mensaje" => "Usuario registrado correctamente"
    ]);

} catch (PDOException $e) {
    if ($e->getCode() === "23000") {
        http_response_code(409);
        echo json_encode([
            "mensaje" => "Ese correo electrónico ya está registrado"
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            "mensaje" => "No se pudo registrar el usuario"
        ]);
    }
}
?>