<?php
// Conectamos a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "users";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificamos la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Preparamos la consulta SQL con los valores a insertar
$username = "JasiPrueba";
$email = "mh818573@gmail.com";
$password = "teyaIV";
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

// Ejecutamos la consulta SQL
if (mysqli_query($conn, $sql)) {
    echo "Usuario insertado correctamente";
} else {
    echo "Error al insertar usuario: " . mysqli_error($conn);
}

// Cerramos la conexión a la base de datos
mysqli_close($conn);
?>