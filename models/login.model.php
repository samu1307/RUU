<?php

    require_once('connection.model.php');

    class LoginModel{

        private $pdo;

        public function __construct(){

            try {
                $this->pdo = conex::connection();
            } catch (Exception $e) {
                die($e->getMessage());
            }

        }

        public function login($Rol, $User, $Pass){
            
            if($Rol == 'coor') $msg = 'SELECT * FROM v_userCoordinador WHERE user = :User AND pass = :Pass';
            else $msg = 'SELECT * FROM v_userAuxiliar WHERE user = :User AND pass = :Pass';

            $query = $this->pdo->prepare($msg);
            $query->bindParam(':User', $User);
            $query->bindParam(':Pass', $Pass);
            $query->execute();

            if($query->rowCount() == 1){

                $res = $query->fetch();

                
                $_SESSION['id'] = $res[0];
                $_SESSION['Nombre'] = $res['nombre'];
                $_SESSION['Apellido'] = $res['apellido'];
                $_SESSION['Telefono'] = $res['telefono'];
                $_SESSION['Correo'] = $res['correo'];
                $_SESSION['Usuario'] = $res['user'];
                $_SESSION['Contrasenia'] = $res['pass'];
                
                return true;
                
                
            }else return false;
            
        }
        
        
        public function validateSession(){
            session_start();
            if($_SESSION['id'] == '') header('Location: login.php');
        }

    }

?>