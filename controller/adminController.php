<?php

    class adminController{
        //Carga la vista de todos los productos
        public function index($conexion){
            // $data["admin"] = $admin->getPrincipalView();
            require_once "views/admin.view.php";
        }
        public function renderAdminClient($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);
            $data["clientes"] = $admin->getGestionClients();
            //El modelo me traera los clientes a administrar
            require_once "views/adminClientes.view.php";
        }

        public function getDetailsClient($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $data = $admin->getDetailsClient($id);
            if(!empty($data)){
                $nombre = $data[0]["nombres"];
                $identificacion = $data[0]["identificacion"];
                $correo = $data[0]["correo"];
                $telefono = $data[0]["telefono"];
                $metodo_pago = $data[0]["metodo_pago"];
            }else{
                $nombre = "";
                $identificacion = "";
                $correo = "";
                $telefono = "";
                $metodo_pago = "";
                $_SESSION['empty'] = true;
            }
            //Traemos la vista para renderizar el cliente....
            require_once "views/detailsClient.view.php";
        }
        public function approveClient($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $result = $admin->approveClient($id);
            if(!$result){
                $_SESSION['error_aprrove'] = true;
            }else{
                $_SESSION['success_approve'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminClient');
        }
        public function disclaimerClient($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $result = $admin->disclaimerClient($id);
            if(!$result){
                $_SESSION['error_disclaimer'] = true;
            }else{
                $_SESSION['success_disclaimer'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminClient');
        }

        public function renderAdminDelivery($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);
            $data["repartidores"] = $admin->getGestionDeliverys();
            //El modelo me traera los Repartidores a administrar
            require_once "views/adminRepartidores.view.php";
        }

        public function getDetailsDelivery($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $data = $admin->getDetailsDelivery($id);
            if(!empty($data)){
                $nombre = $data[0]["nombres"];
                $identificacion = $data[0]["RUC"];
                $correo = $data[0]["correo"];
                $telefono = $data[0]["telefono"];
                $horario = $data[0]["horario_disponible"];
                $dias = explode(";", $horario)[0];
                $horas = explode(";", $horario)[1];
                $medio_transporte = $data[0]["medio_transporte"];
            }else{
                $nombre = "";
                $identificacion = "";
                $correo = "";
                $telefono = "";
                $dias = "";
                $horas = "";
                $medio_transporte = "";
                $_SESSION['empty']  = true;
            }
            //Traemos la vista para renderizar al repartidor....
            require_once "views/detailsDelivery.view.php";
        }

        public function approveDelivery($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $result = $admin->approveDelivery($id);
            if(!$result){
                $_SESSION['error_aprrove'] = true;
            }else{
                $_SESSION['success_approve'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminDelivery');
        }
        public function disclaimerDelivery($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $result = $admin->disclaimerDelivery($id);
            if(!$result){
                $_SESSION['error_disclaimer'] = true;
            }else{
                $_SESSION['success_disclaimer'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminDelivery');
        }

        public function renderAdminEnterprise($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);
            $data["empresas"] = $admin->getGestionEnterprise();
            //El modelo me traera a las empresas a Administrar
            require_once "views/adminEmpresas.view.php";
        }


        public function getDetailsEnterprise($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $data = $admin->getDetailsEnterprise($id);
            if(!empty($data)){
                $nombre = $data[0]["nom_empresa"];
                $identificacion = $data[0]["ruc"];
                $correo = $data[0]["correo"];
                $telefono = $data[0]["telefono"];
                $dias = $data[0]["dias"];
                $horas = $data[0]["horas"];
                $tipo = $data[0]["tipo_empresa"];
                $metodos_pago = $data[0]["formas_pago"];
            }else{
                $nombre = "";
                $identificacion = "";
                $correo = "";
                $telefono = "";
                $dias = "";
                $horas = "";
                $tipo = "";
                $metodos_pago = "";
                $_SESSION['empty']  = true;
            }
            //Traemos la vista para renderizar al repartidor....
            require_once "views/detailsEnterprise.view.php";
        }

        public function approveEnterprise($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $result = $admin->approveEnterprise($id);
            if(!$result){
                $_SESSION['error_aprrove'] = true;
            }else{
                $_SESSION['success_approve'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminEnterprise');
        }
        public function disclaimerEnterprise($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $admin  = new adminModel($conexion);
            $result = $admin->disclaimerEnterprise($id);
            if(!$result){
                $_SESSION['error_disclaimer'] = true;
            }else{
                $_SESSION['success_disclaimer'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminEnterprise');
        }
        
        public function renderAdminProducts($conexion){
            //El modelo me traera a los productos de la empresa a Administrar
            require_once "views/adminProductos.view.php";
        }
        public function getDetailsProduct($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $cod_empresa = $_REQUEST['cod_empresa'];
            $admin  = new adminModel($conexion);
            $data = $admin->getDetailsProduct($id,$cod_empresa);
            if(!empty($data)){
                $nombre = $data[0]["nom_producto"];
                $precio = '$'.$data[0]["precio"];
                $disponibilidad = $data[0]["disponibilidad"];
                $ofertas = $data[0]["ofertas"].'%';
                $categoria = $data[0]["categoria"];
            }else{
                $nombre = "";
                $precio = "";
                $disponibilidad = "";
                $ofertas = "";
                $categoria = "";
                $_SESSION['empty']  = true;
            }
            //Traemos la vista para renderizar al producto....
            require_once "views/detailsProduct.view.php";
        }

        public function approveProduct($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $cod_empresa = $_REQUEST['cod_empresa'];
            $admin  = new adminModel($conexion);
            $result = $admin->approveProduct($id,$cod_empresa);
            if(!$result){
                $_SESSION['error_aprrove'] = true;
            }else{
                $_SESSION['success_approve'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminProducts');
        }
        public function disclaimerProduct($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $cod_empresa = $_REQUEST['cod_empresa'];
            $admin  = new adminModel($conexion);
            $result = $admin->disclaimerProduct($id,$cod_empresa);
            if(!$result){
                $_SESSION['error_disclaimer'] = true;
            }else{
                $_SESSION['success_disclaimer'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminProducts');
        }
        public function renderAdminPedidos($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);

            //El modelo me traera Los pedidos a administrar
            require_once "views/adminPedidos.view.php";
        }

        public function renderReportes($conexion){

            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);

            //El modelo me traera La data para gestionar los reportes.
            require_once "views/adminReportes.view.php";
        }
    }