<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/boostranp.css">
    <title>ACTUALIZAR USUARIOS</title>
</head>
<body>
    <div class="ui container">
        <br>
       
        <?php
        include "../conexion.php";                    

        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("<p style='color:red;'>Error: ID inválido.</p>");
        }

        $id = $_GET['id'];

        // Consulta segura con MySQLi
        $sql = "SELECT * FROM instructores WHERE id_instructores = ?";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $instructor = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if (!$instructor) {
            echo "<p style='color:red;'>No se encontró el instructor.</p>";
        } else {
        ?>
  
    <div class="container">
        <h2 class="mt-4">Editar Instructor</h2>
        <form method="POST" action="editar3.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($instructor['id_instructores']); ?>" required>

            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($instructor['nombre']); ?>" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo htmlspecialchars($instructor['apellido']); ?>" required>

            <label>Cédula:</label>
            <input type="text" name="cedula" class="form-control" value="<?php echo htmlspecialchars($instructor['cedula']); ?>" required>
            
            <label>Correo:</label>
            <input type="email" name="correo" class="form-control" value="<?php echo htmlspecialchars($instructor['correo']); ?>" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo htmlspecialchars($instructor['telefono']); ?>" required>

            <label>Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="activo" <?php echo ($instructor['estado'] == 'activo') ? 'selected' : ''; ?>>Activo</option>
                <option value="inactivo" <?php echo ($instructor['estado'] == 'inactivo') ? 'selected' : ''; ?>>Inactivo</option>
            </select>

            <br>
            <button type="submit" class="btn btn-primary" name="btn_actualizar">Guardar Cambios</button>
            <a href="1registrofuncionario.php" class="btn btn-secondary">Cancelar</a>
        </form>
        <?php 
        }
        ?>
    </div>
</body>
</html>
