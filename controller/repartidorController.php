<?php
    class RepartidorController {
        public function index($conexion){
            require_once 'views/repartidor/repartidor.view.php';
        }
        public function renderSelectedPedido($conexion){
            require_once "models/repartidorModel.php";
            $repartidor  = new repartidorModel($conexion);
            $dias = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
            $data["pedidos"] = $repartidor->getPedidos();
            date_default_timezone_set('America/Guayaquil');
            //Traemos la vista para renderizar el cliente....
            $horario_disponible = $repartidor->getHorarioRepartidor($_SESSION["cod_usuario"]);
            $status_repartidor = false;
            $dias_disponibles = explode(';',$horario_disponible)[0];
            $horas_disponibles = explode(';',$horario_disponible)[1];
            $dias_disponibles = explode(',',$dias_disponibles);
            $dia_actual = date('N');
            $dia_actual = $dias[$dia_actual-1];
            //Sacar hora exacta
            $hora_inicio = explode("-", $horas_disponibles)[0];
            $hora_final = explode("-", $horas_disponibles)[1];
            //Horario inicio....
            $hora_inicio_hora = explode(':',$hora_inicio)[0];
            $hora_inicio_min = explode(':',$hora_inicio)[1];
            $hora_actual = date("G");
            $min_actual = date('i');
            // CONVERSION PARA COMPARACION
            $hora_inicio_hora = intval($hora_inicio_hora);
            $hora_inicio_min = intval($hora_inicio_min);
            $hora_actual = intval($hora_actual);
            $min_actual = intval($min_actual);
            if($hora_actual  >= $hora_inicio_hora ){
                $status_repartidor = true;
                if($hora_inicio_hora === $hora_actual){
                    if($hora_inicio_min > $min_actual){
                        $status_repartidor = false;
                    }else{
                        $status_repartidor = true;
                    }
                }
            }else{
                $status_repartidor = false;
            }
            //Validar horario inicio
            //Validar horario final
            $hora_final_hora = explode(':',$hora_final)[0];
            $hora_final_min = explode(':',$hora_final)[1];
            $hora_final_hora = intval($hora_final_hora);
            $hora_final_min = intval($hora_final_min);
            if($hora_actual  <= $hora_final_hora ){
                $status_repartidor = true;
                if($hora_final_hora === $hora_actual){
                    if($hora_final_min < $min_actual){
                        $status_repartidor = false;
                    }else{
                        $status_repartidor = true;
                    }
                }
            }else{
                $status_repartidor = false;
            }
            if(!in_array($dia_actual, $dias_disponibles)) $status_repartidor = false;
            require_once 'views/repartidor/seleccionar.view.php';
        }

        public function SelectedPedido($conexion){
            require_once "models/repartidorModel.php";
            $repartidor  = new repartidorModel($conexion);
            $id = $_REQUEST["id"];
            $data = $repartidor->getDetailsPedido($id);
            if(!empty($data)){
                $nombre_producto = $data[0]["nom_producto"];
                $nombre_cliente = $data[0]["nombres"];
                $cod_pedido = $data[0]["id"];
                $precio = '$'.$data[0]["precio"];
                $ganancia_repartidor = '$'.$data[0]["ganancia_repartidor"];
            }else{
                $nombre_producto = "";
                $nombre_cliente = "";
                $id = "";
                $precio = "";
                $ganancia_repartidor = "";
                $_SESSION['empty']  = true;
            }
            //registramos el estado
            require_once 'views/repartidor/registrarestado.view.php';
        }
        public function renderGestionPedidos($conexion){
            require_once "models/repartidorModel.php";
            $repartidor  = new repartidorModel($conexion);
            $dias = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
            $data["pedidos"] = $repartidor->getPedidosActivos();
            date_default_timezone_set('America/Guayaquil');
            //Traemos la vista para renderizar el cliente....
            $horario_disponible = $repartidor->getHorarioRepartidor($_SESSION["cod_usuario"]);
            $status_repartidor = false;
            $dias_disponibles = explode(';',$horario_disponible)[0];
            $horas_disponibles = explode(';',$horario_disponible)[1];
            $dias_disponibles = explode(',',$dias_disponibles);
            $dia_actual = date('N');
            $dia_actual = $dias[$dia_actual-1];
            //Sacar hora exacta
            $hora_inicio = explode("-", $horas_disponibles)[0];
            $hora_final = explode("-", $horas_disponibles)[1];
            //Horario inicio....
            $hora_inicio_hora = explode(':',$hora_inicio)[0];
            $hora_inicio_min = explode(':',$hora_inicio)[1];
            $hora_actual = date("G");
            $min_actual = date('i');
            // CONVERSION PARA COMPARACION
            $hora_inicio_hora = intval($hora_inicio_hora);
            $hora_inicio_min = intval($hora_inicio_min);
            $hora_actual = intval($hora_actual);
            $min_actual = intval($min_actual);
            if($hora_actual  >= $hora_inicio_hora ){
                $status_repartidor = true;
                if($hora_inicio_hora === $hora_actual){
                    if($hora_inicio_min > $min_actual){
                        $status_repartidor = false;
                    }else{
                        $status_repartidor = true;
                    }
                }
            }else{
                $status_repartidor = false;
            }
            //Validar horario inicio
            //Validar horario final
            $hora_final_hora = explode(':',$hora_final)[0];
            $hora_final_min = explode(':',$hora_final)[1];
            $hora_final_hora = intval($hora_final_hora);
            $hora_final_min = intval($hora_final_min);
            if($hora_actual  <= $hora_final_hora ){
                $status_repartidor = true;
                if($hora_final_hora === $hora_actual){
                    if($hora_final_min < $min_actual){
                        $status_repartidor = false;
                    }else{
                        $status_repartidor = true;
                    }
                }
            }else{
                $status_repartidor = false;
            }
            if(!in_array($dia_actual, $dias_disponibles)) $status_repartidor = false;
            require_once 'views/repartidor/gestion_pedidos.view.php';
        }
        public function activePedido($conexion){
            require_once "models/repartidorModel.php";
            $id = $_REQUEST['id'];
            $cod_usuario = $_SESSION["cod_usuario"];
            $repartidor  = new repartidorModel($conexion);
            $result = $repartidor->activePedido($id, $cod_usuario);
            if(!$result){
                $_SESSION['error_active'] = true;
            }else{
                $_SESSION['success_active'] = true;
            }
            header('Location: repartidor.php?c=repartidor&a=renderSelectedPedido');
        }

        public function finishEntrega($conexion){
            require_once "models/repartidorModel.php";
            $id = $_REQUEST['id'];
            $repartidor  = new repartidorModel($conexion);
            $result = $repartidor->finishPedido($id);
            if(!$result){
                $_SESSION['error_finish'] = true;
            }else{
                $_SESSION['success_finish'] = true;
            }
            header('Location: repartidor.php?c=repartidor&a=renderGestionPedidos');
        }

        public function renderReporteria($conexion){
            //Repartidor...
            require_once 'views/repartidor/reportes.view.php';
        }
    }