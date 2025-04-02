<?php
include("../conexion.php");

// Validar si el ID es numérico y existe en la URL
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar la consulta segura con MySQLi
    $sql = "DELETE FROM instructores WHERE id_instructores = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Ejecutar y verificar la eliminación
    if (mysqli_stmt_execute($stmt)) {
        header("Location: 1registrofuncionario.php?var=Registro eliminado correctamente");
    } else {
        header("Location: 1registrofuncionario.php?var=Error al eliminar: " . mysqli_error($connect));
    }

    // Cerrar la consulta
    mysqli_stmt_close($stmt);
} else {
    header("Location: 1registrofuncionario.php?var=Error: ID inválido");
}
exit();
?>
