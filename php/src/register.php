<?php
// Conectamos a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "users";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Procesamos los datos del formulario
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Verificamos que las contraseñas sean iguales
if ($password !== $confirm_password) {
    echo '<script>alert("Las contraseñas no coinciden");</script>';
    exit();
}

// Validamos la contraseña
if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/", $password)) {
    echo '<script>alert("La contraseña debe contener al menos un número, una letra mayúscula, un carácter especial y tener una longitud mínima de 8 caracteres");</script>';
    exit();
}

// Validamos el correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("El correo electrónico no es válido");</script>';
    exit();
}

// Encriptamos la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insertamos los datos en la base de datos utilizando una sentencia preparada
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashed_password);
if ($stmt->execute()) {
    echo '<script>alert("Usuario registrado correctamente");</script>';
} else {
    echo '<script>alert("Error al registrar el usuario: ' . $stmt->error . '");</script>';
}

$stmt->close();
$conn->close();
?>
