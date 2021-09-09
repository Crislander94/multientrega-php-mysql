<?php
    class adminModel{
        private $db;
        private $admin;
        public function __construct($conexion){
            $this->db = $conexion;
            $this->admin = array();
        }
        public function getGestionClients(){
            $sql = "select 
	                c.cod_cliente, 
                    c.nombres,
	                c.identificacion, c.created_at as fecha_creacion
                    from clientes c where c.st_cliente = 'P' ";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->admin = $statment->fetchAll();
            return $this->admin;
        }
        public function getDetailsClient($id){
            $sql = "select 
            c.cod_cliente, 
            c.nombres, 
            c.identificacion, c.created_at as fecha_creacion,
            c.correo, c.telefono,
            fp.descripcion as metodo_pago
            from clientes c inner join formas_pago fp on c.metodo_pago = fp.id 
            where 
            c.st_cliente ='P'
            and
            c.identificacion = '$id'";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->admin = $statment->fetchAll();
            return $this->admin;
        }
        public function approveClient($id){
            $sql ="update clientes set st_cliente = 'A' where identificacion = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }
        public function disclaimerClient($id){
            $sql ="update clientes set st_cliente = 'X' where identificacion = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }

        public function getGestionDeliverys(){
            $sql = "SELECT 
                    cod_repartidor,
                    nombres, 
                    RUC, created_at as fecha_creacion
                    from repartidores
                    where st_repartidor = 'P' ";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->admin = $statment->fetchAll();
            return $this->admin;
        }
        public function getDetailsDelivery($id){

            $sql = "SELECT 
                    nombres, 
                    RUC, 
                    correo, 
                    telefono, horario_disponible, medio_transporte 
                    from repartidores
                    where st_repartidor = 'P' and RUC = '$id'";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->admin = $statment->fetchAll();
            return $this->admin;
        }

        public function approveDelivery($id){
            $sql ="update repartidores set st_repartidor = 'A' where RUC = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }
        public function disclaimerDelivery($id){
            $sql ="update repartidores set st_repartidor = 'X' where RUC = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }
        public function getGestionEnterprise(){
            $sql = "select cod_empresa, nom_empresa, ruc, created_at as fecha_creacion
            from empresa where st_empresa = 'P'";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->admin = $statment->fetchAll();
            return $this->admin;
        }
        public function getDetailsEnterprise($id){
            $sql = "select e.cod_empresa,e.nom_empresa, e.ruc, e.correo,
                e.telefono, e.direccion, e.formas_pago,
                h.dias, h.horas, t.descripcion as tipo_empresa
                from empresa e
                inner join tipo_empresa t on t.id = e.tipo
                inner join horarios h on h.id = e.cod_empresa
                where e.st_empresa = 'P'
                and e.cod_empresa = '$id' ";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->admin = $statment->fetchAll();
            return $this->admin;
        }
        public function approveEnterprise($id){
            $sql = "update empresa set st_empresa = 'A' where cod_empresa = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }
        public function disclaimerEnterprise($id){
            $sql = "update empresa set st_empresa = 'X' where cod_empresa = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }



        public function getDetailsProduct($id,$cod_empresa){
            $sql = "select p.nom_producto, p.precio, p.disponibilidad, p.ofertas, c.descripcion as categoria
                    from productos p inner join categorias c on c.id=p.categoria
                    where p.id = '$id'
                    and cod_empresa = '$cod_empresa'
                    and p.st_producto = 'P'";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->admin = $statment->fetchAll();
            return $this->admin;
        }
        public function approveProduct($id,$cod_empresa){
            $sql = "update productos set st_producto = 'A' where cod_empresa = '$cod_empresa' and id = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }
        public function disclaimerProduct($id,$cod_empresa){
            $sql = "update productos set st_producto = 'X' where cod_empresa = '$cod_empresa' and id = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }

        public function getGestionProductosByEnterprise(){
            $sql = "";
        }
        

    }