<?php

    session_start();

    require_once('connection.php');

    class Login{

        private $PDO;

        public function __construct(){

            try {
                $this->PDO = connection::connection();
            } catch (Exception $e) {
                die($e->getMessage());
            }

        }

        public function login($User, $Password){

            $query = $this->PDO->prepare('SELECT * FROM usuario WHERE usuario = :User AND contrasenia = :Pass');
            $query->bindParam(':User', $User);
            $query->bindParam(':Pass', $Password);
            $query->execute();

            echo $query->rowCount();

            if($query->rowCount() == 1){

                $res = $query->fetch();
                echo $res;

                $_SESSION['Nombre'] = $res['Nombre'];
                $_SESSION['id'] = $res['id'];

                return $res['id'];

            }


        }

        public function validateSession(){
            if($_SESSION['id'] == null) header('Location: login.php');
        }

    }

?>