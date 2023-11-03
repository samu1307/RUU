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

        public function saveUser($idUser, $name, $lastname, $number, $email, $jor, $user, $pass, $rol, $state, $idRol){            
            try {

                $msg = "CALL sp_saveUser(:Id, :Name, :LastName, :Number, :Email, :Jor, :User, :Pass, :Rol, :State, :IdRol)";
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
                $reques->bindParam(':State', $state);
                $reques->bindParam(':IdRol', $idRol);
                if($reques->execute()) return true;
                else return false;
                
            }catch (PDOException $E){
                return $E;
            }
        }

        public function saveSnack($hora, $date, $cant, $type, $descri, $aux, $coor, $id = 0){            
            try {

                $msg = "CALL sp_saveSnack(:Id, :Hora, :Date, :Cant, :Type, :Descri, :Aux, :Coor)";
                $reques = $this->pdo->prepare($msg);
                $reques->bindParam(':Id', $id);
                $reques->bindParam(':Hora', $hora);
                $reques->bindParam(':Date', $date);
                $reques->bindParam(':Cant', $cant);
                $reques->bindParam(':Type', $type);
                $reques->bindParam(':Descri', $descri);
                $reques->bindParam(':Aux', $aux);
                $reques->bindParam(':Coor', $coor);
                if($reques->execute()) return true;
                else return false;
                
            }catch (PDOException $E){
                return $E;
            }
        }

        public function saveCourse($grado, $curso, $jornada, $alumnos, $director, $id, $estado){            
            try {
                $msg = "CALL sp_saveCourse(:Id, :Grado, :Curso, :Jornada, :Alumnos, :Director, :Estado)";
                $reques = $this->pdo->prepare($msg);
                $reques->bindParam(':Id', $id);
                $reques->bindParam(':Grado', $grado);
                $reques->bindParam(':Curso', $curso);
                $reques->bindParam(':Jornada', $jornada);
                $reques->bindParam(':Alumnos', $alumnos);
                $reques->bindParam(':Director', $director);
                $reques->bindParam(':Estado', $estado);
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

        public function getDataUser($id, $rol){
            ($rol == "Coordinador")? $query = 'SELECT * FROM `v_usercoordinador` WHERE idUsuario = :id': $query = 'SELECT * FROM `v_userauxiliar` WHERE idUsuario = :id';
            $reques = $this->pdo->prepare($query);
            $reques->bindParam(':id', $id);
            return ($reques->execute()) ? $reques->fetchAll() : false;
        }

        public function getDataSnack($id){
            $query = 'SELECT * FROM `refrigerio` WHERE idRefrigerio = :id';
            $reques = $this->pdo->prepare($query);
            $reques->bindParam(':id', $id);
            return ($reques->execute()) ? $reques->fetchAll() : false;
        }

        public function getDataCourse($id){
            $query = 'SELECT * FROM `curso` WHERE idCurso = :id';
            $reques = $this->pdo->prepare($query);
            $reques->bindParam(':id', $id);
            return ($reques->execute()) ? $reques->fetchAll() : false;
        }

    }

?>