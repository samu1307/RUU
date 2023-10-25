<?php

    require_once('connection.model.php');

    class ModelCRUD{

        private $pdo;

        public function __construct(){
            try {
                $this->pdo = conex::connection();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function save($idUser, $name, $lastname, $number, $email, $jor, $user, $pass, $rol, $idRol, $img){            
            try {

                $msg = "CALL sp_saveUser(:Id, :Name, :LastName, :Number, :Email, :Jor, :User, :Pass, :Rol, :IdRol, :Img)";
                $reques = $this->pdo->prepare($msg);
                $reques->bindParam(':Id', $idUser);
                $reques->bindParam(':Name', $name);
                $reques->bindParam(':LastName', $lastname);
                $reques->bindParam(':Number', $number);
                $reques->bindParam(':Email', $email);
                $reques->bindParam(':Jor', $jor);
                $reques->bindParam(':User', $user);
                $reques->bindParam(':Pass', $pass);
                $reques->bindParam(':Rol', $rol);
                $reques->bindParam(':IdRol', $idRol);
                $reques->bindParam(':Img', $img);
                if($reques->execute()) return true;
                else return false;
                
            }catch (PDOException $E){
                return $E;
            }
        }

        public function read($table){
            $query = 'SELECT * FROM '.$table;
            $request = $this->pdo->prepare($query);
            return ($request->execute()) ? $request->fetchAll() : false;
        }
        
        public function delete($id){
            $reques = $this->pdo->prepare('CALL sp_deleteUser(:Id)');
            $reques->bindParam(':Id', $id);            
            return ($reques->execute()) ? true : false;
        }

        public function getData($id, $rol){
            ($rol == "Coordinador")? $query = 'SELECT * FROM `v_usercoordinador` WHERE idUsuario = :id': $query = 'SELECT * FROM `v_userauxiliar` WHERE idUsuario = :id';
            $reques = $this->pdo->prepare($query);
            $reques->bindParam(':id', $id);
            return ($reques->execute()) ? $reques->fetchAll() : false;
        }

    }

?>