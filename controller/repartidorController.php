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
            //Traemos la vista para renderizar el cliente....
            $horario_disponible = $repartidor->getHorarioRepartidor($_SESSION["cod_usuario"]);
            $status_repartidor = false;
            var_dump($horario_disponible);
            $dias_disponibles = explode(';',$horario_disponible)[0];
            $horas_disponibles = explode(';',$horario_disponible)[1];
            $dias_disponibles = explode(',',$dias_disponibles);
            $dia_actual = date('N');
            $dia_actual = $dias[$dia_actual-1];
            if(in_array($dia_actual, $dias_disponibles)) $status_repartidor = true;
            $hora_inicio = explode(":");
            $min_inicio = explode(":");
            $min_final = explode(":");
            $hora_final = explode(":");
            var_dump($horas_disponibles);
            // $status_repartidor = $repartidor->get
            require_once 'views/repartidor/seleccionar.view.php';
        }
    }