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

        public function create($name, $lastname, $number, $email, $jor, $user, $pass, $rol){            
            try {
                $msg = "INSERT INTO `usuario` (`usuario`, `contrasenia`, `rol`, `estado`) VALUES (:User, :Pass, :Rol, 'A')";
                $reques = $this->pdo->prepare($msg);
                $reques->bindParam(':User', $user);
                $reques->bindParam(':Pass', $pass);
                $reques->bindParam(':Rol', $rol);
                $reques->execute();
                
                $req = $this->pdo->prepare("SELECT idUsuario FROM usuario WHERE usuario = :UserId");
                $req->bindParam(':UserId', $user);
                $req->execute();
                
                if($req->rowCount() == 1){
                    $res = $req->fetch();
                    $msg = "INSERT INTO ".$rol." (`nombre`, `apellido`, `jornada`, `telefono`, `correo`, `usuario`) VALUES (:Name, :Lastname, :Jor, :Number, :Email, :UserRol)";
                    $request = $this->pdo->prepare($msg);
                    $request->bindParam(':Name', $name);
                    $request->bindParam(':Lastname', $lastname);
                    $request->bindParam(':Jor', $jor);
                    $request->bindParam(':Number', $number);
                    $request->bindParam(':Email', $email);
                    $request->bindParam(':UserRol', $res[0]);
                    $request->execute();
                    return "Usuario insertado";
                }
                
            }catch (PDOException $E) {
                return $E;
            }
        }

        public function read($table){
            $query = 'SELECT * FROM '.$table;
            $request = $this->pdo->prepare($query);
            return ($request->execute()) ? $request->fetchAll() : false;
        }

        public function update(){
            $reques = $this->pdo->prepare();
        }

        public function delete(){
            $reques = $this->pdo->prepare();
        }

    }

?>