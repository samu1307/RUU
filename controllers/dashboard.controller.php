<?php

    require_once('C://xampp/htdocs/RUU/models/crud.model.php');
    $_POST = json_decode(file_get_contents('php://input'),true);

    class ControllerCRUD{
        private $model;

        public function __construct(){
            $this->model = new ModelCRUD();
        }

        public function show($table){
            return ($this->model->read($table) != false) ? $this->model->read($table) : false ;
        }

        public function saveUser($idUser = 0, $idRol = 0){
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
                    return $this->model->saveUser($idUser, $name, $lastname, $number, $email, $jornada, $user, $pass, $rol, $idRol, $img);
                }else{
                    // Crea
                    return $this->model->saveUser($idUser, $name, $lastname, $number, $email, $jornada, $user, $pass, $rol, $idRol, $img);
                }
            }
        }

        public function saveSnack($id = 0){
            if(isset($_POST)){
                $hora = date('H:i:s');
                $date = date('Y-m-d');
                $cant = $_POST['cant'];
                $type = $_POST['type'];
                $descri = $_POST['descri'];
                $aux = $_POST['aux'];
                $coor = $_POST['coor'];

                if ($id != 0){
                    // Edita
                    return $this->model->saveSnack($hora, $date, $cant, $type, $descri, $aux, $coor, $id);
                }else{
                    // Crea
                    return $this->model->saveSnack($hora, $date, $cant, $type, $descri, $aux, $coor, $id);
                }
            }
        }

        public function delete($id){
            $this->model->delete($id);
            header('Location: ../view/dashboard.php');
        }
    }

    if (isset($_GET['method']) && isset($_GET['create'])) {
        $class = new ControllerCRUD();
    
        switch ($_GET['method']) {
            case 'create':
                if($_GET['create'] == 'user') echo $class->saveUser();
                else if($_GET['create'] == 'snack') echo $class->saveSnack();
            break;
            case 'update':
                if($_GET['create'] == 'user'){
                    $idRol = $_GET['idRol'];
                    $idUser = $_GET['idUser'];
                    echo $class->saveUser($idUser, $idRol);
                }
                else if($_GET['create'] == 'snack'){
                    $idRol = $_GET['idRefri'];
                    echo $class->saveSnack($id);
                }
            break;
            case 'delete':
                $id = $_GET['id'];
                echo $class->delete($id);
            break;
        }
    }

?>