<?php 
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Almacén SGA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/1.css">
</head>
<body>
<header>
    <h1><i class="fas fa-warehouse"></i> SISTEMA ALMACÉN SGA</h1>
    <div>
        <span>Bienvenido Administrador,</span>
        <p>Bienvenido, <script src="logout.js"></script>
<button onclick="cerrarSesion()">Cerrar sesión</button>
</p>
    </div> 
</header>

<nav>
    <a href="funcionarios/1registrofuncionario.php"><i class="fas fa-laptop"></i> Registro de Funcionarios</a>
    <a href="prestamos/3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a>
    <a href="devoluciones/4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a>
    <a href="insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a>
    <a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a>
</nav>

<div class="container">
    <section class="welcome-section">
        <h2>Bienvenido al Sistema Almacén CTGI</h2>
        <p>Seleccione una opción en el menú para gestionar el sistema.</p>
        <a href="registrar_almacenista.php" class="btn btn-primary">Crear usuario almacenista</a>
    </section>

    <section class="news-notifications">
        <h2><i class="fas fa-bell"></i> Noticias y Notificaciones</h2>
        <ul>
            <li><a href="admin"><i class="fas fa-home"></i> Volver al panel</a></li>
            <li><a href="funcionarios/1registrofuncionario.php"><i class="fas fa-laptop"></i> Registro de Funcionarios</a></li>
            <li><a href="prestamos/3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
            <li><a href="devoluciones/4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
            <li><a href="insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a></li>
            <li><a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>
        </ul>
    </section>
</div>

<footer>
    <p><i class="fas fa-copyright"></i> SENA - Sistema de Gestión de Almacén</p>
</footer>
</body>
</html>
