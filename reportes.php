<?php
session_start();
if ($_SESSION['rol'] !== 'administrador') {
    echo "Acceso denegado.";
    exit;
}

include("conexion.php");

$sql = "SELECT nombre, apellido, correo, hora_ingreso, hora_salida FROM almacenista ORDER BY hora_ingreso DESC";
$result = mysqli_query($connect, $sql);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes y Exportación</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/stylereportes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">



</head>
<body>

    <!-- Sidebar -->
    <nav>
        <h2>Almacén SENA</h2>
        <ul>
        </li> <a href="admin.php"><i class="fas fa-home"></i> Inicio</a></li>
        <li> <a href="funcionarios/1registrofuncionario.php"><i class=" fas fa-laptop"></i> Registro de Funcionarios</a></li>
        <li><a href="3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
        <li><a href="4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
        <li><a href="insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a></li>
        <li><a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
     </ul>
    </nav>

    <!-- Contenido principal -->
    <h2 class="mb-4">Registro de Horas - Almacenistas</h2>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Hora de Ingreso</th>
            <th>Hora de Salida</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                <td><?php echo htmlspecialchars($row['apellido']); ?></td>
                <td><?php echo htmlspecialchars($row['correo']); ?></td>
                <td><?php echo htmlspecialchars($row['hora_ingreso']); ?></td>
                <td><?php echo htmlspecialchars($row['hora_salida']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>