<?php
include 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST["descripcion"];
    $estado = $_POST["estado"];

    $sql = "INSERT INTO tareas (descri, esta) VALUES ('$descripcion', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Tarea agregada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
