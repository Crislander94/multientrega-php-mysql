<?php 
    /*
        Verifica que el usuario se encuentre en nuestros registros....
    */
    require_once '../db/conexion.php';
    session_start();
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(
            isset($_POST['email']) &&
            isset($_POST['password'])
        ){
            $email_verify = $_POST['email'];
            $password_verify = $_POST['password'];
            $sql = "Select * from users  where email like '%$email_verify%' and password like '%$password_verify%' ";
            $statment = $conexion->prepare($sql);
            $statment->execute();
            $result = $statment->fetchAll();
            if(count($result) ===1){
                $_SESSION['username'] = $result[0]['username']; 
                $_SESSION['cod_usuario'] = $result[0]['id'];
                $_SESSION['cod_empresa'] = $result[0]['cod_empresa'];
                $_SESSION['tipo_usuario'] = $result[0]['tipo_usuario'];

                if($result[0]['cod_empresa'] != null){
                    $xsql = "Select st_empresa
                            from empresa 
                            where cod_empresa = '".$_SESSION['cod_empresa']."'";
                    $xstatment = $conexion->prepare($xsql);
                    $xstatment->execute();
                    $xresult = $xstatment->fetchAll();
                    $_SESSION["estado_empresa"] = $xresult[0]['st_empresa'];
                }
                header('Location: ../index.php');
            }else{
                $_SESSION['error'] = true;
                header('Location: index.php');
            }
        }
    }
?>