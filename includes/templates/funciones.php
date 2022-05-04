<?php
function usuaioAutenticado(): bool
{
    // VER LA SESSION
    session_start();


    $auth = $_SESSION['login'];

    if ($auth) {
        return true;
    }

    return false;
}
