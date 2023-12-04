<?php
include('smtp/PHPMailerAutoload.php');

$email = $_GET['email'];
$parentName = $_GET['parentname'];


$subject = $parentName;

// HTML content for the email
$msg = '<p>Hello ' . $parentName . ',</p>';
$msg .= '<p>We are thrilled to welcome you to Paws for Love, a non-profit organization dedicated to finding loving homes for rescued pets.
</p>';
$msg.='<p>Adopting a pet is a life-changing decision, but its one that brings immeasurable joy and companionship. Pets enrich our lives with their unconditional love, unwavering loyalty, and endless playtime antics. We hope you enjoy your new pet and that you will share your experience with others.</p>';
$msg.='Sincerely,

The Paws for Love Team</p>';

echo smtp_mailer($email,'Welcome to Paws for Love!',$msg);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "lollipop.77811@gmail.com";
	$mail->Password = "ukgnutbiokuxjrbu";
	$mail->SetFrom("lollipop.77811@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		header("Location: https://buy.stripe.com/test_5kAeYOdBA1eDeuQ145");
        exit();
	}
}
?>