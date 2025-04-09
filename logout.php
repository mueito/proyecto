<?php
session_start();
include('conexion.php');

// Solo registramos hora de salida si es un almacenista
if (isset($_SESSION['usuario']) && $_SESSION['rol'] === 'almacenista') {
    $usuario = $_SESSION['usuario'];
    $hora_salida = date('Y-m-d H:i:s');

    // Actualiza solo la fila del almacenista actual
    $stmt = $connect->prepare("UPDATE almacenista SET hora_salida = ? WHERE correo = ?");
    $stmt->bind_param("ss", $hora_salida, $usuario);
    $stmt->execute();
}

// Cerramos sesión para cualquier rol
session_unset();  // Borra variables
session_destroy();  // Cierra sesión
header("Location: index.php");
exit;
?>
