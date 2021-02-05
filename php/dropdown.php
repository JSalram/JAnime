<?php
session_start();

if (isset($_SESSION["logout"])) {
    session_destroy();
    unset($_COOKIE);
    setcookie("user", "", time() - 3600);
}

if (!isset($_COOKIE["user"])) {
    echo '
        <a class="btn btn-dark border-secondary dropdown-toggle px-5" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Iniciar sesión
        </a>
        <div class="dropdown-menu dropdown-menu-right bg-secondary shadow" aria-labelledby="dropdownMenuLink">
            <form class="my-1 mx-3 text-white" method="post" action="./php/login.php" autocomplete="off">
                <div class="form-group">
                    <label for="user">Usuario:</label>
                    <input id="user" class="form-control" type="text" name="user" autofocus />
                </div>
                <div class="form-group">
                    <label for="password">Contraseña: </label>
                    <input id="password" class="form-control" type="password" name="password" />
                </div>
                <button class="btn btn-dark w-100" type="submit">Enviar</button>
                <a href="./php/registro.php" class="btn btn-link text-light w-100 mt-2">Registrarse</a>
            </form>
        </div>
    ';
} else {
    $user = $_COOKIE["user"];

    $conn = new mysqli("localhost", "root", "", "series");

    $sql = "SELECT name_Serie, watched FROM users_watch_series WHERE username_User='$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="watched" style="display: none">w' . $row["name_Serie"] . ':' . $row["watched"] . '</div>';
        }
    }
    $conn->close();
    echo '
        <a class="btn btn-light border-secondary dropdown-toggle font-weight-bold user" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ' . ucfirst($user) . '
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="dropdownMenuLink">
            <form action="./index.php" method="POST">
                <input type="hidden" name="logout">
                <button class="dropdown-item text-danger" type="submit" >Cerrar sesión</button>
            </form>
        </div>
    ';
}
