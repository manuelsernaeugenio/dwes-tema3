<?php
include './controllers/language.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio - MiniMyCloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include './components/navbar.php' ?>
    <div class="container py-4">

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?= getCadena('home.welcome');  ?></h1>
                <p class="col-md-8 fs-4"><?= getCadena('home.description');  ?></p>
                <a class="btn btn-primary btn-lg" href="subir.php?idioma=<?= $idioma ?>"><?= getCadena('home.main.button');  ?></a>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top">
            DWES Manuel Serna Eugenio © 2022
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>