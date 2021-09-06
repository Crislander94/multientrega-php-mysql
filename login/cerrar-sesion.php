<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['cod_usuario']);
    unset($_SESSION['cod_empresa']);
    unset($_SESSION['tipo_usuario']);
    session_destroy();
    header('Location: index.php');
