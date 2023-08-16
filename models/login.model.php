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

        public function login($User, $Pass){
            
            $query = $this->pdo->prepare('SELECT * FROM usuario WHERE usuario = :User AND contrasenia = :Pass');
            $query->bindParam(':User', $User);
            $query->bindParam(':Pass', $Pass);
            $query->execute();

            if($query->rowCount() == 1){

                $res = $query->fetch();

                $_SESSION['Nombre'] = $res['usuario'];
                $_SESSION['id'] = $res[0];
                
                return true;

                
            }else return false;
            
        }
        
        
        public function validateSession(){
            session_start();
            if($_SESSION['id'] == null) header('Location: login.php');
        }

    }

?>