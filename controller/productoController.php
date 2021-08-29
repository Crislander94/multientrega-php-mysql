<?php


    //Hace de enlace entre la visa y el modelo
    class ProductosController{
        public function index($conexion){
            require_once "models/productoModel.php";
            $productos  = new Productos_model($conexion);
            $data[] = $productos->getProducts($_SESSION['cod_empresa']);
            require_once "views/productos.view.php";
        }
    }
