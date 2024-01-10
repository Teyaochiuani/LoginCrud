<?php
include '../php/src/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $idDispositivo = $_GET['id'];

    $sql = "SELECT * FROM Dispositivos WHERE id = $idDispositivo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Devolver los detalles del dispositivo en formato JSON
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        // Manejar el caso donde no se encuentran detalles del dispositivo
        http_response_code(404);
        echo json_encode(['error' => 'Dispositivo no encontrado']);
    }
} else {
    // Manejar el caso de solicitud incorrecta
    http_response_code(400);
    echo json_encode(['error' => 'Solicitud incorrecta']);
}

$conn->close();
?>