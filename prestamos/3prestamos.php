<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Préstamos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/boostranp.css">
    <link rel="stylesheet" href="../css/styleprestamos.css">
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
            <li><a href="3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
            <li><a href="../devoluciones/4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
            <li><a href="../insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a></li>
            <li><a href="../reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>

        </ul>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content">
        <header>
            <h1><i class="fas fa-hand-holding"></i> Gestión de Préstamos </h1>
        </header>

        <!-- Formulario para registrar préstamos -->
        <section class="prestamo-form">
            <h2>Registrar Préstamo</h2>
            <form>
                <label for="usuario">Instructor:</label>
                <select id="Seleccione" required name="nombre">
                    <option>Instructor</option>


                </select>


                <label for="fecha_prestamo" required name="fecha_prestamo">Fecha de Préstamo:</label>
                <input type="date" id="fecha_prestamo">


                <label for="cantidad" required name="cantidad">Cantidad en Stock:</label>
                <input type="number" id="cantidad" placeholder="Ej: 50">

                <label for="Seleccione">Seleccione:</label>
                <select id="Seleccione" required name="estado">

                    <option>Material Consumibles</option>
                    <option>Material no consumibles</option>
                    <option>Equipos</option>
                </select>

                <label for="codigo_barras">Observación:</label>
                <input type="text" id="codigo_barras" placeholder="Comentario">

                <button type="submit">Registrar Préstamo</button>
            </form>
        </section>
    </main>

</body>

</html>