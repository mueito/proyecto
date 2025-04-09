<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $cedula = trim($_POST["cedula"]);
    $correo = trim($_POST["correo"]);
    $telefono = !empty($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $hora_ingreso = date("Y-m-d H:i:s");
    $hora_salida = null;

    // Verificar si ya existe correo o cédula
    $stmt = $connect->prepare("SELECT COUNT(*) FROM almacenista WHERE correo = ? OR cedula = ?");
    $stmt->bind_param("ss", $correo, $cedula);
    $stmt->execute();
    $stmt->bind_result($existe);
    $stmt->fetch();
    $stmt->close();

    if ($existe > 0) {
        header('Location: ../registrar_almacenista.php?var=Error: correo o cédula ya están registrados');
        exit();
    }

    // Insertar en tabla almacenista
    $sql = "INSERT INTO almacenista (nombre, apellido, cedula, correo, telefono, hora_ingreso, hora_salida) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssssss", $nombre, $apellido, $cedula, $correo, $telefono, $hora_ingreso, $hora_salida);

    if ($stmt->execute()) {
        $stmt->close();

        // Ahora creamos automáticamente el usuario
        $rol = "almacenista";
        $clave_predeterminada = bin2hex(random_bytes(4)); // Ej: "9f3a1c2e"
        // Puedes cambiarla o hacerla aleatoria
        $hash = password_hash($clave_predeterminada, PASSWORD_DEFAULT);

        // Verificar si ya hay un usuario con ese correo
        $verificar_usuario = $connect->prepare("SELECT COUNT(*) FROM usuario WHERE usuario = ?");
        $verificar_usuario->bind_param("s", $correo);
        $verificar_usuario->execute();
        $verificar_usuario->bind_result($existe_usuario);
        $verificar_usuario->fetch();
        $verificar_usuario->close();

        if ($existe_usuario == 0) {
            $crear_usuario = $connect->prepare("INSERT INTO usuario (usuario, contraseña, rol) VALUES (?, ?, ?)");
            $crear_usuario->bind_param("sss", $correo, $hash, $rol);
            $crear_usuario->execute();
            $crear_usuario->close();
        }

        header('Location: ../registrar_almacenista.php?var=Registro insertado con éxito. Usuario creado automáticamente. Contraseña: ' . $clave_predeterminada);

        exit();
    } else {
        header('Location: ../registrar_almacenista.php?var=Error al insertar el registro');
        exit();
    }
}
?>
