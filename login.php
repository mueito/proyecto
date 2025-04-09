<?php
session_start();
include('conexion.php');

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$sql = "SELECT * FROM usuario WHERE usuario = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();

    // Verificar la contraseña
    if (password_verify($contraseña, $fila['contraseña'])) {
        // Guardar datos en sesión
        $_SESSION['id'] = $fila['id'];
        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['rol'] = $fila['rol'];

        // Redirigir según el rol
        if ($fila['rol'] === 'administrador') {
            header("Location: admin.php");
            exit;
        } elseif ($fila['rol'] === 'almacenista') {
            // ✅ Registrar hora de ingreso
            $hora_ingreso = date('Y-m-d H:i:s');

            // Asumimos que la tabla "almacenista" tiene un campo "correo" que coincide con el "usuario"
            $stmt2 = $connect->prepare("UPDATE almacenista SET hora_ingreso = ? WHERE correo = ?");
            $stmt2->bind_param("ss", $hora_ingreso, $usuario);
            $stmt2->execute();

            header("Location: almacenista.php");
            exit;
        } else {
            echo "Rol no válido";
        }
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
?>
