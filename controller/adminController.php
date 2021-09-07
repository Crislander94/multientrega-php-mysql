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

            //El modelo me traera los clientes a administrar
            require_once "views/adminClientes.view.php";
        }
        public function renderAdminDelivery($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);


            //El modelo me traera los Repartidores a administrar
            require_once "views/adminRepartidores.view.php";
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
