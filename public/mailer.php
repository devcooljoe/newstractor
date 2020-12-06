<?php

function publicMail($reciever, $subject, $body) {
    include "PHPMailer-master/PHPMailerAutoload.php";
	include "PHPMailer-master/class.smtp.php";
    include "PHPMailer-master/class.phpmailer.php";

    $mail = new PHPMailer();
    $mail->isSMTP(true);/*Set mailer to use SMTP*/
    $mail->Host = 'mail.newstractor.com.ng';/*Specify main and backup SMTP servers*/
    $mail->Port = 465;
    $mail->SMTPAuth = true;/*Enable SMTP authentication*/
    $mail->SMTPDebug = 0;
    $mail->Username = 'info@newstractor.com.ng';/*SMTP username*/
    $mail->Password = 'olumide@112001';/*SMTP password*/
    $mail->SMTPSecure = 'ssl';//*Enable encryption, 'ssl' also accepted*/
    $mail->From = 'info@newstractor.com.ng';
    $mail->FromName = 'Newstractor';
    $mail->MIMEVersion= '1.0'. "\r\n";
    $mail->ContentType= 'text/html';
    $mail->CharSet='utf-8' . "\r\n";
    $mail->addAddress($reciever, 'Newstractor User');/*Add a recipient*/
    //$mail->addReplyTo($email, 'Discussion Forum');
    /*$mail->addCC('cc@example.com');*/
    /*$mail->addBCC('bcc@example.com');*/
    $mail->WordWrap = 50;/*DEFAULT = Set word wrap to 50 characters*/
    //$mail->addAttachment('../tmp/' . $varfile, $varfile);/*Add attachments*/
    /*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
    /*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
    $mail->isHTML(true);/*Set email format to HTML (default = true)*/
    $mail->Subject = $subject;
    $mail->Body = $body;

    return $mail->send();

}