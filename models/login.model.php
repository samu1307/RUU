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

                saveCookie($record, $res[0], $res['user'], $res['pass'], $res['rol']);

                $_SESSION['id'] = $res[0];
                $_SESSION['Nombre'] = $res['nombre'];
                $_SESSION['rol'] = $res['rol'];
                $_SESSION['Apellido'] = $res['apellido'];
                $_SESSION['Telefono'] = $res['telefono'];
                $_SESSION['Correo'] = $res['correo'];
                $_SESSION['user'] = $res['user'];
                $_SESSION['pass'] = $res['pass'];
                
                return 1;
                
            }return 0;
            
        }

    }

?>