<?php
session_start();
include('conexion.php');

if (isset($_SESSION['usuario']) && isset($_SESSION['rol'])) {
    $usuario = $_SESSION['usuario'];
    $rol = $_SESSION['rol'];

    // Si es almacenista, registra la hora de salida
    if ($rol === 'almacenista') {
        $hora_salida = date('Y-m-d H:i:s');
        $stmt = $connect->prepare("UPDATE almacenista SET hora_salida = ? WHERE correo = ?");
        $stmt->bind_param("ss", $hora_salida, $usuario);
        $stmt->execute();
    }

    // Aquí puedes agregar otros roles en el futuro si quieres registrar otras salidas
}

// Cierra sesión para cualquier rol
session_unset();
session_destroy();
header("Location: index.php");
exit;
