<?php

    require_once('../models/crud.model.php');
    $_POST = json_decode(file_get_contents('php://input'),true);

    class ControllerCRUD{
        private $model;

        public function __construct(){
            $this->model = new ModelCRUD();
        }

        public function show($table){
            return ($this->model->read($table) != false) ? $this->model->read($table) : false ;
        }

        public function create(){
            if(isset($_POST)){
                $name = $_POST['namee'];
                $lastname = $_POST['lastname'];
                $number = $_POST['number'];
                $email = $_POST['email'];
                $jornada = $_POST['jornada'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $rol = $_POST['rol'];
                
                return $this->model->create($name, $lastname, $number, $email, $jornada, $user, $pass, $rol);
            }
        }
    }

    if (isset($_GET['method'])) {
        $class = new ControllerCRUD();
    
        switch ($_GET['method']) {
            case 'create':
                echo $class->create();
                break;
            default:
                echo "Método no válido";
        }
    }

?>