<?php
include './controllers/language.php';
include './libs/file.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ficheros - MiniMyCloud</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include './components/navbar.php' ?>
    <div class="container py-3">
        <div class="p-5 mb-2 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h2><?= getCadena('files.yourfiles') ?> <i class="fa fa-file"></i></h2>
                <?php
                $ficherosPdf = [];
                $imagenes = [];

                $txtDeleteBtn = getCadena('files.table.removebtn');
                $txtSeeImage = getCadena('files.table.seeordownload');

                // obtenemos los ficheros pdf para luego mostrarlos en la tabla.
                foreach (getFiles('pdf') as $fichero) {
                    if ($fichero != null) {
                        $ficherosPdf[] = $fichero;
                    }
                }

                if (count($ficherosPdf) != 0) {

                ?>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"><?= getCadena('files.table.name') ?></th>
                                <th scope="col"><?= getCadena('files.table.seeordownload') ?></th>
                                <th scope="col"><?= getCadena('files.table.action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // mostramos los ficheros pdf en la tabla
                            foreach (getFiles('pdf') as $fichero) {
                                if ($fichero != null) {
                                    $nombre = explode("/", $fichero); // obtenemos el índice 2 que es el nombre
                                    $ficherosPdf[] = $fichero;

                                    echo <<<END
                                <tr>
                                    <td>$nombre[2]</td>
                                    <td><a target="_blank" href="$fichero">$fichero</a></td>
                                    <td><a href="delete.php?name=$fichero" class="btn btn-danger">$txtDeleteBtn <i class="fa fa-trash"></i></a></td>
                                </tr>
                            END;
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "No hay ficheros<br>";
                } ?>
                <br>
                <h2><?= getCadena('files.yourimages') ?></h2>
                <div class="container">
                    <div class="row">
                        <?php
                        $ficheros = [];

                        // Obtenemos los arrays que contienen cada fichero
                        $jpg = getFiles('jpg') !== null ? getFiles('jpg') : null;
                        $jpeg = getFiles('jpeg') !== null ? getFiles('jpeg') : null;
                        $png = getFiles('png') !== null ? getFiles('png') : null;
                        $gif = getFiles('gif') !== null ? getFiles('gif') : null;

                        // Hacemos un merge e unimos los ficheros en un solo array
                        $ficheros = array_merge($jpg, $jpeg, $png, $gif);
                        if (count($ficheros) == 0) {
                            echo "No hay imágenes.";
                        } else {
                            foreach ($ficheros as $fichero) {
                                $src = isset($fichero) ? $fichero : ""; // obtengo la ruta
                                $nombreFichero = explode("/", $src); // obtengo el nombre del fichero

                                $ultimaModif = date("d/m/Y H:i:s.", filemtime($src)); // obtengo la fecha de subida
                                $pesoFichero = round(filesize($fichero) / 1048576, 2); // obtengo el peso del fichero
                                $ficheros[] = $fichero;

                                $uploadtime  = getCadena('files.grid.uploadtime');
                                $size  = getCadena('files.grid.size');

                                // Mostramos cada imagen con sus datos correspondientes
                                if (isset($fichero) && count($ficheros) != 0) {
                                    echo <<<END
                                    <div class="card m-2" style="width: 19rem; margin: 0; padding: 0;">
                                        <img width="100%" height="300px" src="$src" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">$nombreFichero[2]</h5>
                                            <p class="card-text">
                                                <p><b>$uploadtime:</b> $ultimaModif\n</p>
                                                <p><b>$size:</b> $pesoFichero MBs</p>
                                            </p>
                                            <p>
                                                <a href="$src" target="_blank" class="btn btn-primary">$txtSeeImage <i class="fa fa-eye"></i></a>
                                                <a href="delete.php?name=$fichero" class="btn btn-danger">$txtDeleteBtn <i class="fa fa-trash"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                END;
                                }
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top">
            DWES Manuel Serna Eugenio © 2022
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>