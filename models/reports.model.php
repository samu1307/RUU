<?php

    require_once('connection.model.php');

    class Reports{

        private $pdo;

        public function __construct(){
            try {
                $this->pdo = conex::connection();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function reportUsers(){
            $query = $this->pdo->prepare('SELECT * FROM `v_allUsers`');
            if($query->execute()){
                return $query->fetchAll();
            }
        } 
        
    }

?>