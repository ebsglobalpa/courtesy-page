require_once('scripts/phpmailer/class.phpmailer.php');

$mail = new PHPMailer();

$mail->IsSMTP();                       // telling the class to use SMTP

$mail->SMTPDebug = 1;                  
// 0 = no output, 1 = errors and messages, 2 = messages only.

$mail->SMTPAuth = true;                // enable SMTP authentication 
$mail->SMTPSecure = "tls";              // sets the prefix to the servier
$mail->Host = "mail10.plastitaliaspa.com";        // sets Gmail as the SMTP server
$mail->Port = 587;                     // set the SMTP port for the GMAIL 

$mail->Username = "noreply";  // Gmail username
$mail->Password = "Noreply!secure2014";      // Gmail password

$mail->CharSet = 'windows-1250';
$mail->SetFrom ('noreply@plastitaliaspa.com');
$mail->AddBCC ( 'assistenza@sobuild.com'); 
$mail->Subject = $subject;
$mail->ContentType = 'text/plain'; 
$mail->IsHTML(false);

$mail->Body = $body_of_your_email; 
// you may also use $mail->Body = file_get_contents('your_mail_template.html');

$mail->AddAddress ('your.recipient@domain.com', 'Recipients Name');     
// you may also use this format $mail->AddAddress ($recipient);

if(!$mail->Send()) 
{
        $error_message = "Mailer Error: " . $mail->ErrorInfo;
} else 
{
        $error_message = "Successfully sent!";
}

// You may delete or alter these last lines reporting error messages, but beware, that if you delete the $mail->Send() part, the e-mail will not be sent, because that is the part of this code, that actually sends the e-mail. 