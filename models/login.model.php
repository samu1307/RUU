<?php

    require_once('connection.model.php');
    require_once('../helpers/validations.php');
    

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

                
                $res = $query->fetch();

                saveCookie($record, $res[0], $res['user'], $res['pass']);

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
        
        public function saveCookie($record, $id, $user, $pass){
            if($record == 'active'){
                $user = array('id'=> $id,'user'=> $user,'pass'=> $pass);
                setCookie('_RECOD', base64_encode('active'), time() + 86400 * 30, '/');
                setCookie('_USSES', serialize($user), time() + 86400 * 30, '/');   
            }
        }

        public function validateCookie(){
            session_start();
            
            $usses = isset($_COOKIE['_USSES']);
            $sesid = isset($_SESSION['id']);  
            $recod = isset($_COOKIE['_RECOD']);  
            
            if($usses && !$sesid && $recod){
                $data = unserialize($_COOKIE['_USSES']);
                
                $id = $data['id'];
                $user = $data['user'];
                $pass = $data['pass'];
                
                $_SESSION['id'] = $id;
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;

            }else if(!$usses && $sesid && $recod){
                $id = $_SESSION['id'];
                $user = $_SESSION['user'];
                $pass = $_SESSION['pass'];
                $userArr = array('id'=> $id,'user'=> $user,'pass'=> $pass);
                setCookie('_USSES', serialize($userArr), time() + 86400 * 30, '/');   
            }else if($usses && $sesid && !$recod){
                setCookie('_USSES', "", time() - 86400, '/');   
            }
            else if(!$sesid && !$recod) header('Location: Login.php');
        }
        
        public function validateSession(){
            session_start();

            $usses = isset($_COOKIE['_USSES']);
            $sesid = isset($_SESSION['id']);
            $recod = isset($_COOKIE['_RECOD']);  

            if($sesid) header('Location: dashboard.php');
            else if($usses && $recod) header('Location: dashboard.php');
        }

    }

?>