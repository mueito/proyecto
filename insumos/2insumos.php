<?php include("../conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestión de Consumibles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/boostranp.css">
<link rel="stylesheet" href="../css/styleinsumos.css">
  
</head>

<body>

    <!-- Sidebar -->
    <nav>

        <h2>Almacén SENAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h2>
        <ul>
            <li><a href="../index.html"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="../funcionarios/1registrofuncionario.php"><i class="fas fa-laptop"></i> Registro de Funcionarios</a></li>
            <li><a href="../3prestamos.php"><i class="fas fa-hand-holding"></i> Préstamos</a></li>
            <li><a href="../4devolucion.php"><i class="fas fa-laptop"></i> Devolución</a></li>
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
                <form action="registro_equipos.php" method="POST">


                    <label>Marca:</label>
                    <input type="text" name="marca" required>

                    <label>Serie:</label>
                    <input type="text" name="serie" required>modificacion en base

                    <label>Stock:</label>
                    <input type="number" name="stock" required>

                    <label>Estado:</label>
                    <select name="estado">
                        <option value="disponible">Disponible</option>

                        <option value="deteriorado">Deteriorado</option>
                    </select>

                    <button type="submit">Registrar Equipo</button>
                </form>
            </div>

            <!-- Formulario Materiales -->
            <div id="form_materiales" style="display:none;">
                <h3>Registro de Materiales</h3>
                <form action="registro_materiales.php" method="POST">
                    <label>serial:</label>
                    <input type="text" name="serial" required> modificacion en base

                    <label>Nombre:</label>
                    <input type="text" name="nombre" required>

                    <label>Tipo:</label>
                    <select name="tipo">
                        <option value="consumible">Consumible</option>
                        <option value="no consumible">No Consumible</option>
                    </select>

                    <label>Stock:</label>
                    <input type="number" name="stock" required>


                    <button type="submit">Registrar Material</button>
                </form>
            </div>
        </section>

        <!-- Lista Equipos -->
        <section class="insumos-list">
            <h2>Lista de Equipos</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Serie</th>
                        <th>Stock</th>
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
                            <td>{$fila['stock']}</td>
                            <td>{$fila['estado']}</td>
                          </tr>";
                    }
                    ?>
                </tbody>
            </table>
       

        <!-- Lista Materiales -->
        <section class="insumos-list">
            <h2>Lista de Materiales</h2>
            <table>
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


    <script>
        function mostrarFormulario() {
            const tipo = document.getElementById('tipo_registro').value;
            document.getElementById('form_equipos').style.display = tipo === 'equipos' ? 'block' : 'none';
            document.getElementById('form_materiales').style.display = tipo === 'materiales' ? 'block' : 'none';
        }
    </script>
    </main>
</body>

</html>