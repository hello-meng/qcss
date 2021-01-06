<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH.'libraries/PHPMailer/PHPMailerAutoload.php');
 
class mailer {
 
    public function send($addAddress, $Subject, $msgHTML, $file = '', $filename = '')
	{
		$mail = new PHPMailer;
		$mail->CharSet = 'UTF-8';
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'email-smtp.ap-south-1.amazonaws.com';
		$mail->Port = 587;
		$mail->IsHTML(true);
		// $mail->SMTPDebug = 2;
		// $mail->Username = "AKIA5TQBCUVMN6G6LR53";
		// $mail->Password = "BH8vNZg+XCEgw/qnH3sEoRiSptafo80gvSXySIptLJNG";
		// $mail->setFrom('no-reply@goldsmartplus.com', 'Gold Smart Plus');
		$mail->Username = "AKIAZE4KASSYOFF62UKO";
		$mail->Password = "BJ9M3IKNdvkKFoiu/YxnwGAHX1iZpacbGRlU3j1E2yM2";
		$mail->setFrom('no-reply@souvii.com', 'Souvii');

		if(is_array($addAddress))
		{
			foreach($addAddress as $key => $value)
			{
				$mail->addAddress($value);
			}
		}
		else
		{
			$mail->addAddress($addAddress);
		}

		if($file != "" && $filename != "")
		{
			$mail->AddAttachment($file, $filename);
		}

		$mail->Subject = $Subject;
		$mail->msgHTML($msgHTML);
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			return false;
		} else {
			//echo "email was sent";
			return true;
		}
		
	}

	
}
 
?>