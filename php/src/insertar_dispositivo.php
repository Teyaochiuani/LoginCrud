<?php
include 'conexion.php';

$imagen = $_POST['imagen'];
$nombreDispositivo = $_POST['nombreDispositivo'];
$resena = $_POST['resena'];
$precio = $_POST['precio'];

$sql = "INSERT INTO Dispositivos (nombreDispositivo, resena, imagen, precio) VALUES ('$nombreDispositivo', '$resena', '$imagen', $precio)";
if ($conn->query($sql) === TRUE) {
    echo "Registro insertado correctamente";
} else {
    echo "Error al insertar registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>