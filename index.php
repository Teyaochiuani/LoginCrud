<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="card.css">
    <title>Home</title>
</head>
<style>
.form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 350px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    position: relative;
}

.message {
    color: rgba(88, 87, 87, 0.822);
    font-size: 14px;
}

.flex {
    display: flex;
    width: 100%;
    gap: 6px;
}

.form label {
    position: relative;
}

.form label .input {
    width: 100%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 5px;
}

.form label .input+span {
    position: absolute;
    left: 10px;
    top: 15px;
    color: grey;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
}

.form label .input:placeholder-shown+span {
    top: 15px;
    font-size: 0.9em;
}

.form label .input:focus+span,
.form label .input:valid+span {
    top: 30px;
    font-size: 0.7em;
    font-weight: 600;
}

.form label .input:valid+span {
    color: green;
}

.input01 {
    width: 100%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 5px;
}

.form label .input01+span {
    position: absolute;
    left: 10px;
    top: 50px;
    color: grey;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
}

.form label .input01:placeholder-shown+span {
    top: 40px;
    font-size: 0.9em;
}

.form label .input01:focus+span,
.form label .input01:valid+span {
    top: 50px;
    font-size: 0.7em;
    font-weight: 600;
}

.form label .input01:valid+span {
    color: green;
}

.fancy {
    background-color: transparent;
    border: 2px solid #cacaca;
    border-radius: 0px;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-weight: 390;
    letter-spacing: 2px;
    margin: 0;
    outline: none;
    overflow: visible;
    padding: 8px 30px;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    transition: all 0.3s ease-in-out;
    user-select: none;
    font-size: 13px;
}

.fancy::before {
    content: " ";
    width: 1.7rem;
    height: 2px;
    background: #cacaca;
    top: 50%;
    left: 1.5em;
    position: absolute;
    transform: translateY(-50%);
    transform: translateX(230%);
    transform-origin: center;
    transition: background 0.3s linear, width 0.3s linear;
}

.fancy .text {
    font-size: 1.125em;
    line-height: 1.33333em;
    padding-left: 2em;
    display: block;
    text-align: left;
    transition: all 0.3s ease-in-out;
    text-transform: lowercase;
    text-decoration: none;
    color: #818181;
    transform: translateX(30%);
}

.fancy .top-key {
    height: 2px;
    width: 1.5625rem;
    top: -2px;
    left: 0.625rem;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, left 0.3s ease-out;
}

.fancy .bottom-key-1 {
    height: 2px;
    width: 1.5625rem;
    right: 1.875rem;
    bottom: -2px;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, right 0.3s ease-out;
}

.fancy .bottom-key-2 {
    height: 2px;
    width: 0.625rem;
    right: 0.625rem;
    bottom: -2px;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, right 0.3s ease-out;
}

.fancy:hover {
    color: white;
    background: #cacaca;
}

.fancy:hover::before {
    width: 1.5rem;
    background: white;
}

.fancy:hover .text {
    color: white;
    padding-left: 1.5em;
}

.fancy:hover .top-key {
    left: -2px;
    width: 0px;
}

.fancy:hover .bottom-key-1,
.fancy:hover .bottom-key-2 {
    right: 0;
    width: 0;
}
</style>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                </span>
                <div class="text logo-text">
                    <span class="name"></span>
                    <span class="profession">JasiLover</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Buscar...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="./index.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./edit/index.php">
                            <i class='bx bx-phone icon'></i>
                            <span class="text nav-text">Editar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./pag/html/More.html">
                            <i class='bx bxs-right-arrow icon'></i>
                            <span class="text nav-text">Mas...</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <?php if(isset($_SESSION["username"])): ?>
                <li>
                    <a href="./loginRegister/index.html">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Cerrar sesión</span>
                    </a>
                </li>
                <?php else: ?>
                <li>
                    <a href="./loginRegister/index.html">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Iniciar sesión</span>
                    </a>
                </li>
                <li>
                    <a href="./LoginRegister/index.html">
                        <i class='bx bx-user-plus icon'></i>
                        <span class="text nav-text">Registrarse</span>
                    </a>
                </li>
                <?php endif; ?>
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Modo oscuro</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    <section class="home">
        <div class="titulo">
            <h1> <br> Bienvenido <?php echo $_SESSION["username"]; ?> </h1>
        </div>
        <div class="tabla">
            <div class="contenedorCards">
                <div class="card">
                    <form class="form" action="./php/src/insertar_dispositivo.php" method="POST">
                        <label>
                            <input required="" placeholder="" type="text" name="nombreDispositivo" class="input">
                            <span>Nombre Dispositivo</span>
                        </label>
                        <label>
                            <input required="" placeholder="" type="text" name="imagen" class="input">
                            <span>Link Imagen</span>
                        </label>
                        <label>
                            <input required="" type="tel" placeholder="" name="precio" class="input">
                            <span>Precio</span>
                        </label>
                        <label>
                            <textarea required="" rows="3" placeholder="" name="resena" class="input01"></textarea>
                            <span>Reseña</span>
                        </label>
                        <button class="fancy" type="submit">
                            <span class="top-key"></span>
                            <span class="text">Enviar</span>
                            <span class="bottom-key-1"></span>
                            <span class="bottom-key-2"></span>
                        </button>
                    </form>
                </div>
                <?php
                include './php/src/conexion.php';

                    // Consultar todos los datos de la tabla Dispositivos
                    $sql = "SELECT id, nombreDispositivo, resena, imagen, precio FROM Dispositivos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Imprimir los datos en el formato deseado
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="card">
                                <div class="wrapper">
                                    <div class="imgProd" style="background-image: url(' . $row["imagen"] . ');"></div>
                                    <div class="infoProd">
                                        <p class="nombreProd">' . $row["nombreDispositivo"] . '</p>
                                        <p class="extraInfo">' . $row["resena"] . '</p>
                                        <div class="actions">
                                        <div class="preciosGrupo" style="text-align: center;">
                                        <p class="precio">$' . $row["precio"] . '</p>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo "No hay dispositivos disponibles.";
                    }

                    // Cerrar la conexión
                    $conn->close();
                    ?>
    </section>
    <!-- Se agregan todos los Scripts de animacion o funciones de la pagina -->
    <script src="script.js"></script>
</body>

</html>