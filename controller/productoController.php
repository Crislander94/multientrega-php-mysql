<?php
    //Hace de enlace entre la visa y el modelo
    class ProductoController{

        //Carga la vista de todos los productos
        public function index($conexion, $cod_empresa){
            require_once "models/productoModel.php";
            $productos  = new Productos_model($conexion);
            $data["productos"] = $productos->getProducts($cod_empresa);
            require_once "views/productos.view.php";
        }
        //Render el detalle del producto
        public function detailProduct($conexion, $cod_empresa){}
        //Render Formulario para registrar
        public function new($conexion, $cod_empresa){
            // require_once "models/productoModel.php";
            require_once "views/registrar-productos.view.php";
        }
        //Guardar el nuevo Producto
        public function save($conexion, $cod_empresa){
            require_once "models/productoModel.php";
            $cod_usuario = $_SESSION['cod_usuario'];
            $nom_product = $_POST['nom_producto'];
            $precio = $_POST['precio'];
            $disponibilidad = $_POST['disponibilidad'];
            $oferta = $_POST['oferta'];
            $categoria = $_POST['categoria'];
            if($oferta === ''){
                $oferta = '0';
            }
            $producto = new Productos_model($conexion);
            $result = $producto->insertProduct($nom_product, $precio,$disponibilidad,$oferta,$categoria,$cod_usuario,$cod_empresa);
            if(!$result){
                $_SESSION['error'] = true;
            }else{
                $_SESSION['success'] = true;
            }
            header('Location: producto.php');
        }

        //Render Formulario para modificar
        public function modify($conexion, $cod_empresa){
            require_once "views/mod-productos.view.php";
        }

        //Modificar Producto
        public function update($conexion, $cod_empresa){
            require_once "models/productoModel.php";
            $cod_usuario = $_SESSION['cod_usuario'];
            $nom_product = $_POST['nom_producto'];
            $precio = $_POST['precio'];
            $disponibilidad = $_POST['disponibilidad'];
            $oferta = $_POST['oferta'];
            $id = $_POST['id'];
            $categoria = $_POST['categoria'];
            if($oferta === ''){
                $oferta = '0';
            }
            $producto = new Productos_model($conexion);
            $result = $producto->editProduct($nom_product, $precio,$disponibilidad,$oferta,$categoria,$cod_usuario,$id,$cod_empresa);
            if(!$result){
                $_SESSION['error_mod'] = true;
            }else{
                $_SESSION['success_mod'] = true;
            }
            header('Location: producto.php');
        }

        //Eliminar Producto
        public function delete($conexion, $cod_empresa){
            require_once "models/productoModel.php";
            if(isset($_GET['id'])){
                $cod_usuario = $_SESSION['cod_usuario'];
                $id = $_GET['id'];
                $producto = new Productos_model($conexion);
                $result = $producto->deleteProduct($id,$cod_empresa, $cod_usuario);
                if(!$result){
                    $_SESSION['error_del'] = true;
                }else{
                    $_SESSION['success_del'] = true;
                }
                header('Location: producto.php');
            }else{
                header('Location: producto.php');
            }
        }
    }
