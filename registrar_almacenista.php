<?php
include("conexion.php");

// Obtener todos los almacenistas
$sql = "SELECT * FROM almacenista ORDER BY idalmacenista DESC";
$result = mysqli_query($connect, $sql);
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Almacenistas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css"><!-- Asegúrate que exista -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <!-- Sidebar -->
    <nav>
        <h2>Almacén SENA</h2>
        <ul>
            <li><a href="admin.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="funcionarios/1registrofuncionario.php"><i class="fas fa-laptop"></i> Registro de Funcionarios</a></li>
            <li><a href="prestamos/3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
            <li><a href="devoluciones/4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
            <li><a href="insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a></li>
            <li><a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
           
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content p-4">
        <header>
            <h1><i class="fas fa-hand-holding"> </i> Registro de Almacenistas</h1>
        </header>

        <!-- Formulario para registrar datos personales del almacenista -->
        <section class="prestamo-form">
            <h2>Registrar Datos del Almacenista</h2>
            <form action="almacenista/inseralmacenista.php" method="post" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required placeholder="Nombre">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" required placeholder="Apellido">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cédula:</label>
                    <input type="text" class="form-control" name="cedula" required placeholder="Cédula">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="correo" required placeholder="Correo">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" required placeholder="Teléfono">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </section>

        <!-- Mensaje -->
        <?php if (isset($_GET['var'])) { ?>
            <div class="alert alert-success text-center mt-3" role="alert">
                <?= htmlspecialchars($_GET['var']); ?>
            </div>
        <?php } ?>

        <!-- Tabla -->
        <div class="table-responsive report-list mt-4">
            <table id="miTabla1" class="display table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Ingreso</th>
                        <th>Salida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['idalmacenista']); ?></td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['apellido']); ?></td>
                            <td><?php echo htmlspecialchars($row['cedula']); ?></td>
                            <td><?php echo htmlspecialchars($row['correo']); ?></td>
                            <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                            <td><?php echo htmlspecialchars($row['hora_ingreso']); ?></td>
                            <td><?php echo htmlspecialchars($row['hora_salida']); ?></td>
                            <td class="text-center">
                                <a href="almacenista/editar_2alma.php?id=<?php echo urlencode($row['idalmacenista']); ?>"
                                    class="btn btn-success btn-sm">Editar</a>
                                <a href="almacenista/eliminar_alma.php?id=<?php echo urlencode($row['idalmacenista']); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('#miTabla1').DataTable({
                "paging": true, // Habilita paginación
                "searching": true, // Habilita búsqueda
                "ordering": true, // Habilita ordenamiento
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/Spanish.json",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ materiales",
                    "infoEmpty": "No hay registros disponibles",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron resultados",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });

            // Actualizar el total de equipos mostrados en la búsqueda
            $('#miTabla_filter input').on('keyup', function() {
                var total = tableEquipos.rows({
                    search: 'applied'
                }).count();
                $('#total-marcas').text("Total de equipos mostrados: " + total);
            });

        });
    </script>
</body>

</html>