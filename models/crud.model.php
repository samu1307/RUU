<?php

    require_once('connection.model.php');

    class ModelCRUD{

        private $pdo;

        public function __construct(){
            try {
                $this->pdo = conex::connection();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function create(){
            $reques = $this->pdo->prepare();
        }

        public function read($table){
            $query = 'SELECT * FROM '.$table;
            $request = $this->pdo->prepare($query);
            return ($request->execute()) ? $request->fetchAll() : false;
        }

        public function update(){
            $reques = $this->pdo->prepare();
        }

        public function delete(){
            $reques = $this->pdo->prepare();
        }


    }

?>