<?php

    require_once '../db/conexion.php';
    require_once '../config/settings.php';
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if($_POST['key'] === 'listado'){
        $sql = "select cod_empresa, nom_empresa from empresa where st_empresa = 'A'";
        $statment = $conexion->prepare($sql);
        $statment->execute();
        $data= $statment->fetchAll();
        if(!empty($data)){
            $result = array("status" => true, "codigo" => 200 , "data" => $data);
        }else{
            $result = array("status" => true, "codigo" => 204 , "data" => $data);
        }
        header("Content-Type: application/json"); 
        echo json_encode($result, JSON_PRETTY_PRINT);
        exit;
    }
    if($_POST['key'] === 'list-products'){
        if(isset($_POST["cod_empresa"])){
            $id = $_POST["cod_empresa"];
            $sql = "select id, nom_producto, 
                    precio, created_at as fecha_creacion 
                    from productos where st_producto = 'P' and cod_empresa = '$id'";
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

    if($_POST['key'] === 'list-reportes-by-filter'){
        if(
            isset($_POST['columnas']) &&
            isset($_POST['group']) &&
            isset($_POST["inner"])
        ){
            $data = null;
            $columnas = $_POST["columnas"];
            $groups = $_POST["group"];
            $inner = $_POST["inner"];
            $sql = "select 
                        count(p.precio) as cantidadPedidos,sum(p.precio) as total_ventas,
                        sum(p.ganancia_repartidor) as ganancia_repartidor,
                        sum(p.ganancia_web) as ganancia_duenios,
                        sum(p.ganancia_empresa) as ganancia_empresa ,
                        $columnas
                    from pedidos p
                    $inner
                    where p.st_pedido = 'P'
                    $groups 
                    order by p.id ASC";
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
        }else{
            $result = array("status" => false, "codigo" => 204 , "data" => null);
        }
        header("Content-Type: application/json"); 
        echo json_encode($result, JSON_PRETTY_PRINT);
        exit;
    }


    if($_POST["key"] === 'list-reportes'){
        $data = null;
        $sql = "select 
                count(*) as cantidadPedidos
                ,sum(precio) as total_ventas,
                sum(ganancia_repartidor) as ganancia_repartidor,
                sum(ganancia_web) as ganancia_duenios,
                sum(ganancia_empresa) as ganancia_empresa
                from pedidos where st_pedido = 'P' ";
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

        header("Content-Type: application/json"); 
        echo json_encode($result, JSON_PRETTY_PRINT);
        exit;
    }
?>