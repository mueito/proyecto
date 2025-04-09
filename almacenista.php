<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'almacenista') {
    header("Location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestión de Consumibles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  
    <link rel="stylesheet" href="css/1.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head> <!-- jQuery y DataTables -->

<body>
    <header>
        <h1><i class="fas fa-warehouse"></i> SISTEMA ALMACÉN SGA</h1>
        <div>
        <span>Bienvenido Almacenista, 
        <p>Bienvenido, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php">Cerrar sesión</a></p>
        </div>
    </header>
    <nav>
        <a href="funcionarios/1registrofuncionario.php"><i class="fas fa-laptop"></i> Registro de Funcionarios</a>
        <a href="prestamos/3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a>
        <a href="devoluciones/4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a>
        <a href="insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </nav>
    <footer>
    <p><i class="fas fa-copyright"></i> SENA - Sistema de Gestión de Almacén</p>
</footer>
</body>

</html>