<?php 

    require_once 'verificar.php';
    include_once 'partials/cabecera.php';
    include_once 'config/settings.php';
    include_once 'partials/menu.php';
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if($_SESSION["tipo_usuario"] === 'E'){
            setcookie("color_empresa","background-color: ".$_POST["color"].' !important;',time()+60*60*360,'/');
            header('Location: index.php');
        }
        if($_SESSION["tipo_usuario"] === 'A'){
            setcookie("color_admin","background-color: ".$_POST["color"].' !important;',time()+60*60*24*360,'/');
            header('Location: admin.php');
        }
        if($_SESSION["tipo_usuario"] === 'C'){
            setcookie("color_cliente","background-color: ".$_POST["color"].' !important;',time()+60*60*24*360,'/');
            header('Location: cliente.php');
        }
        if($_SESSION["tipo_usuario"] === 'R'){
            setcookie("color_cliente","background-color: ".$_POST["color"].' !important;',time()+60*60*24*360,'/');
            header('Location: repartidor.php');
        }
    }
    require_once 'views/configuraciones.view.php';
?>