<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
#require "PHPMailer/src/OAuth.php";
require "PHPMailer/src/POP3.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/DSNConfigurator.php";
#require "PHPMailer/src/OAuthTokenProvider.php";
ob_start();

class Mailer{
    public function dathangmail($tieude, $noidung, $maildathang){
    //  print_r($mail);    
        $mail = new PHPMailer(true);  
        $mail->CharSet = 'UTF-8';
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'reinniellie@gmail.com';                 // SMTP username
            $mail->Password = 'aqcdcnijrwpmiovm';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('reinniellie@gmail.com', 'Mailer');

            #$mail->addAddress('phungnguyenlht727@gmail.com', 'Phung');     // Add a recipient
            $mail->addAddress($maildathang);               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('reinniellie@gmail.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body    = $noidung;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send();
            echo '<h4>Message has been sent</h4>';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}    
?>