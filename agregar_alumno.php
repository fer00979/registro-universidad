<?php
include 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];

    $sql = "INSERT INTO alumnos (nombre) VALUES ('$nombre')";

    if ($conn->query($sql) === TRUE) {
        echo "Alumno agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
