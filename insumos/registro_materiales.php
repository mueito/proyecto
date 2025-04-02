<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $stock = $_POST['stock'];
   

    $sql = "INSERT INTO materiales (nombre, tipo, stock) VALUES (?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$nombre, $tipo, $stock]);

    header("Location: 2insumos.php");
}
?>