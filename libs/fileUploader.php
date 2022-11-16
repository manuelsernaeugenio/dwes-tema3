<?php

$imprimirFormulario = true;
$subido = false;
$nombreFichero = null;

// variables de errores.
$errores = [
    'nombre' => null,
    'fichero' => null
];


/*
* Si hay post, revisa que los datos que le hemos pasado tanto nombre como fichero, estén correctos.
*/
if ($_POST) {
    if (isset($_POST['nombre_fichero']) && array_key_exists('nombre_fichero', $_POST)) {
        $nombreFichero = isset($_POST['nombre_fichero']) ? htmlspecialchars(trim($_POST['nombre_fichero'])) : null;
        if ($nombreFichero == null) {
            $errores['nombre'] = "El nombre no puede estar vacio.";
        }
    } else {
        $errores['nombre'] = "Necesitamos el nombre.";
    }

    if (
        $_FILES && isset($_FILES['fichero_usuario']) &&
        $_FILES['fichero_usuario']['error'] === UPLOAD_ERR_OK &&
        $_FILES['fichero_usuario']['size'] > 0
    ) {
        $fichero = $_FILES['fichero_usuario']['tmp_name'];

        $permitido = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jpeg', 'application/pdf');

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_fichero = finfo_file($finfo, $fichero);
        $extension = pathinfo($_FILES['fichero_usuario']['name'], PATHINFO_EXTENSION);

        $rutaFicheroDestino = './ficheros/' . $nombreFichero . "." . $extension;

        // Comprobaciones básicas de subida para posteriormente subir o mostrar los errores.
        if (in_array($mime_fichero, $permitido) && !file_exists($rutaFicheroDestino) && $nombreFichero != null) {
            $seHaSubido = move_uploaded_file($fichero, $rutaFicheroDestino);

            if ($seHaSubido) {
                $subido = true;
                $imprimirFormulario = false;
            }
        } else {
            if (!in_array($mime_fichero, $permitido)) {
                $errores['fichero'] = "La extensión $extension no es válida";
            }

            if (file_exists($rutaFicheroDestino)) {
                $errores['fichero'] = "El fichero ya existe en el servidor.";
            }
        }
    } else {
        $errores['fichero'] = "Necesitamos un fichero.";
    }
}
