<?php

    class Conex{

        public static function connection(){
            
            $conex = new PDO('mysql:host=localhost;dbname=ruu;charset=utf8', 'root', '');
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conex;
            
        }

    }

?>