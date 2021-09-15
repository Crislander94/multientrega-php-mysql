<?php 
    require_once 'verificar.php';
    include_once 'partials/cabecera.php';
    include_once 'config/settings.php';
    include_once 'partials/menu.php';
    require_once 'db/conexion.php';
    if(isset($_SESSION["tipo_usuario"])){
        if($_SESSION["tipo_usuario"] === 'A') header('Location: admin.php');
        if($_SESSION["tipo_usuario"] === 'R') header('Location: repartidor.php');
        if($_SESSION["tipo_usuario"] === 'C') header('Location: cliente.php');
    }
    if(!isset($_SESSION["cod_empresa"])) header('Location: registrar-empresa.php');
    if($_SESSION['estado_empresa'] === 'P') header('Location: index.php');
    include_once 'views/enterprise/control-pedidos.view.php';
    include_once './partials/footer.php';
?>