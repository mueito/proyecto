<?php
include '../conexion.php';

$result = mysqli_query($connect, "SELECT * FROM instructores");
?>
<?php
session_start();
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery y DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <!-- Sidebar -->
    <nav>
        <h2>Almacén SENA</h2>
        <ul>
            <li>
                <a href="<?php echo ($_SESSION['rol'] === 'administrador') ? '../admin.php' : '../almacenista.php'; ?>">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </li>

            <li><a href="1registrofuncionario.php"><i class="fas fa-laptop"></i> Registro de Funcionarios</a></li>
            <li><a href="../prestamos/3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
            <li><a href="../devoluciones/4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
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
            <form action="insertar.php" method="post" class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required placeholder="Nombre">
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" required placeholder="Apellido">
                </div>
                <div class="col-md-6">
                    <label for="cedula" class="form-label">Cédula:</label>
                    <input type="text" class="form-control" name="cedula" required placeholder="Cédula">
                </div>
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" required placeholder="Teléfono">
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="correo" required placeholder="Correo">
                </div>
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-select" name="estado" required>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="bs-green">Registrar</button>
                </div>
            </form>

        </section>

        <?php if (isset($_GET['var'])) { ?>
            <div class="alert alert-success text-center" role="alert">
                <?= htmlspecialchars($_GET['var']); ?>
            </div>
        <?php } ?>

        <div class="table-responsive report-list">
            <table id="miTabla1" class="display">

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
                            <td class=" text-center">
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