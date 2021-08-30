<?php
    include_once 'config/settings.php';
    require_once 'verificar.php';
    require_once 'db/conexion.php';
    if(!isset($_SESSION["cod_empresa"])) header('Location: registrar-empresa.php');
    $db = new DBClass();
    $conexion  = $db->getconnection();
    require_once 'core/routes.php';
    //Cargar el controlador correspondiente y cargar la accion por GET
    if(isset($_GET['c'])){
        $controller = loadController($_GET['c']);
        if(isset($_GET['a'])){
            loadAction($controller, $_GET['a'], $conexion, $_SESSION['cod_empresa']);
        }else{
            loadAction($controller, ACTION_MAIN, $conexion, $_SESSION['cod_empresa']);
        }
    }else{
        $controller = loadController(CONTROLLER_MAIN);
        loadAction($controller, ACTION_MAIN, $conexion, $_SESSION['cod_empresa']);
    }
?>