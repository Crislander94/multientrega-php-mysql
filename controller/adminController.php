<?php

    class adminController{
        //Carga la vista de todos los productos
        public function index($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);
            // $data["admin"] = $admin->getPrincipalView();
            require_once "views/admin.view.php";
        }
        public function renderAdminClient($conexion){
            require_once "views/adminClientes.view.php";
        }
        public function renderAdminDelivery($conexion){
            require_once "views/adminRepartidores.view.php";
        }
        public function renderAdminEnterprise($conexion){
            require_once "views/adminEmpresas.view.php";
        }
    }
