<?php 
    session_start();
    require_once '../db/conexion.php';
    $db = new DBClass();
    $conexion = $db->getconnection();
    if(
        isset($_POST['username']) &&
        isset($_POST['pass']) &&
        isset($_POST['correo'])
    ){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $correo = $_POST['correo'];
        $query = "insert into users(username, email, password,tipo_usuario)
                values('$username','$correo','$pass','E');";
        try{
            //Iniciamos la transaccion
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->beginTransaction();
            //Ejecutamos el query
            $conexion->exec($query);
            $conexion->commit();
            $_SESSION['success_userEmpresa'] = true;
            header('Location: index.php');
        }catch(Exception $e){
            echo $e->getMessage();
            $conexion->rollBack();
            $_SESSION['error_userEmpresa'] = true;
            header('Location: registrarUserEmpresa.php');
        }
    }

?>