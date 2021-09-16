<?php
    class repartidorModel{
        private $db;
        private $data_repartidor;
        public function __construct($conexion){
            $this->db = $conexion;
            $this->data_repartidor = array();
        }
        public function getPedidos(){
            $sql = "select p.id,p.precio,p.ganancia_repartidor,
                    p.fecha_envio as fecha_creacion, pr.nom_producto,
                    c.nombres
                    from pedidos p
                    inner join productos pr on pr.id = p.producto
                    inner join clientes c on c.cod_cliente = p.cliente
                    where p.st_pedido = 'A'
                    order by p.precio ASC";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->data_repartidor = $statment->fetchAll();
            return $this->data_repartidor;
        }
        
        public function getHorarioRepartidor($cod_usuario){
            $sql = "select horario_disponible from repartidores where cod_usuario = '$cod_usuario'";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->data_repartidor = $statment->fetchAll();
            return $this->data_repartidor[0]["horario_disponible"];
        }
    }