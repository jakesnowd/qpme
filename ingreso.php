<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_ingreso = $_POST['nombre_ingreso'];
    $contrasena_ingreso = $_POST['contrasena_ingreso'];

    // Conectar a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'cocina_nutricion');

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta SQL
    $sql = "SELECT * FROM usuarios WHERE nombre='$nombre_ingreso'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasena_ingreso, $row['contrasena'])) {
            $_SESSION['usuario'] = $row['nombre'];
            $_SESSION['usuario_id'] = $row['id'];
            header("Location: login.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró el usuario";
    }

    // Cerrar la conexión
    $conn->close();
}
?>

