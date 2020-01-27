<?php

    require 'emailConfig.php';
    

    if(isset($_POST['emailId']) && isset($_POST['name']) && isset($_POST['msg'])){

        $toEmailId = $_POST['emailId'];
        $name = $_POST['name'];
        $msg = $_POST['msg'];

        if(!empty($toEmailId) && !empty($name) && !empty($msg)){

            if(filter_var($toEmailId,FILTER_VALIDATE_EMAIL)){
                require 'PHPMailerAutoload.php';

                $mail = new PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = fromEmail;                 // SMTP username
                $mail->Password = pass;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom(fromEmail, 'ContactUs Form Submitted');
                $mail->addAddress($toEmailId);               // Name is optional
                $mail->addReplyTo(fromEmail, 'Your Response Submitted');   // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Your Response Submitted';
                $mail->Body    = $msg;
                $mail->AltBody = $msg;
                
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }

                echo 'Done';
            } else {
                echo '<b> Please Enter Valid Email Id';
            }
        } else{
             echo '<b> All Fields is required';
        }
    }

?>