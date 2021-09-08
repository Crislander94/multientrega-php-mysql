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
            $nombre = $data[0]["nombres"];
            $identificacion = $data[0]["identificacion"];
            $correo = $data[0]["correo"];
            $telefono = $data[0]["telefono"];
            $metodo_pago = $data[0]["metodo_pago"];
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
            //El modelo me traera los Repartidores a administrar
            require_once "views/adminRepartidores.view.php";
        }

        public function getDetailsDelivery($conexion){

        }
        public function renderAdminEnterprise($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);

            //El modelo me traera a las empresas a Administrar
            require_once "views/adminEmpresas.view.php";
        }

        public function renderAdminProducts($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);

            //El modelo me traera a los productos de la empresa a Administrar
            require_once "views/adminEmpresas.view.php";

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
            require_once "views/adminPedidos.view.php";
        }
    }
