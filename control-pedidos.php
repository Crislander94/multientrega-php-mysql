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
    $filtro = '';
    $seleccion = '0';
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(
            isset($_POST['busqueda_filtro'])
            
        ){
            if(intval($_POST['busqueda_filtro']) === 0){$filtro = ''; $seleccion = '0';}
            if(intval($_POST['busqueda_filtro']) === 1){$filtro = "and cp.st_pedido = 'C' "; $seleccion = '1';}
            if(intval($_POST['busqueda_filtro']) === 2){$filtro = "and cp.st_pedido = 'X' "; $seleccion = '2';}
        }
    }
    $query =  "Select 
                    cp.cliente, cp.st_pedido, cp.fecha_envio, cp.fecha_cancelacion, cp.valor, cp.valor_neto, cp.ganancia_web,
                    cp.motivo_cancelacion, p.nom_producto, p.precio
                    from control_pedidos cp inner join productos p on
                    cp.producto = p.id
                    where 
                        cp.cod_empresa = '".$_SESSION['cod_empresa']."'
                    and
                        p.cod_empresa = '".$_SESSION['cod_empresa']."'
                    and
                        p.st_producto = 'A'
                    ".$filtro;
    $statment = $conexion->prepare($query);
    $statment->execute();
    $result= $statment->fetchAll();
    include_once 'views/control-pedidos.view.php';
?>
<?php include_once './partials/footer.php'; ?>