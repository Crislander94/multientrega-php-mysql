<?php

    class adminController{
        //Carga la vista de todos los productos
        public function index($conexion, $cod_empresa){
            require_once "models/adminModel.php";
            $admin  = new Productos_model($conexion);
            $data["admin"] = $admin->getViewAdminClient($cod_empresa);
            require_once "views/admin.view.php";
        }
    }
