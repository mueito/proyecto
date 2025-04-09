<?php include("../conexion.php"); ?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestión de Consumibles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/boostranp.css">
    <link rel="stylesheet" href="../css/styleinsumos.css">
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


            <li><a href="../funcionarios/1registrofuncionario.php"><i class="fas fa-laptop"></i> Registro de Funcionarios</a></li>
            <li><a href="../prestamos/3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
            <li><a href="../devoluciones/4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
            <li><a href="2insumos.php"><i class="fas fa-box-open"></i> Insumos</a></li>
            <li><a href="../reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>




        </ul>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content">
        <header>
            <h1><i class="fas fa-box-open"></i> Registro Equipos / Materiales</h1>
        </header>

        <section class="insumos-form">
            <h2>Registro</h2>

            <!-- Selector -->
            <label for="tipo_registro">Seleccione:</label>
            <select id="tipo_registro" onchange="mostrarFormulario()">
                <option value="">-- Seleccionar --</option>
                <option value="equipos">Equipos</option>
                <option value="materiales">Materiales</option>
            </select>

            <!-- Formulario Equipos -->
            <div id="form_equipos" style="display:none;">
                <h3>Registro de Equipos</h3>
                <form action="registro_equipos.php" method="POST" class="row g-3">

                    <div class="col-md-6">
                        <label for="marca" class="form-label">Marca:</label>
                        <input type="text" class="form-control" name="marca" required placenholder="marca">
                    </div>

                    <div class="col-md-6">
                        <label for="serie" class="form-label">Serie:</label>
                        <input type="text" class="form-control" name="serie" required placenholder="serie">
                    </div>


                    <div class="col-md-6">
                        <label>Estado:</label>
                        <select name="estado">
                            <option value="selecionar">-- Seleccionar --</option>
                            <option value="disponible">Disponible</option>

                            <option value="deteriorado">Deteriorado</option>
                        </select>
                    </div>

                    <button type="submit">Registrar Equipo</button>
                </form>
            </div>

            <!-- Formulario Materiales -->

            <div id="form_materiales" style="display:none;">
                <h3>Registro de Materiales</h3>
                <form action="registro_materiales.php" method="POST" class="row g-3">

                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" required placenholder="marca">
                    </div>

                    <div class="col-md-6">
                        <label for="serie" class="form-label">Serie:</label>
                        <input type="text" class="form-control" name="serie" required placenholder="nombre">
                    </div>




                    <div class="col-md-6">
                        <label>Tipo:</label>
                        <select name="tipo">


                            <option value="selecionar">-- Seleccionar --</option>
                            <option value="consumible">Consumible</option>
                            <option value="no consumible">No Consumible</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label>Stock:</label>
                        <input type="number" name="stock" required>


                    </div>


                    <button type="submit">Registrar Material</button>
                </form>
            </div>
        </section>

        <!-- Lista Equipos -->
        <section class="insumos-list">
            <h2>Lista de Equipos</h2>
            <table id="miTabla" class="display">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Serie</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $connect->query("SELECT * FROM equipos");
                    foreach ($sql as $fila) {
                        echo "<tr>
                            <td>{$fila['id_equipos']}</td>
                            <td>{$fila['marca']}</td>
                            <td>{$fila['serie']}</td>
                            <td>{$fila['estado']}</td>
                          </tr>";
                    }


                    ?>



                </tbody>

            </table>




            <!-- Lista Materiales -->
            <section class="insumos-list">
                <h2>Lista de Materiales</h2>
                <table id="mitabla2" class="display">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Stock</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $connect->query("SELECT * FROM materiales");
                        foreach ($sql as $fila) {
                            echo "<tr>
                            <td>{$fila['id_material']}</td>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['tipo']}</td>
                            <td>{$fila['stock']}</td>
                           
                          </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>

    </main>
    <script>
        function mostrarFormulario() {
            const tipo = document.getElementById('tipo_registro').value;
            document.getElementById('form_equipos').style.display = tipo === 'equipos' ? 'block' : 'none';
            document.getElementById('form_materiales').style.display = tipo === 'materiales' ? 'block' : 'none';
        }
    </script>

    <script>
        $(document).ready(function() {
            var tableEquipos = $('#miTabla').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/Spanish.json",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ equipos",
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

            var tableMateriales = $('#mitabla2').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
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