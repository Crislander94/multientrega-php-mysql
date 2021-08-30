<?php 
    include_once 'config/settings.php';
    require_once 'verificar.php';
    include_once 'partials/menu.php';
    include_once 'partials/cabecera.php';
    //If el usuario no tiene empresa que la registre....
    if(!isset($_SESSION["cod_empresa"])) header('Location: registrar-empresa.php');
    //Consulta SQL para traer los datos de la empresa
    //Traemos los datos de la empresa
    require_once 'db/conexion.php';
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    $sql = "Select 
            e.cod_empresa, e.nom_empresa, e.ruc, e.correo, e.telefono, e.direccion, e.formas_pago, 
            te.descripcion as tipo_empresa,
            h.dias, h.horas
            from empresa e
            inner join tipo_empresa te on e.tipo = te.id
            inner join horarios h on e.cod_empresa = h.cod_empresa
            where e.cod_empresa = '".$_SESSION['cod_empresa']."'";
    $statment = $conexion->prepare($sql);
    $statment->execute();
    $result = $statment->fetchAll();
    /* --------  DATOS EMPRESA -----------*/
    $nom_empresa = $result[0]['nom_empresa'];
    $ruc = $result[0]['ruc'];
    $correo = $result[0]['correo'];
    $telefono = $result[0]['telefono'];
    $direccion = $result[0]['direccion'];
    $formas_pago = $result[0]['formas_pago'];
    $tipo_empresa = $result[0]['tipo_empresa'];
    $dias = $result[0]['dias'];
    $horas = $result[0]['horas'];
    include_once 'views/datos-empresa.view.php';
    include_once 'partials/footer.php';
?>



