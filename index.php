<!DOCTYPE html>

<?php
if (isset($_POST["logout"])) {
    session_start();
    $_SESSION["logout"] = true;
    echo '<script>localStorage.clear()</script>';
}

$animes = ["One Piece", "Haikyuu", "Code Geass", "Hunter x Hunter"];
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
    <link rel="shortcut icon" href="./img/onepiece.png" type="image/x-icon" />
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
            <?php
            foreach ($animes as $anime) {
                $path = str_replace(" ", "", $anime);
                $img = strtolower($path);

                echo '
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <img class="mx-3" src="img/' . $img . '.png" />
                                ' . $anime . '
                            </h4>
                            <hr />
                            <div 
                            id="imgCard" 
                            style="background-image: url(img/' . $img . '-card.jpg)"
                            ></div>
                            <a 
                            class="btn btn-lg mt-3 btn-primary d-block" 
                            href="./animes/' . $path . '/index.html"
                            >Ver ahora</a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>
</body>

</html>