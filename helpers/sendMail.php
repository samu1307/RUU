<?php

    require_once('../models/updatePass.php');
    
    function sendMail($to){
        $subject = 'RECUPERACIÓN DE CONTRASEÑA';
        $code = random_int(100000,999999);
        $mensaje = 
        'Hola '.$to.', a continuación te enviamos el
        codigo para que puedas recuperar tu contraseña.
        
        Codigo: '.$code;
        $headers = "From: samusamisam@gmail.com\n";
        $headers .= "Content-Type: text/plain;charset=utf-8\r\n";
        $mail = new UpdatePass();

        if($mail->verifyEmail($to)){
            if(mail($to, $subject, $mensaje, $headers)) echo $code;
            else echo "Error al enviar el correo.";
        }else echo 0;
    }

    if(isset($_GET['method'])){
        switch ($_GET['method']) {
            case 'send':
                $to = $_GET['to'];
                sendMail($to);
            break;
        }
    }

?>