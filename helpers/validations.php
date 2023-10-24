<?php

    function saveCookie($record, $id, $user, $pass){
        if($record == 'active'){
            $user = array('id'=> $id,'user'=> $user,'pass'=> $pass);
            setCookie('_RECOD', base64_encode('active'), time() + 86400 * 30, '/');
            setCookie('_USSES', serialize($user), time() + 86400 * 30, '/');   
        }
    }

    function validateCookie(){
        
        $usses = isset($_COOKIE['_USSES']);
        $sesid = isset($_SESSION['id']);  
        $recod = isset($_COOKIE['_RECOD']);  
        
        if($usses && !$sesid && $recod){
            $data = unserialize($_COOKIE['_USSES']);
            
            $id = $data['id'];
            $user = $data['user'];
            $pass = $data['pass'];
            
            $_SESSION['id'] = $id;
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;

        }else if(!$usses && $sesid && $recod){
            $id = $_SESSION['id'];
            $user = $_SESSION['user'];
            $pass = $_SESSION['pass'];
            $userArr = array('id'=> $id,'user'=> $user,'pass'=> $pass);
            setCookie('_USSES', serialize($userArr), time() + 86400 * 30, '/');   
        }else if($usses && $sesid && !$recod){
            setCookie('_USSES', "", time() - 86400, '/');   
        }
        else if(!$sesid && !$recod) header('Location: Login.php');
    }
    
    function validateSession(){
        session_start();

        $usses = isset($_COOKIE['_USSES']);
        $sesid = isset($_SESSION['id']);
        $recod = isset($_COOKIE['_RECOD']);  

        if($sesid) header('Location: dashboard.php');
        else if($usses && $recod) header('Location: dashboard.php');
    }


?>