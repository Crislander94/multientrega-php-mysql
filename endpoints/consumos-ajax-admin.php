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
?>