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

        public function login($Rol, $User, $Pass, $record){

            $query = $this->pdo->prepare('CALL `sp_login` (:User, :Pass, :Rol)');
            $query->bindParam(':User', $User);
            $query->bindParam(':Pass', $Pass);
            $query->bindParam(':Rol', $Rol);
            $query->execute();
            
            if($query->rowCount() == 1){

                $this->saveCookie($record, $User);

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
        
        public function saveCookie($record, $user){
            if($record == 'active'){
                $userEncrypt = password_hash($user, PASSWORD_DEFAULT);
                setCookie('__1432', $userEncrypt, time() + 606024 * 30, '/');
            }
        }

        public function readCookie(){
            $query = $this->pdo->prepare('SELECT usuario, contrasenia FROM usuario');
            $query->execute();
            $arrUsers = $query->fetchAll();
            for($i=0; $i < count($arrUsers); $i++) {
                $user = $arrUsers[$i][0];
                $arr[$i] = password_hash($user, PASSWORD_DEFAULT);
            }
            return $arr;
        }
        
        public function validateSession(){
            session_start();
            if($_SESSION['id'] == '') header('Location: login.php');
        }

    }

?>