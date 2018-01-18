

<h2>Forma de inregistrare a Utilizatorilor</h2>



<form id="", method="POST" action="index.php" onsubmit="return validateForm()">

           <label class="registercomponent" for="login">Login<em>*</em></label>

            <input class="registercomponent" id="login" name ="login"  autofocus required><br>

            <input class="registercomponent" id="remember" type="checkbox" name="remember"> Retineti contul <br>



       

        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Create New User"></p>

     </form>

<?php

require 'PHPMailer/PHPMailerAutoload.php';

require 'credential.php';



$mail = new PHPMailer;



$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = EMAIL;                 // SMTP username

$mail->Password = PASS;                           // SMTP password

$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

$mail->Port = 587;                                    // TCP port to connect to



$mail->setFrom(EMAIL, 'Mailer');

$mail->addAddress($_POST['login']);     // Add a recipient



$mail->addReplyTo(EMAIL);



// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

$mail->isHTML(true);                                  // Set email format to HTML



$mail->Subject = 'Here is the subject';

$mail->Body    = '<b>This is the HTML<b/> message body <b>in bold!</b>';

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



if(!$mail->send()) {

    echo 'Message could not be sent.';

    echo 'Mailer Error: ' . $mail->ErrorInfo;

} else {

    echo 'Message has been sent';

}

?>