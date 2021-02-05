<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CACHE -->
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- OWN -->
    <!-- <link rel="stylesheet" href="css/index.css" /> -->
    <link rel="shortcut icon" href="../img/mugiwara.png" type="image/x-icon" />
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

    <!-- MENSAJE -->
        <p class="bg-warning p-2 font-weight-bold text-center">SERVICIO DE REGISTRO TEMPORALMENTE INACTIVO POR RAZONES DE SEGURIDAD</p>

    <!-- FORMULARIO -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6 px-5 py-4 bg-dark text-light rounded shadow">
                <h3 class="text-center mb-4">Registro</h3>
                <div class="form-group">
                    <label for="user">Nombre de usuario</label>
                    <input type="text" name="user" id="user" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password2">Repetir contraseña</label>
                    <input type="text" name="password2" id="password2" class="form-control">
                </div>
                <div class="form-group">
                    <input name="submit" id="submit" class="btn btn-info w-100" type="button" value="Enviar">
                </div>
            </div>
        </div>
    </div>
</body>