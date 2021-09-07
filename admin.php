<?php

    include_once 'config/settings.php';
    require_once 'verificar.php';
    include_once 'partials/menu.php';
    include_once 'partials/cabecera.php';
    require_once 'core/routes_admin.php';
    require_once 'db/conexion.php';
    $db = new DBClass();
    $conexion  = $db->getconnection();
    //Cargar el controlador correspondiente y cargar la accion por GET
    if(isset($_GET['c'])){
        $controller = loadController($_GET['c']);
        if(isset($_GET['a'])){
            loadAction($controller, $_GET['a'], $conexion, $_SESSION['cod_empresa']);
        }else{
            loadAction($controller, ACTION_MAIN, $conexion, $_SESSION['cod_empresa']);
        }
    }else{
        $controller = loadController(CONTROLLER_MAIN_ADMIN);
        loadAction($controller, ACTION_MAIN, $conexion, $_SESSION['cod_empresa']);
    }