<?php

$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

?>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?idioma=<?= $idioma ?>"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/ICloud_logo.svg/2560px-ICloud_logo.svg.png" width="50" height="35" alt=""> MiniMyCloud</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $curPageName == "index.php"  ? "active" : ""; ?>" href="index.php?idioma=<?= $idioma ?>"><?= getCadena('navbar.home');  ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $curPageName == "subir.php"  ? "active" : ""; ?>" href="subir.php?idioma=<?= $idioma ?>"><?= getCadena('navbar.upload');  ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $curPageName == "ficheros.php"  ? "active" : ""; ?>" href="ficheros.php?idioma=<?= $idioma ?>"><?= getCadena('navbar.files');  ?></a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li>
                    <form class="d-flex" method="GET" action="#" role="search">
                        <select name="idioma" class="form-select" aria-label="Default select example">
                            <option value="es" <?php if ($idioma == 'es') {
                                                    echo 'selected';
                                                } ?>>Español</option>
                            <option value="en" <?php if ($idioma == 'en') {
                                                    echo 'selected';
                                                } ?>>English</option>
                        </select>
                        <input class="btn btn-primary" type="submit" value="Ok" />
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>