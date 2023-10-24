<?php

    require_once('../models/updatePass.php');
    $_POST = json_decode(file_get_contents('php://input'),true);

    class newPass{

        private $updatePass;

        public function __construct(){
            $this->updatePass = new UpdatePass();
        }

        public function updatePass(){
            $email = $_POST['email'];
            $pass = $_POST['passNew'];

            echo $this->updatePass->updatePass($email, $pass);
        }

    }

    if(isset($_POST)){
        $method = new newPass();
        switch ($_GET['method']){
            case 'updatePass':
                $method->updatePass();
            break;
        }    
    }

?>