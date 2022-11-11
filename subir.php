<?php
include './controllers/language.php';
include './libs/fileUploader.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subir - MiniMyCloud</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include './components/navbar.php' ?>
    <div class="container py-4">

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h2><?= getCadena('upload.title') ?></h2>

                <?php
                if ($subido) {
                    echo "<div class='mb-3 pt-3'><span class='alert alert-success'><i class='fa fa-check'></i> Fichero subido correctamente " . $nombreFichero . "." . $extension . "</span></div>";
                    echo "<a href='subir.php?idioma=" . $idioma . "'>< Volver a subir un fichero.</a>";
                }
                if ($imprimirFormulario) {
                ?>

                    <form action="#" method="POST" name="formularioDeSubida" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="nombre_fichero"><?= getCadena('upload.input.filename') ?></span>
                                <input value="<?= isset($_POST['nombre_fichero']) ? $_POST['nombre_fichero'] : "" ?>" name="nombre_fichero" type="text" id="nombre_fichero" class="form-control">
                            </div>

                            <?php
                            if ($errores['nombre'] !== null) {
                                echo "<br><p><span class='alert alert-danger'><i class='fa-sharp fa-solid fa-circle-exclamation'></i><b> ¡ERROR!</b> " . $errores['nombre'] . "</span></p><br>";
                            }
                            ?>

                            <input name="fichero_usuario" class="form-control mb-3" type="file" id="files">
                            <div class="input-group mb-3 pt-3">
                                <?php
                                if ($errores['fichero'] !== null) {
                                    echo "<p><span class='alert alert-danger'><i class='fa-sharp fa-solid fa-circle-exclamation'></i><b> ¡ERROR!</b> " . $errores['fichero'] . "</span></p>";
                                }
                                ?>
                            </div>
                        </div>

                        <input type="submit" name="formularioDeSubida" value="<?= getCadena('upload.input.uploadbtn') ?>" class="btn btn-primary btn-lg"> <i class="bi bi-cloud-arrow-up-fill"></i>
                    </form>
                <?php } ?>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top">
            DWES Manuel Serna Eugenio © 2022
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>