<?php
include 'db.php';

if (isset($_POST['ingredientes']) && isset($_POST['receta_id'])) {
    $ingredientes = $_POST['ingredientes'];
    $receta_id = $_POST['receta_id'];

    $sql = "INSERT INTO ingredientes (nombre, unidad_medida, receta_id) VALUES (?, '', ?)";
    $stmt = $conn->prepare($sql);
    
    foreach ($ingredientes as $ingrediente) {
        $stmt->bind_param("si", $ingrediente, $receta_id);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();
}
?>