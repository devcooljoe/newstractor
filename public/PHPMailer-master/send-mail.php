<?php 

$rand = '';
for ($x = 1; $x < 7; $x++) {
    $r = rand(0, 9);
    $rand .= $r;
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];


include "PHPMailer-master/PHPMailerAutoload.php";
include "PHPMailer-master/class.smtp.php";
include "PHPMailer-master/class.phpmailer.php";


$mail = new PHPMailer;
$mail->isSMTP(true);/*Set mailer to use SMTP*/  
$mail->Host = 'mail.ipowertel.com.ng';/*Specify main and backup SMTP servers*/
$mail->Port = 465;
$mail->SMTPAuth = true;/*Enable SMTP authentication*/
$mail->Username = 'info.ipowertel.com.ng';/*SMTP username*/
$mail->Password = 'adeoyebabalola270559';/*SMTP password*/
$mail->SMTPSecure = 'ssl';//*Enable encryption, 'ssl' also accepted*/
$mail->From = 'info.ipowertel.com.ng';
$mail->FromName = 'Discussion Forum';
//$mail->MIMEVersion= '1.0'. "\r\n";
//$mail->ContentType= 'text/html';
//$mail->CharSet='iso-8859-1' . "\r\n";
$mail->addAddress($email, 'DF User');/*Add a recipient*/
$mail->addReplyTo($email, 'Discussion Forum');
/*$mail->addCC('cc@example.com');*/
/*$mail->addBCC('bcc@example.com');*/
$mail->WordWrap = 70;/*DEFAULT = Set word wrap to 50 characters*/
//$mail->addAttachment('../tmp/' . $varfile, $varfile);/*Add attachments*/
/*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
/*$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
$mail->isHTML(true);/*Set email format to HTML (default = true)*/
$mail->Subject = $rand.' is your password recovery code';
$mail->Body    = 'Hi, we recieved a request to reset your Discusion Forum password. ';
$mail->Body .= 'Enter the following password reset code: '.$rand;
$mail->AltBody = 'This message was sent to '.$email.' at your request. Discussion Forum';
if(!$mail->send()) {
    echo $mail->ErrorInfo;
    ?>
    <script>
        //location.href = '../forgot-password.php?mail-error=true';
    </script>
<?php } else {
    $_SESSION['resetcode'] = $rand;
    ?>
    <script>
        location.href = 'validate-code.php?email=<?php $email; ?>';
    </script>
<?php }

}