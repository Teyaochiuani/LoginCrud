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
$password = $_POST["password"]; 
// Buscamos al usuario en la base de datos
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Verificamos la contraseña
    if (password_verify($password, $row["password"])) {
        echo "Login exitoso";
        // Iniciar sesión y redirigir al usuario a la página de inicio
        session_start();
        $_SESSION["username"] = $username;
        header("Location: ../../index.php");
        exit();
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
$conn->close();
?>