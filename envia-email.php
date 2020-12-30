<?php

    //error_reporting(0);

    $nome = utf8_encode($_POST['nome']); 
    $sobrenome= utf8_encode($_POST['sobrenome']);
    $email= utf8_encode($_POST['email']);
    $mensagem= utf8_encode($_POST['mensagem']);

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
   
    //configurações do servidor de email
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->SMTPSecure = "tls";  
    $mail->SMTPAuth = "true";
    $mail->Username = "lucinesgoncalves@gmail.com";
    $mail->Password = "suaSenha";
	

    //Configuração da mensagem
    $mail->setFrom($mail->Username, "Seu nome");//remetente
    $mail->AddAddress("lucinesgoncalves@gmail.com"); //destinatario
    $mail->Subject = "Fale Conosco"; //assunto

    $conteudo_email = " Vc recebeu uma msg de $nome $sobrenome ($email)
    <br><br    
    Mensagem:<br>
    $mensagem
    ";
    $mail->IsHTML(true);
    $mail->Body = $conteudo_email;

    if ($mail->send()){

        echo "enviado com sucesso";

    }else{
        echo "Falha ao enviar" . $mail->ErrorInfo;
    }
