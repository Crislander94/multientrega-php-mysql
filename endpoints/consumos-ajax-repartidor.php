<?php

    require_once '../db/conexion.php';
    require_once '../config/settings.php';
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if($_POST['key'] === 'list-pedidos-filter'){
        if(
            isset($_POST["filtro"]) &&
            isset($_POST["tipo"]) &&
            isset($_POST["cod_usuario"])
        ){
            $estado = ($_POST["tipo"] === "cancelados") ? 'X' : 'F';
            $filtro = $_POST["filtro"];
            $cod_usuario = $_POST["cod_usuario"];
            $sql = "select p.precio, p.ganancia_repartidor, c.nombres as cliente,
                    pr.nom_producto, 
                    $filtro
                    from pedidos p
                    inner join productos pr on pr.id = p.producto
                    inner join clientes c on c.cod_cliente = p.cliente
                    where p.st_pedido = '$estado'
                    and p.cod_repartidor = '$cod_usuario'
                    order by ganancia_repartidor ASC";
            $statment = $conexion->prepare($sql);
            $statment->execute();
            $data= $statment->fetchAll();
            if(!empty($data)){
                $result = array("status" => true, "codigo" => 200 , "data" => $data);
            }else{
                $result = array("status" => false, "codigo" => 204 , "data" => $data);
            }
        }else{
            $result = array("status" => false, "codigo" => 204 , "data" => null);
        }
        header("Content-Type: application/json"); 
        echo json_encode($result, JSON_PRETTY_PRINT);
        exit;
    }
    if($_POST["key"] === 'list-pedidos'){
        if(isset($_POST["cod_usuario"])){
            $data = null;
            $cod_usuario = $_POST["cod_usuario"];
            $sql = "select p.precio, p.ganancia_repartidor, c.nombres as cliente,
                    fecha_envio as fecha_creacion, pr.nom_producto, 
                    case p.st_pedido
                        when 'P' then 'Pendiente'
                        when 'X' then 'Cancelado'
                        when 'F' then 'Completado'
                        when 'A' then 'Generado'
                    end as estado,
                    case p.st_pedido  
                        when 'P' then 'info'
                        when 'X' then 'danger'
                        when 'F' then 'success'
                        when 'A' then 'primary'
                    end as color_estado
                    from pedidos p
                    inner join productos pr on pr.id = p.producto
                    inner join clientes c on c.cod_cliente = p.cliente
                    where p.cod_repartidor = '$cod_usuario'
                    and p.st_pedido != 'C' and p.st_pedido != 'P'
                    and p.st_pedido != 'E'
                    order by p.ganancia_empresa ASC";
            $statment = $conexion->prepare($sql);
            $statment->execute();
            while($fila = $statment->fetch(PDO::FETCH_ASSOC)){
                $data[] = $fila;
            }
            if(!empty($data)){
                $result = array("status" => true, "codigo" => 200 , "data" => $data);
            }else{
                $result = array("status" => false, "codigo" => 204 , "data" => $data);
            }
        }
        header("Content-Type: application/json"); 
        echo json_encode($result, JSON_PRETTY_PRINT);
        exit;
    }
?>