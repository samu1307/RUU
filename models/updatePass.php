<?php 

    require_once('connection.model.php');


    class UpdatePass{

        private $pdo;

        public function __construct(){
            try {
                $this->pdo = conex::connection();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function verifyEmail($to){
            $query = $this->pdo->prepare('SELECT correoCoor, correoAux FROM v_newPass WHERE correoCoor = :Email OR correoAux = :Email');
            $query->bindParam(':Email', $to);
            if($query->execute()){
                if($query->rowCount() > 0) return true;
                return false;
            }
        }
        
        public function updatePass($email, $pass){
            $query = $this->pdo->prepare('CALL sp_UpdatePass(:Email, :Pass)');
            $query->bindParam(':Email', $email);
            $query->bindParam(':Pass', $pass);
            $query->execute();
            
            if($query->rowCount()) return true;
            return false;
        }
    }

?>