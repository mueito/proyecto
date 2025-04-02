<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipo =$_POST¨['id_equipos'];
    $marca = $_POST['marca'];
    $serie = $_POST['serie'];
    $stock = $_POST['stock'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO equipos (id_equipos, marca, serie, stock, estado) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$id_equipos, $marca, $serie, $stock, $estado]);

    header("Location: 2insumos.php");
}
?>