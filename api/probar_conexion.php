<?php
require_once "conexion.php";

try {
    $sql = "SELECT id, nombre, email, creado_en FROM usuarios";
    $resultado = $conexion->query($sql);

    $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Comprobación de usuarios</h2>";

    if (count($usuarios) > 0) {
        foreach ($usuarios as $usuario) {
            echo "ID: " . htmlspecialchars((string)$usuario["id"]) . "<br>";
            echo "Nombre: " . htmlspecialchars($usuario["nombre"]) . "<br>";
            echo "Email: " . htmlspecialchars($usuario["email"]) . "<br>";
            echo "Creado en: " . htmlspecialchars($usuario["creado_en"]) . "<br>";
            echo "<hr>";
        }
    } else {
        echo "No hay usuarios registrados.";
    }

} catch (PDOException $e) {
    echo "Error al consultar los usuarios.";
}
?>