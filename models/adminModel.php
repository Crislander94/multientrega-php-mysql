<?php
    class adminModel{
        private $db;
        private $admin;
        public function __construct($conexion){
            $this->db = $conexion;
            $this->admin = array();
        }
        public function getGestionClients(){
            $sql = "";
        }
        public function getGestionDeliverys(){
            $sql = "";
        }
        public function getGestionEnterprise(){
            $sql = "";
        }
        public function getGestionProductosByEnterprise(){
            $sql = "";
        }
    }