<?php

function conectarDB(): mysqli //renortanos mysqli
{
    $db = mysqli_connect('localhost', 'root', '', 'movilsource');

    if (!$db) {
        echo 'No se pudo conectar';
        exit;
    }
    // retornqr la instacia de la conexoin
    return $db;
}
