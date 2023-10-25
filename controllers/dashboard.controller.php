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

        public function save($idUser = 0, $idRol = 0){
            if(isset($_POST)){
                $name = $_POST['namee'];
                $lastname = $_POST['lastname'];
                $number = $_POST['number'];
                $email = $_POST['email'];
                $jornada = $_POST['jornada'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $rol = $_POST['rol'];
                $getImg = file_get_contents('../view/img/iconuser1');
                $img = bin2hex($getImg);

                if ($idUser != 0 && $idRol != 0){
                    // Edita
                    return $this->model->save($idUser, $name, $lastname, $number, $email, $jornada, $user, $pass, $rol, $idRol, $img);
                }else{
                    // Crea
                    return $this->model->save($idUser, $name, $lastname, $number, $email, $jornada, $user, $pass, $rol, $idRol, $img);
                }
            }
        }

        public function delete($id){
            $this->model->delete($id);
            header('Location: ../view/dashboard.php');
        }
    }

    if (isset($_GET['method'])) {
        $class = new ControllerCRUD();
    
        switch ($_GET['method']) {
            case 'create':
                echo $class->save();
                break;
            case 'update':
                $idUser = $_GET['idUser'];
                $idRol = $_GET['idRol'];
                echo $class->save($idUser, $idRol);
                break;
            case 'delete':
                $id = $_GET['id'];
                echo $class->delete($id);
                break;
        }
    }

?>