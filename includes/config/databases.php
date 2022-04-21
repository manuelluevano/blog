<?php

function conectarDB()
{
    $db = mysqli_connect('localhost', 'root', '', 'movilsource');

    if ($db) {
        echo 'Conectado';
    } else {
        echo "No se conecto";
    }
}

conectarDB();
