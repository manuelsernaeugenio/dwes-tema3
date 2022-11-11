<?php
require './controllers/language.php';

unlink($_GET['name']); // eliminamos el archivo que le pasemos

header('Location: ficheros.php?idioma=' . $idioma); // redirigimos al usuario de nuevo a la página de los ficheros.