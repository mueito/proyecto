<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de devolución</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/boostranp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styledevolucion.css">

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
            <li><a href="4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
            <li><a href="../insumos/2insumos.php"><i class="fas fa-box-open"></i> Insumos</a></li>
            <li><a href="../reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a></li>

        </ul>
    </nav>


    <main class="main-content">
        <header>
            <h1><i class="fas fa-laptop"></i> Gestión de Devolución</h1>
        </header>




        <section class="prestamo-form">
            <h2>Registrar Devolución</h2>
            <form>
                <label for="usuario">Seleccione:</label>
                <select required name="nombre">
                    <label for="Seleccione">Seleccione:</label>
                    <option>Instructor</option>


                </select>







                <label for="fecha_prestamo">Fecha de Devolución:</label>
                <input type="date" name="fecha_devolucion">

                <label for="cantidad">Cantidad en Stock:</label>
                <input type="number" name="cantidad" required placeholder="Ej: 50">

                <label for="Seleccione">estado:</label>
                <select id="estado" name="estado" required>
                    <option name="id_devolucion_equipos">Equipo</option>
                    <option name="id_devolucion_materiales">Material</option>
                </select>

                <label for="Estado">Seleccione:</label>
                <select id="Estado">
                    <option>Funcional</option>
                    <option>No funcional</option>

                </select>



                <label for="codigo_barras">Observación:</label>
                <input type="text" id="codigo_barras" name="Observacion" placeholder="Comentario">

                <button type="submit">Registrar </button>
            </form>
        </section>


        <section class="equipment-list">
            <h2>Lista de Equipos Devueltos</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Instructor</th>
                        <th>Estado</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Computadora Dell XPS</td>
                        <td>Marleny</td>
                        <td>bueno</td>
                        <td>
                            <button class="edit">✏️ Editar</button>
                            <button class="delete">🗑 Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Impresora HP LaserJet</td>
                        <td>987654321</td>
                        <td>En préstamo</td>
                        <td>
                            <button class="edit">✏️ Editar</button>
                            <button class="delete">🗑 Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>