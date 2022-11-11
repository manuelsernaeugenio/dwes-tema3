<?php

function getFiles(string $type): array
{

    $todosFicheros = scandir('./ficheros');
    $ficheros = [];

    if ($type !== null) {
        if ($todosFicheros !== false) {
            foreach ($todosFicheros as $fic) {
                if (pathinfo($fic, PATHINFO_EXTENSION) == $type) {
                    $ficheros[] = "./ficheros/$fic";
                }
            }
        }
    }

    return $ficheros;
}
