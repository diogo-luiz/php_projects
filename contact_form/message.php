<?php
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $website = htmlspecialchars($_POST["website"]);
    $message = htmlspecialchars($_POST["message"]);

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