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
                
                if ($idUser != 0 && $idRol != 0){
                    // Edita
                    $state = $_POST['state'];
                    return $this->model->saveUser($idUser, $name, $lastname, $number, $email, $jornada, $user, $pass, $rol, $state, $idRol);
                }else{
                    // Crea
                    return $this->model->saveUser($idUser, $name, $lastname, $number, $email, $jornada, $user, $pass, $rol, 'A', $idRol);
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

        public function saveCourse($id = 0){
            if(isset($_POST)){
                $grado = $_POST['grado'];
                $curso = $_POST['curso'];
                $jornada = $_POST['jornada'];
                $alum = $_POST['alumnos'];
                $direc = $_POST['director'];
                
                if ($id != 0){
                    $estado = $_POST['estado'];
                    // Edita
                    return $this->model->saveCourse($grado, $curso, $jornada, $alum, $direc, $id, $estado);
                }else{
                    // Crea
                    return $this->model->saveCourse($grado, $curso, $jornada, $alum, $direc, $id, 'A');
                }
            }
        }

        public function delete($id){
            $this->model->delete($id);
            header('Location: ../view/dashboard.php');
        }
    }

    if (isset($_GET['method']) || isset($_GET['create'])) {
        $class = new ControllerCRUD();
    
        switch ($_GET['method']) {
            case 'create':
                //CREATE A USER
                if($_GET['create'] == 'user') echo $class->saveUser();
                
                //CREATE A SNACK
                else if($_GET['create'] == 'snack') echo $class->saveSnack();
                
                //CREATE A COURSE
                else if($_GET['create'] == 'course') echo $class->saveCourse();
            break;
            case 'update':
                //UPDATE A USER
                if($_GET['create'] == 'user'){
                    $idRol = $_GET['idRol'];
                    $idUser = $_GET['idUser'];
                    echo $class->saveUser($idUser, $idRol);
                }

                //UPDATE A SNACK
                else if($_GET['create'] == 'snack'){
                    $id = $_GET['id'];
                    echo $class->saveSnack($id);
                }

                //UPDATE A COURSE
                else if($_GET['create'] == 'course'){
                    $id = $_GET['id'];
                    echo $class->saveCourse($id);
                }
            break;
            case 'delete':
                $id = $_GET['id'];
                echo $class->delete($id);
            break;
        }
    }

?>