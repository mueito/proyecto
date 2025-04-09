<?php
include("../conexion.php"); // Importamos la conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar valores del formulario y sanitizar
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $cedula = trim($_POST["cedula"]);
    $correo = trim($_POST["correo"]);
    $telefono = !empty($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $estado = trim($_POST["estado"]);

    // Verificar si el correo ya existe
    $checkSql = "SELECT COUNT(*) FROM instructores WHERE correo = ?";
    $checkStmt = mysqli_prepare($connect, $checkSql);
    mysqli_stmt_bind_param($checkStmt, "s", $correo);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_bind_result($checkStmt, $correoExiste);
    mysqli_stmt_fetch($checkStmt);
    mysqli_stmt_close($checkStmt);

    if ($correoExiste > 0) {
        header('Location: 1registrofuncionario.php?var=Error: El correo ya está registrado');
        exit();
    }


    $checkSql = "SELECT COUNT(*) FROM instructores WHERE cedula = ?";
    $checkStmt = mysqli_prepare($connect, $checkSql);
    mysqli_stmt_bind_param($checkStmt, "s", $cedula);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_bind_result($checkStmt, $cedulaExistente);
    mysqli_stmt_fetch($checkStmt);
    mysqli_stmt_close($checkStmt);

    if ($cedulaExistente > 0) {
        header('Location: 1registrofuncionario.php?var=Error: la cedula ya está registrada');
        exit();
    }
    // Consulta SQL con parámetros preparados
    $sql = "INSERT INTO instructores (nombre, apellido, cedula, correo, telefono, estado) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $nombre, $apellido, $cedula, $correo, $telefono, $estado);

    // Ejecutar la consulta y verificar resultado
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header('Location: 1registrofuncionario.php?var=Registro insertado con éxito');
        exit();
    } else {
        mysqli_stmt_close($stmt);
        header('Location: 1registrofuncionario.php?var=Error al insertar el registro');
        exit();
    }
}
