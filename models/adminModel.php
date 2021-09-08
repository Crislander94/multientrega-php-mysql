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
            
        }
        public function getGestionEnterprise(){
            $sql = "";
        }
        public function getGestionProductosByEnterprise(){
            $sql = "";
        }
        

    }