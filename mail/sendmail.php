<?php
    include "PHPMailer/PHPMailer-master/src/PHPMailer.php";
    include "PHPMailer/PHPMailer-master/src/Exception.php";
    include "PHPMailer/PHPMailer-master/src/OAuth.php";
    include "PHPMailer/PHPMailer-master/src/POP3.php";
    include "PHPMailer/PHPMailer-master/src/SMTP.php";
     
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
                           // Passing `true` enables exceptions
    function sendmail($title, $message, $email, $username, $emailUser, $phone) {
        try {
            //Server settings
            $mail = new PHPMailer(true);   
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'letankim2003@gmail.com';                 // SMTP username
            $mail->Password = 'khjvflofowyzopus';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
         
            //Recipients
            $mail->setFrom('letankim2003@gmail.com', 'Mailer');
            $mail->addAddress($email, $username);     // Add a recipient
         
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "$title";
            $mail->Body    = "$message ".$emailUser." ".$phone."";
         
            $mail->send();
            return true;
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return false;
        }
    }
?>