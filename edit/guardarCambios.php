<?php
include '../php/src/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí debes recuperar los datos del formulario enviado
    $idDispositivo = $_POST['idDispositivo'];
    $nombreDispositivo = $_POST['nombreDispositivo'];
    $resena = $_POST['resena'];
    $imagen = $_POST['imagen'];
    $precio = $_POST['precio'];

    // Aquí debes actualizar la base de datos con los nuevos valores
    $sql = "UPDATE Dispositivos SET nombreDispositivo='$nombreDispositivo', resena='$resena', imagen='$imagen', precio=$precio WHERE id=$idDispositivo";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => 'Cambios guardados exitosamente']);
    } else {
        echo json_encode(['error' => 'Error al guardar cambios']);
    }
} else {
    // Manejar el caso de solicitud incorrecta
    http_response_code(400);
    echo json_encode(['error' => 'Solicitud incorrecta']);
}

$conn->close();
?>