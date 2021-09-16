<?php 
    session_start();
    require_once '../db/conexion.php';
    $db = new DBClass();
    $conexion = $db->getconnection();
    $array_days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
    $strings_days = '';
    if(
        isset($_POST['username']) &&
        isset($_POST['nombres']) &&
        isset($_POST['ruc']) &&
        isset($_POST['pass']) &&
        isset($_POST['correo']) &&
        isset($_POST['telefono']) &&
        isset($_POST['horarios']) &&
        isset($_POST['desde_hora']) &&
        isset($_POST['medio_transporte']) &&
        isset($_POST['min_desde']) &&
        isset($_POST['hasta_hora']) &&
        isset($_POST['min_hasta']) 
    ){
        $username = $_POST['username'];
        $nombres = $_POST['nombres'];
        $ruc = $_POST['ruc'];
        $pass = $_POST['pass'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $medio_transporte = $_POST['medio_transporte'];
        $horarios = $_POST['horarios'];
        $desde_hora = $_POST['desde_hora'];
        $min_desde = $_POST['min_desde'];
        $hasta_hora = $_POST['hasta_hora'];
        $min_hasta = $_POST['min_hasta'];
        $horario_final = $desde_hora.':'.$min_desde.'-'.$hasta_hora.':'.$min_hasta;
        foreach ($horarios as $key => $horario) {
            if($key === count($horarios) -1){
                $strings_days.= $array_days[$horario-1];
            }else{
                $strings_days.= $array_days[$horario-1].',';
            }
        }
        $horario_final = $strings_days.';'.$horario_final;
        $query = "insert into users(username, email, password, tipo_usuario, st_user)
                values('$username','$correo','$pass','R','P');";
        try{
            //Iniciamos la transaccion
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->beginTransaction();
            //Ejecutamos el query
            $conexion->exec($query);
            //Obtenemos el ultimo elemento insertado....
            $ultimo_insert = "SELECT max(id) as id from users";
            $statment = $conexion->prepare($ultimo_insert);
            $statment->execute();
            $xresult = $statment->fetchAll();
            $id = $xresult[0]['id'];
            //Insertamos el horario de la empresa
            $xquery = "insert into repartidores(cod_usuario, nombres, RUC, correo, telefono, horario_disponible, medio_transporte)
                        values('$id','$nombres','$ruc','$correo','$telefono','$horario_final','$medio_transporte')";
            $conexion->exec($xquery);
            $conexion->commit();
            $_SESSION['success_repartidor'] = true;
            header('Location: index.php');
        }catch(Exception $e){
            echo $e->getMessage();
            $conexion->rollBack();
            $_SESSION['error_repartidor'] = true;
            header('Location: registrar.php');
        }
    }

?>