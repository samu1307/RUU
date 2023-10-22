<?php

    session_start();
    session_destroy();
    setCookie('_RECOD', "", time() - 3600, "/");
    setCookie('_USSES', "", time() - 3600, "/");
    unset($_COOKIE['_USSES'], $_COOKIE['_RECOD']);
    header('Location: ../index.php');

?>