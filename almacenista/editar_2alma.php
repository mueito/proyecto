<?php
include("../conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener datos actuales
    $stmt = $connect->prepare("SELECT * FROM almacenista WHERE idalmacenista = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $almacenista = $resultado->fetch_assoc();
    $stmt->close();

    if (!$almacenista) {
        echo "Almacenista no encontrado.";
        exit;
    }
} else {
    header("Location: ../registrar_almacenista.php");
    exit;
}

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $stmt = $connect->prepare("UPDATE almacenista SET nombre=?, apellido=?, cedula=?, correo=?, telefono=? WHERE idalmacenista=?");
    $stmt->bind_param("sssssi", $nombre, $apellido, $cedula, $correo, $telefono, $id);

    if ($stmt->execute()) {
        header("Location: ../registrar_almacenista.php?var=Almacenista actualizado correctamente.");
    } else {
        echo "Error al actualizar.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Almacenista</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body class="container mt-5">
    <h2>Editar Almacenista</h2>
    <form method="POST">
        <input type="text" name="nombre" value="<?= htmlspecialchars($almacenista['nombre']) ?>" required class="form-control mb-2">
        <input type="text" name="apellido" value="<?= htmlspecialchars($almacenista['apellido']) ?>" required class="form-control mb-2">
        <input type="text" name="cedula" value="<?= htmlspecialchars($almacenista['cedula']) ?>" required class="form-control mb-2">
        <input type="email" name="correo" value="<?= htmlspecialchars($almacenista['correo']) ?>" required class="form-control mb-2">
        <input type="text" name="telefono" value="<?= htmlspecialchars($almacenista['telefono']) ?>" required class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="registrar_almacenista.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
