    <?php
    function Send_Mail($to,$subject,$body)
     {
     require '/views/user/phpmailer.php';
     $from       = "from@nst.ru";
     $mail       = new PHPMailer();
     $mail->IsSMTP(true);            // используем протокол SMTP
     $mail->IsHTML(true);
     $mail->SMTPAuth   = true;                  // разрешить SMTP аутентификацию 
     $mail->Host       = "tls://smtp.mail.ru"; // SMTP хост
     $mail->Port       =  465;                    // устанавливаем SMTP порт
     $mail->Username   = "romanbilenko174@mail.ru";  //имя пользователя SMTP  
     $mail->Password   = "2181168hjvfs";  // SMTP пароль
     $mail->SetFrom($from, 'Новые Строительные Технологии');
     $mail->AddReplyTo($from,'Новые Строительные Технологии');
     $mail->Subject    = $subject;
     $mail->MsgHTML($body);
     $address = $to;
     $mail->AddAddress($address, $to);
     if($mail->Send(); ){
        echo "good";
     }
     }
     ?>