<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $rol = 'almacenista';
    $contraseña_segura = password_hash($contraseña, PASSWORD_DEFAULT);

    $stmt = $connect->prepare("INSERT INTO usuario (usuario, contraseña, rol) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $usuario, $contraseña_segura, $rol);

    if ($stmt->execute()) {
        header("Location: ../registrar_almacenista.php?var=Usuario almacenista registrado correctamente");
        exit();
    } else {
        header("Location: ../registrar_almacenista.php?var=Error al registrar el usuario");
        exit();
    }

    $stmt->close();
}
?>
