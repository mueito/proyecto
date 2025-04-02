<?php
include '../conexion.php';

$result = mysqli_query($connect, "SELECT * FROM instructores");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro funcionarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/boostranp.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- Sidebar -->
    <nav>
        <h2>Almacén SENA</h2>
        <ul>
            <li><a href="../index.html"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="1registrofuncionario.php"><i class="fas fa-laptop"></i> Registro de Funcionarios</a></li>
            <li><a href="../3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
            <li><a href="../4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
            <li><a href="../insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a></li>
            <li><a href="../reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content">
        <header>
            <h1><i class="fas fa-hand-holding"> </i> Registros funcionarios</h1>
        </header>

        <!-- Formulario para registrar funcionarios -->
        <section class="prestamo-form">
            <h2>Registrar Funcionarios</h2>
            <form action="insertar.php" method="post">
                <label for="usuario">Instructor:</label>
                <input type="text" id="Nombre" name="nombre" required placeholder="Nombre">
                <input type="text" id="apellido" name="apellido" required placeholder="Apellido">
                <input type="text" id="cedula" name="cedula" required placeholder="Cédula">
                <input type="text" id="telefono" name="telefono" required placeholder="Teléfono">
                <input type="email" id="correo" name="correo" required placeholder="Correo">

                <label for="estado">Estado:</label>
                <select name="estado" required>
                    <option>activo</option>
                    <option>inactivo</option>
                </select>

                <button type="submit">Registrar</button>
            </form>
        </section>

        <?php if (isset($_GET['var'])) { ?>
            <div class="alert alert-success text-center" role="alert">
                <?= htmlspecialchars($_GET['var']); ?>
            </div>
        <?php } ?>

        <div class="table-responsive report-list">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id_instructores']); ?> </td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?> </td>
                            <td><?php echo htmlspecialchars($row['apellido']); ?> </td>
                            <td><?php echo htmlspecialchars($row['cedula']); ?> </td>
                            <td><?php echo htmlspecialchars($row['correo']); ?> </td>
                            <td><?php echo htmlspecialchars($row['telefono']); ?> </td>
                            <td><?php echo htmlspecialchars($row['estado']); ?> </td>
                            <td class="text-center">
                                <a href="editar2.php?id=<?php echo $row['id_instructores']; ?>"
                                    class="btn btn-success btn-sm">Editar</a>
                                <a href="eliminar.php?id=<?php echo $row['id_instructores']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>
