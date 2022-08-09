<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer\PHPMailer.php';
require 'PHPMailer\SMTP.php';
require 'PHPMailer\Exception.php';


function enviar_correo($mensaje, $receptor, $paciente)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dvdbjjsolum@gmail.com';                     //SMTP username
        $mail->Password   = 'kolylqhhvekwhhlw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('dvdbjjsolum@gmail.com', 'Grupo 2 ESBA');
        $mail->addAddress($receptor);     //Add a recipient
        $mail->AddAddress('dvdbjjsolum@gmail.com');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $paciente;
        $mail->Body    = $mensaje;


        $mail->send();
        header('Location:index.php');
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
