<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes y Exportación</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/stylereportes.css">



</head>
<body>

    <!-- Sidebar -->
    <nav>
        <h2>Almacén SENA</h2>
        <ul>
        </li> <a href="index.html"><i class="fas fa-home"></i> Inicio</a></li>
        <li> <a href="funcionarios/1registrofuncionario.php"><i class=" fas fa-laptop"></i> Registro de Funcionarios</a></li>
        <li><a href="3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
        <li><a href="4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
        <li><a href="insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a></li>
        <li><a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
     </ul>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content">
        <header>
            <h1><i class="fas fa-chart-bar"></i> Reporte de Busquedad</h1>
        </header>

        <!-- Filtros de reportes -->
        <section class="report-filters">
            <h2>Filtrar </h2>
            <form>
                <label for="tipo-reporte">Tipo de Reporte:</label>
                <select id="tipo-reporte">
                    <option value="equipos">Equipos</option>
                    <option value="insumos">Materiales Consumibles</option>
                    <option value="prestamos">Materiales No Consumibles</option>
                </select>

                <label for="fecha-inicio">Fecha Inicio:</label>
                <input type="date" id="fecha-inicio">

                <label for="fecha-fin">Fecha Fin:</label>
                <input type="date" id="fecha-fin">

                <button type="submit">Generar Reporte</button>
            </form>
        </section>

        <!-- Lista de reportes -->
        <section class="report-list">
            <h2>Resultados del Reporte</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Equipo</td>
                        <td>Laptop HP asignada a Juan Pérez</td>
                        <td>2025-02-10</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Insumo</td>
                        <td>20 unidades de mouse agregados al inventario</td>
                        <td>2025-02-12</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Préstamo</td>
                        <td>Impresora Epson prestada a área de contabilidad</td>
                        <td>2025-02-15</td>
                    </tr>
                </tbody>
            </table>

            <!-- Botones de exportación -->
            <div class="export-buttons">
                <button class="btn-pdf"><i class="fas fa-file-pdf"></i> Exportar a PDF</button>
                <button class="btn-excel"><i class="fas fa-file-excel"></i> Exportar a Excel</button>
            </div>
        </section>
    </main>

</body>
</html>