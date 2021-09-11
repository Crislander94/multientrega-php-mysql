<?php
    include_once 'config/settings.php';
    require_once 'verificar.php';
    include_once 'partials/cabecera.php';
    include_once 'partials/menu.php';
    require_once 'db/conexion.php';
    if(isset($_SESSION["tipo_usuario"])){
        if($_SESSION["tipo_usuario"] === 'A') header('Location: admin.php');
        if($_SESSION["tipo_usuario"] === 'R') header('Location: repartidor.php');
        if($_SESSION["tipo_usuario"] === 'C') header('Location: cliente.php');
    }
    if(!isset($_SESSION["cod_empresa"])) header('Location: registrar-empresa.php');
    if($_SESSION['estado_empresa'] === 'P') header('Location: index.php');
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