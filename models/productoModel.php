<?php
class Productos_model {

    private $db;
    private $productos;
    public function __construct($conexion){
        $this->db = $conexion;
        $this->prodcutos = array();
    }
    public function getProducts($cod_empresa) {
        $query = "Select * from productos where cod_empresa = '".$cod_empresa."'";

        $statment = $this->db->prepare($query);
        $statment->execute();
        while($row = $statment->fetchAll()){
            $this->productos[] = $row;
        }
        return $this->productos;
    }
}