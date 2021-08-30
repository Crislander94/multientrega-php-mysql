<?php
    //Ruta Total de la app
    $ruta = $_SERVER['HTTP_HOST'];
    $ruta_final = 'https://'.$ruta.'/multi-entrega-php-mysql-master/';
    define('RUTA', $ruta_final);

    //Definiendo Rutas por default de los controladores
    define("CONTROLLER_MAIN", 'producto');
    define("ACTION_MAIN", 'index');
?>