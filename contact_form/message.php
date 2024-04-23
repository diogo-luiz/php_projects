<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $website = $_POST["website"];
    $website = $_POST["website"];
    $message = $_POST["message"];

    if(!empty($email) && !empty($message)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $reciever = "diogo.luizsr@gmail.com"; 
            $subject = "From: $name <$email>";
            $body = "Name: $name\n
                     Email: $email\n
                     Phone: $phone\n
                     Website: $website\n
                     Message: $message\n\n
                     Regards, \n$name";
            $sender = "From: $email";
            if(mail($reciever, $subject, $body, $sender)){
                echo "Email enviado com sucesso!";
            }else{
                echo "Desculpe, houve um problema ao enviar seu email!";
            }
        }else{
            echo "Insira um email válido!";
        }
    }else{
        echo "Área de email e mensagem são necessários!";
    }
?>