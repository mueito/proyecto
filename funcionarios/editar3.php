<?php 
include "../conexion.php";

// Validar si los datos vienen del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar que el ID sea numérico
    if (!isset($_POST['id']) || !ctype_digit($_POST['id'])) {
        die("<script>alert('Error: ID inválido.'); window.location='1registrofuncionario.php';</script>");
    }

    // Capturar y limpiar datos
    $id = trim($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $cedula = trim($_POST['cedula']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $estado = trim($_POST['estado']);

    // Actualizar datos con MySQLi
    $sql = "UPDATE instructores SET nombre = ?, apellido = ?, cedula = ?, correo = ?, telefono = ?, estado = ? WHERE id_instructores = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $nombre, $apellido, $cedula, $correo, $telefono, $estado, $id);

    // Ejecutar consulta y verificar resultado
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('$nombre $apellido ha sido actualizado'); window.location='1registrofuncionario.php';</script>";
    } else {
        echo "<script>alert('No se pudo actualizar'); window.location='editar2.php?id=$id';</script>";
    }

    // Cerrar la consulta
    mysqli_stmt_close($stmt);
}
?>
