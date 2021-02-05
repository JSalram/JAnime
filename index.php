<!DOCTYPE html>

<?php
if (isset($_POST["logout"])) {
    session_start();
    $_SESSION["logout"] = true;
    echo '<script>localStorage.clear()</script>';
}
?>

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
    <link rel="stylesheet" href="css/index.css" />
    <link rel="shortcut icon" href="./img/mugiwara.png" type="image/x-icon" />
    <script src="./js/index.js" defer></script>
    <title>JAnime</title>
</head>

<body class="bg-dark">
    <!-- NAVBAR -->
    <nav class="navbar my-3">
        <div class="container">
            <a class="navbar-brand" href="./index.php">
                <h1 class="text-light">JAnime</h1>
            </a>

            <div class="dropdown">
            </div>
        </div>
    </nav>
    <hr class="bg-light" />

    <!-- SERIES -->
    <div class="container" id="series">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <img class="mx-3" src="img/mugiwara.png" />
                            One Piece
                        </h4>
                        <hr />
                        <img class="img-fluid mb-3" src="img/mugiwara-card.jpg" />
                        <a class="btn btn-lg btn-primary d-block" href="./animes/OnePiece/index.html">Ver ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <img class="mx-3" src="img/haikyuu.png" />
                            Haikyuu
                        </h4>
                        <hr />
                        <img class="img-fluid mb-3" src="img/haikyuu-card.png" />
                        <a class="btn btn-lg btn-primary d-block" href="./animes/Haikyuu/index.html">Ver ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <img class="mx-3" src="img/codegeass.png" />
                            Code Geass
                        </h4>
                        <hr />
                        <img class="img-fluid mb-3" src="img/codegeass-card.jpg" />
                        <a class="btn btn-lg btn-primary d-block" href="./animes/CodeGeass/index.html">Ver ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>