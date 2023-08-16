<?php

    // session_start();
    require_once('../models/crud.model.php');

    class ControllerCRUD{
        private $model;

        public function __construct(){
            $this->model = new ModelCRUD();
        }

        public function show($table){
            return ($this->model->read($table) != false) ? $this->model->read($table) : false ;
        }


    }

?>