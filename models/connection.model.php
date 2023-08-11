<?php

    class Conex{

        public static function connection(){
            
            $conex = new PDO('mysql:host=localhost;dbname=id18786132_db_ruu;charset=utf8', 'id18786132_db', 'Sarmiento.33');
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conex;

        }

    }

?>