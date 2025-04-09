<?php
include("../conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $connect->prepare("DELETE FROM almacenista WHERE idalmacenista = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../registrar_almacenista.php?var=Almacenista eliminado correctamente.");
    } else {
        header("Location: ../registrar_almacenista.php?var=Error al eliminar el almacenista.");
    }

    $stmt->close();
} else {
    header("Location: ../registrar_almacenista.php");
}
?>
