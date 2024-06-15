<?php
session_start();
include 'db.php';

if (isset($_POST['receta'])) {
    $receta = $_POST['receta'];
    $usuario_id = $_SESSION['usuario_id'];

    $sql = "INSERT INTO recetas (nombre, usuario_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $receta, $usuario_id);
    $stmt->execute();
    
    echo $stmt->insert_id;

    $stmt->close();
    $conn->close();
}
?>