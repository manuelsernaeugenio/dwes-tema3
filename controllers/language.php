<?php

$idioma = 'es';

if ($_GET && isset($_GET['idioma'])) {
    $idioma = in_array($_GET['idioma'], ['es', 'en']) ? $_GET['idioma'] : 'es';
}

$cadenas = [
    'home.welcome' => [
        'es' => 'Bienvenido',
        'en' => 'Welcome'
    ],
    'home.description' => [
        'es' => 'Empiece a subir ficheros y guardelos en la nube.',
        'en' => 'Upload any file and store it in the cloud.'
    ],
    'home.main.button' => [
        'es' => 'Empiece a subir',
        'en' => 'Start now uploading your files'
    ],
    'navbar.home' => [
        'es' => 'Inicio',
        'en' => 'Home'
    ],
    'navbar.upload' => [
        'es' => 'Subir',
        'en' => 'Upload'
    ],
    'navbar.files' => [
        'es' => 'Ficheros',
        'en' => 'Files'
    ],
    'upload.title' => [
        'es' => 'Sube ficheros PDF o imágenes GIF, PNG y JPEG',
        'en' => 'Upload PDF files or GIF, PNG and JPEG images'
    ],
    'upload.input.filename' => [
        'es' => 'Nombre del archivo',
        'en' => 'File name'
    ],
    'upload.input.uploadbtn' => [
        'es' => 'Subir archivo',
        'en' => 'Upload file'
    ],
    'upload.selectFileTxt' => [
        'es' => 'Seleccione un archivo',
        'en' => 'Select a File'
    ],
    'files.yourfiles' => [
        'es' => 'Tus ficheros',
        'en' => 'Your files'
    ],
    'files.yourimages' => [
        'es' => 'Tus imágenes',
        'en' => 'Your images'
    ],
    'files.table.name' => [
        'es' => 'Nombre',
        'en' => 'Name'
    ],
    'files.table.seeordownload' => [
        'es' => 'Ver o descargar',
        'en' => 'See or download'
    ],
    'files.table.removebtn' => [
        'es' => 'Eliminar',
        'en' => 'Delete'
    ],
    'files.table.action' => [
        'es' => 'Acciones',
        'en' => 'Actions'
    ],
    'files.grid.size' => [
        'es' => 'Peso',
        'en' => 'Size'
    ],
    'files.grid.uploadtime' => [
        'es' => 'Fecha de subida',
        'en' => 'Upload time'
    ],
    'files.images.noImages' => [
        'es' => 'No hay imágenes.',
        'en' => 'There are no images.'
    ],
    'files.table.noFiles' => [
        'es' => 'No hay ficheros.',
        'en' => 'There are no files.'
    ]
];

function getCadena(string $id): string
{
    global $idioma, $cadenas;

    if (isset($cadenas[$id])) {
        return $cadenas[$id][$idioma];
    } else {
        return "Error interno: la cadena identificada con $id no existe";
    }
}
