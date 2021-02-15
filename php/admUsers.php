<!DOCTYPE html>
<html lang="es">

<?php
session_start();
// $conn = new mysqli("localhost", "root", "", "series");
?>

<head>
    <title>Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="shortcut icon" href="../img/onepiece.png" type="image/x-icon" />
</head>

<body>
    <?php if ($_COOKIE["user"] == "salram") : ?>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php">JAnime</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./admUsers.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./series.php">Series</a>
                </li>
        </nav>

        <div class="container my-4">

            <!-- IMPRIMIR MENSAJE RESULTADO -->
            <?php
            if (isset($_SESSION["result"])) {
                echo $_SESSION["result"];
                unset($_SESSION["result"]);
            }
            ?>

            <!-- AÑADIR USUARIO A LA BASE DE DATOS -->
            <?php
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                if ($username != "" && $password != "") {
                    $sql = "INSERT INTO user VALUES('$username','$password', NULL)";

                    if ($conn->query($sql)) {
                        $conn->query(
                            "INSERT INTO users_watch_series
                        SELECT username, name, 0 
                        FROM serie, user
                        WHERE username = '$username'"
                        );

                        $_SESSION["result"] = '<p class="btn bg-success text-light w-100">USUARIO REGISTRADO CON ÉXITO</p>';
                    } else {
                        $_SESSION["result"] = "<p class='btn bg-danger text-light w-100'>USUARIO YA EXISTENTE</p>";
                    }

                    $conn->close();
                }
                header("Location: admUsers.php");
            }
            ?>

            <!-- ACTUALIZAR USUARIO DE LA BASE DE DATOS -->
            <?php
            if (isset($_POST["username_n"]) && isset($_POST["password_n"])) {
                $username_v = $_POST["username_v"];
                $username_n = $_POST["username_n"];
                $password_n = $_POST["password_n"];

                $sql = "UPDATE user SET username = '$username_n', password='$password_n' WHERE username='$username_v'";

                if ($conn->query($sql)) {
                    $conn->query(
                        "UPDATE users_watch_series SET username_User = '$username_n' WHERE username_User ='$username_v'"
                    );

                    $_SESSION["result"] = "<p class='btn bg-success text-light w-100'>USUARIO ACTUALIZADO CON ÉXITO</p>";
                } else {
                    $_SESSION["result"] = "<p class='btn bg-danger text-light w-100'>ERROR AL ACTUALIZAR EL USUARIO</p>";
                }
                $conn->close();
                header("Location: admUsers.php");
            }
            ?>

            <!-- ELIMINAR USUARIO DE LA BASE DE DATOS -->
            <?php
            if (isset($_POST["del"])) {
                $username = $_POST["del"];

                $sql = "DELETE FROM user WHERE username = '$username'";

                if ($conn->query($sql)) {
                    $conn->query("DELETE FROM users_watch_series WHERE username_User = '$username'");
                    $_SESSION["result"] = "<p class='btn bg-success text-light w-100'>USUARIO ELIMINADO CON ÉXITO</p>";
                } else {
                    $_SESSION["result"] = "<p class='btn bg-danger text-light w-100'>ERROR AL ELIMINAR EL USUARIO</p>";
                }
                $conn->close();
                header("Location: admUsers.php");
            }
            ?>

            <!-- REPRESENTAR USUARIOS DE LA BASE DE DATOS -->
            <h2>Usuarios</h2>
            <ul class="list-group">

                <?php
                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                    <li class="list-group-item d-flex justify-content-between">
                    <div class="my-auto">' . $row["username"] . ' : ' . $row["password"] . '</div>
                    <div>
                        <form action="admUsers.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="update[]" value="' . $row["username"] . '">
                            <input type="hidden" name="update[]" value="' . $row["password"] . '">
                            <input class="btn btn-info" type="submit" value="Editar">
                        </form>
                        <form action="admUsers.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="del" value="' . $row["username"] . '">
                            <input class="btn btn-danger" type="submit" value="X">
                        </form>
                    </div>
                    </li>';
                    }
                }
                $conn->close();
                ?>
            </ul>
        </div>

        <div class="container my-4">
            <!-- AÑADIR NUEVO USUARIO -->
            <?php if (!isset($_POST["update"])) : ?>
                <h4>Añadir nuevo usuario</h4>
                <form action="admUsers.php" method="POST">
                    <div class="form-group">
                        <label for="username">Nombre del usuario</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Nombre..." autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Clave del usuario</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Clave..." autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-success">Añadir</button>
                </form>

                <!-- ACTUALIZAR usuario EXISTENTE -->
            <?php else : ?>
                <h4>Editar usuario</h4>
                <form action="admUsers.php" method="POST">
                    <div class="form-group">
                        <label for="username">Nombre del usuario</label>
                        <input type="hidden" class="form-control" name="username_v" id="username" value="<?php echo $_POST["update"][0] ?>" autocomplete="off">
                        <input type="text" class="form-control" name="username_n" id="username" value="<?php echo $_POST["update"][0] ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Clave del usuario</label>
                        <input type="text" class="form-control" name="password_n" id="password" value="<?php echo $_POST["update"][1] ?>" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </form>
            <?php endif; ?>
        </div>

    <?php else : ?>
        <?php header("Location: ../index.php"); ?>
    <?php endif; ?>
</body>

</html>