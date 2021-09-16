<?php

    class adminController{
        //Carga la vista de todos los productos
        public function index($conexion){
            // $data["admin"] = $admin->getPrincipalView();
            require_once "views/admin/admin.view.php";
        }
        public function renderAdminClient($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);
            $data["clientes"] = $admin->getGestionClients();
            //El modelo me traera los clientes a administrar
            require_once "views/admin/adminClientes.view.php";
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
            require_once "views/admin/detailsClient.view.php";
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
            require_once "views/admin/adminRepartidores.view.php";
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
                $cod_usuario = $data[0]["cod_usuario"];
            }else{
                $nombre = "";
                $identificacion = "";
                $correo = "";
                $telefono = "";
                $dias = "";
                $horas = "";
                $medio_transporte = "";
                $cod_usuario = "";
                $_SESSION['empty']  = true;
            }
            //Traemos la vista para renderizar al repartidor....
            require_once "views/admin/detailsDelivery.view.php";
        }

        public function approveDelivery($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST['id'];
            $cod_usuario = $_REQUEST["cod_usuario"];
            $admin  = new adminModel($conexion);
            $result = $admin->approveDelivery($id,$cod_usuario);
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
            $cod_usuario = $_REQUEST["cod_usuario"];
            $admin  = new adminModel($conexion);
            $result = $admin->disclaimerDelivery($id,$cod_usuario);
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
            require_once "views/admin/adminEmpresas.view.php";
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
            require_once "views/admin/detailsEnterprise.view.php";
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
            require_once "views/admin/adminProductos.view.php";
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
            require_once "views/admin/detailsProduct.view.php";
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
            $data["pedidos"] = $admin->getGestionPedidos();
            //El modelo me traera Los pedidos a administrar
            require_once "views/admin/adminPedidos.view.php";
        }
        public function getDetailsPedido($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST["id"];
            $admin  = new adminModel($conexion);
            $data = $admin->getDetailsPedido($id);
            if(!empty($data)){
                $codigo_pedido = $data[0]["id"];
                $nombre_cliente = $data[0]["nombre_cliente"];
                $nombre_producto = $data[0]["nom_producto"];
                $precio = '$'.$data[0]["precio"];
                $ofertas = $data[0]["ofertas"].'%';
                $precio_final = '$'.$data[0]["precio_final"];
                $identificacion_cliente = $data[0]["identificacion_cliente"];
                $correo_cliente = $data[0]["correo_cliente"];
                $categoria = $data[0]["categoria"];
            }else{
                $codigo_pedido ="";
                $nombre_cliente = "";
                $nombre_producto = "";
                $precio = "";
                $ofertas = "";
                $precio_final = "";
                $identificacion_cliente = "";
                $correo_cliente = "";
                $categoria = "";
                $dias = "";
                $horas = "";
                $_SESSION['empty']  = true;
            }
            //Traemos la vista para renderizar al producto....
            require_once "views/admin/detailsPedido.view.php";
        }
        public function approvePedido($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST["id"];
            $admin  = new adminModel($conexion);
            $result = $admin->approvePedido($id);
            if(!$result){
                $_SESSION['error_aprrove'] = true;
            }else{
                $_SESSION['success_approve'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminPedidos');
        }
        public function disclaimerPedido($conexion){
            require_once "models/adminModel.php";
            if(isset($_POST["cod_pedido"])){
                $id = $_POST["cod_pedido"];
            }
            $motivos = $_POST["motivo"];
            $admin  = new adminModel($conexion);
            $result = $admin->disclaimerPedido($id, $motivos);
            if(!$result){
                $_SESSION['error_disclaimer'] = true;
            }else{
                $_SESSION['success_disclaimer'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminPedidos');
        }
        public function renderAdminRequestDisclaimer($conexion){
            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);
            $data["pedidos"] = $admin->getGestionPedidosCancelar();
            //El modelo me traera Los pedidos a administrar
            require_once "views/admin/adminRequestDisclaimer.view.php";
        }

        public function getDetailsPedidoCancelar($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST["id"];
            $admin  = new adminModel($conexion);
            $data = $admin->getDetailsPedidoCancelar($id);
            if(!empty($data)){
                $codigo_pedido = $data[0]["id"];
                $motivo_cancelacion = $data[0]["motivo_cancelacion"];
                $nombre_cliente = $data[0]["nombre_cliente"];
                $nombre_producto = $data[0]["nom_producto"];
                $precio = '$'.$data[0]["precio"];
                $ofertas = $data[0]["ofertas"].'%';
                $precio_final = '$'.$data[0]["precio_final"];
                $identificacion_cliente = $data[0]["identificacion_cliente"];
                $correo_cliente = $data[0]["correo_cliente"];
                $categoria = $data[0]["categoria"];
            }else{
                $codigo_pedido ="";
                $motivo_cancelacion = "";
                $nombre_cliente = "";
                $nombre_producto = "";
                $precio = "";
                $ofertas = "";
                $precio_final = "";
                $identificacion_cliente = "";
                $correo_cliente = "";
                $categoria = "";
                $_SESSION['empty']  = true;
            }
            //Traemos la vista para renderizar al producto....
            require_once "views/admin/detailsRequestDisclaimer.view.php";
        }
        public function approvePedidoCancelar($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST["id"];
            $admin  = new adminModel($conexion);
            $result = $admin->disclaimerPedidoCancelar($id);
            if(!$result){
                $_SESSION['error_aprrove'] = true;
            }else{
                $_SESSION['success_approve'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminRequestDisclaimer');
        }
        public function disclaimerPedidoCancelar($conexion){
            require_once "models/adminModel.php";
            $id = $_REQUEST["id"];
            $admin  = new adminModel($conexion);
            $result = $admin->approvePedido($id);
            if(!$result){
                $_SESSION['error_disclaimer'] = true;
            }else{
                $_SESSION['success_disclaimer'] = true;
            }
            header('Location: admin.php?c=admin&a=renderAdminRequestDisclaimer');
        }

        public function renderReportes($conexion){

            require_once "models/adminModel.php";
            $admin  = new adminModel($conexion);

            //El modelo me traera La data para gestionar los reportes.
            require_once "views/admin/adminReportes.view.php";
        }
    }