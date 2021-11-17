<?php
    function send_email_notif($email, $message, $subject){
       require_once 'PHPMailer/PHPMailerAutoload.php';
   
       $message = nl2br($message);

       $mail = new PHPMailer;
   
       $mail->isSMTP();
       $mail->SMTPAuth = true;
       $mail->SMTPAutoTLS = false; 
       $mail->SMTPSecure = 'tls';

       $mail->Host = 'smtp.gmail.com';
       $mail->Port = 587;
       $mail->Username = EMAIL_ADDRESS;
       $mail->Password = EMAIL_PASSWORD;

       $mail->setFrom(EMAIL_ADDRESS, EMAIL_SENDER);
       $mail->addAddress($email); // Add a recipient
       //$mail->addReplyTo(EMAIL_ADDRESS);
       $mail->isHTML(true); // Set email format to HTML

       $mail->AddEmbeddedImage("/app/app/helpers/PDF_header.jpg", "PDF_header");
       
       $mail->Subject = $subject;
       $mail->Body    = "
       <img src='cid:PDF_header'>
       <p style='margin-bottom:-20px; font-size: 15px'>
       $message
       </p>
       ";
       $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
       return $mail->send();
   }

   function send_email_attachment($email, $message, $subject, $doc_url){
    require_once 'PHPMailer/PHPMailerAutoload.php';

    $message = nl2br($message);

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false; 
    $mail->SMTPSecure = 'tls';

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = EMAIL_ADDRESS;
    $mail->Password = EMAIL_PASSWORD;

    $mail->setFrom(EMAIL_ADDRESS, EMAIL_SENDER);

    $file_name = explode("/", str_replace("https://", "", $doc_url));

    $mail->addStringAttachment(file_get_contents($doc_url), $file_name[1]);
    $mail->addAddress($email); // Add a recipient
    $mail->addReplyTo(EMAIL_ADDRESS);
    $mail->isHTML(true); // Set email format to HTML
    
    $mail->AddEmbeddedImage("/app/app/helpers/PDF_header.jpg", "PDF_header");

    $mail->Subject = $subject;
    $mail->Body    = "
    <img src='cid:PDF_header'>
    <p style='margin-bottom:-20px; font-size: 15px'>
    $message
    </p>
    ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    return $mail->send();
}