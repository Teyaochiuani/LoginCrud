<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smartphones Editar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Bienvenido <?php session_start();
                echo $_SESSION['username']; ?></h1>
            <div class="input-group">
                <input type="search" placeholder="Buscar Dispositivo...">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
            </div>
            <script>
            document.getElementById('export-file').addEventListener('change', function() {
                // Verificar si el checkbox está marcado
                if (this.checked) {
                    // Redirigir a la página deseada (en este caso, '../index.php')
                    window.location.href = '../index.php';
                }
            });
            </script>

        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nombre Dispositivo </th>
                        <th> Reseña </th>
                        <th> Imagen </th>
                        <th> Precio </th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../php/src/conexion.php';
                        
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }
                        
                        if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
                            $idEliminar = $_GET['eliminar'];
                            $sqlEliminar = "DELETE FROM Dispositivos WHERE id = $idEliminar";
                            $conn->query($sqlEliminar);
                        }

                        $sql = "SELECT * FROM Dispositivos";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nombreDispositivo'] . "</td>";
                                echo "<td>" . $row['resena'] . "</td>";
                                echo "<td>" . $row['imagen'] . "</td>";
                                echo "<td><strong>" . $row['precio'] . "</strong></td>";
                                echo '<td><a href="?eliminar=' . $row['id'] . '" class="status cancelled">Eliminar</a></td>';
                                echo '<td><a href="#" onclick="mostrarFormulario(' . $row['id'] . ')" class="status delivered">Editar</a></td>';
                                echo "</tr>";
                            }
                        } else {
                        }

                        $conn->close(); 
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <script src="script.js"></script>
    <script>
    function mostrarFormulario(idDispositivo) {
        var modal = document.getElementById("myModal");
        fetch('obtenerDetalles.php?id=' + idDispositivo)
            .then(response => response.json())
            .then(data => {
                document.getElementById('idDispositivo').value = data.id;
                document.getElementById('nombreDispositivo').value = data.nombreDispositivo;
                document.getElementById('resena').value = data.resena;
                document.getElementById('imagen').value = data.imagen;
                document.getElementById('precio').value = data.precio;
            })
            .catch(error => console.error('Error:', error));

        modal.style.display = "block";
    }

    function guardarCambios() {
        var idDispositivo = document.getElementById('idDispositivo').value;
        var nombreDispositivo = document.getElementById('nombreDispositivo').value;
        var resena = document.getElementById('resena').value;
        var imagen = document.getElementById('imagen').value;
        var precio = document.getElementById('precio').value;

        fetch('guardarCambios.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'idDispositivo=' + idDispositivo + '&nombreDispositivo=' + encodeURIComponent(
                        nombreDispositivo) +
                    '&resena=' + encodeURIComponent(resena) + '&imagen=' + encodeURIComponent(imagen) + '&precio=' +
                    precio,
            })
            .then(response => response.json())
            .then(data => {
                console.log('Guardado exitosamente:', data);
            })
            .catch(error => console.error('Error al guardar:', error));
    }
    </script>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <form class="form">
                <p class="title">Editar Dispositivo</p>
                <label>
                    <input id="idDispositivo" class="input" type="text" placeholder="" required="">
                    <span>ID</span>
                </label>
                <label>
                    <input id="nombreDispositivo" class="input" type="text" placeholder="" required="">
                    <span>Nombre Dispositivo</span>
                </label>
                <label>
                    <input id="imagen" class="input" type="text" placeholder="" required="">
                    <span>Reseña</span>
                </label>
                <label>
                    <input id="imagen" class="input" type="text" placeholder="" required="">
                    <span>Imagen</span>
                </label>
                <label>
                    <input id="precio" class="input" type="text" placeholder="" required="">
                    <span>Precio</span>
                </label>
                <button class="submit">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <style>
    .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 350px;
        padding: 20px;
        border-radius: 20px;
        position: relative;
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 0.4rem 0.8rem #0005;
        color: #fff;
        border: 1px solid #333;
        height: 90vh;
        margin: 10px;
    }

    .title {
        font-size: 28px;
        font-weight: 600;
        letter-spacing: -1px;
        position: relative;
        display: flex;
        align-items: center;
        color: #000;
    }

    .message,
    .signin {
        font-size: 14.5px;
        color: rgba(255, 255, 255, 0.7);
    }

    .signin {
        text-align: center;
    }

    .signin a:hover {
        text-decoration: underline royalblue;
    }

    .signin a {
        color: #00bfff;
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
        background-color: #333;
        color: #fff;
        width: 100%;
        padding: 20px 05px 05px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 10px;
    }

    .form label .input+span {
        color: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 10px;
        top: 0px;
        font-size: 0.9em;
        cursor: text;
        transition: 0.3s ease;
    }

    .form label .input:placeholder-shown+span {
        top: 12.5px;
        font-size: 0.9em;
    }

    .form label .input:focus+span,
    .form label .input:valid+span {
        color: #d5d1defe;
        top: 0px;
        font-size: 0.7em;
        font-weight: 600;
    }

    .input {
        font-size: medium;
    }

    .submit {
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 10px;
        color: #000000;
        font-size: 16px;
        transform: .3s ease;
        background-color: #d5d1defe;
    }

    .submit:hover {
        background-color: #393d42;
    }
    </style>
</body>

</html