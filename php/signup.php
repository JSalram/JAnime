<!DOCTYPE html>

<?php
session_start();
?>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- OWN -->
    <link rel="shortcut icon" href="../img/onepiece.png" type="image/x-icon" />
    <title>JAnime</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <h1 class="text-light">JAnime</h1>
            </a>
        </div>
    </nav>

    <?php
    function getUserIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    //// IMPRIMIR MENSAJE RESULTADO ////
    if (isset($_SESSION["signup"])) {
        echo $_SESSION["signup"];
        unset($_SESSION["signup"]);
    }

    //// AÑADIR USUARIO A LA BASE DE DATOS ////
    if (isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
        $user = $_POST["user"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        if ($user != "" && $password != "" && $password2 != "") {
            if ($password === $password2) {
                $ip = getUserIp();

                // $conn = new mysqli("localhost", "root", "", "series");

                $sql = "SELECT * FROM user WHERE ip='$ip'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $_SESSION["signup"] = '<p class="text-center py-2 bg-danger text-light">Un usuario ya ha sido registrado desde su sistema
                    <br>Para cualquier consulta contacte con el administrador de la aplicación</p>';
                } else {
                    $sql = "INSERT INTO user VALUES('$user','$password', '$ip')";

                    if ($conn->query($sql)) {
                        $conn->query("INSERT INTO users_watch_series
                    SELECT username, name, 0 
                    FROM serie, user
                    WHERE username = '$user'
                ");

                        $_SESSION["signup"] = '<p class="text-center py-2 bg-success text-light">Usuario registrado con éxito</p>';
                    } else {
                        $_SESSION["signup"] = '<p class="text-center py-2 bg-danger text-light">Usuario y/o contraseña ya existentes</p>';
                    }
                }

                $conn->close();
            } else {
                $_SESSION["signup"] = '<p class="text-center py-2 bg-danger text-light">Las contraseñas no coinciden. Vuelva a intentarlo</p>';
            }
        } else {
            $_SESSION["signup"] = '<p class="text-center py-2 bg-danger text-light">Usuario y/o contraseña inválidos</p>';
        }

        header("Location: signup.php");
    }
    ?>

    <!-- FORMULARIO -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6 px-5 py-4 bg-dark text-light rounded shadow">
                <h3 class="text-center mb-4">Registro</h3>
                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <label for="user">Nombre de usuario</label>
                        <input type="text" name="user" id="user" class="form-control" autocomplete="off" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password2">Repetir contraseña</label>
                        <input type="password" name="password2" id="password2" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info w-100" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>