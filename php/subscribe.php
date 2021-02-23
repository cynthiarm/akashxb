<?php

/*
 * ------------------------------------
 * Mailchimp Email Configuration
 * ------------------------------------
 */

$apiKey       = 'YOUR_MAILCHIMP_API_KEY_HERE'; /*Your Mailchiimp API Key*/
$listId       = 'MAILCHIMP_LIST_ID_HERE'; /*Mailchimp List ID*/
$double_optin = true; /*Set False if you don't need to verify user enmail */
$send_welcome = false; /* Send Welcome email to new users */
$email        = $_POST['email'];
$fname        = ''; 
$lname        = ''; 
$datacenter   = explode( '-', $apiKey );
$post_url     = 'https://' . $datacenter[1] . '.api.mailchimp.com/2.0/lists/subscribe.json?';
$company_email = "ortizcesar.mih@gmail.com";

/*
Need to capture First name and last name? use this.
$fname        = $_POST['fname'];
$lname        = $_POST['lname'];
*/


/*
 * ------------------------------------
 * END CONFIGURATION
 * ------------------------------------
 */

/*
 * -------------------------------------------------
 * NERD STUFF BELOW, ONLY EDIT IF YOU ARE A PRO
 * -------------------------------------------------
 */
/*
// Let's put together our user data to send
$post_query_array = array(
    "apikey" => $apiKey,
    "id" => $listId,
    "email" => array(
        "email" => $email,
        "euid" => "",
        "leid" => ""
    ),
    "double_optin" => $double_optin,
    "send_welcome" => $send_welcome,
    "merge_vars" => array( // Build an Array of the different Merge Vars you setup in your account
        'FNAME' => $fname,
        'LNAME' => $lname
    )
);

// We still need to build our HTML query string to send
$post_query_string = http_build_query($post_query_array);

// Make sure we have a User's Email address as this is the only required item
if (!empty($email)) {
    // Submit the data via Curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $post_url); // Post URL
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_query_string); // Our Query string that we built
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $curl_out = curl_exec($ch);
    $data = json_decode($curl_out);
    if ($data->error){
        echo $data->error;
    } else {
        echo 'success';
    }
} */

if (!empty($email)) {
	 $message = "One user want to Subscribe to you site. <br> this is the email of user".$email;
	 /*require_once('PHPMailer/PHPMailerAutoload.php');
	 $mail = new PHPMailer();
	 $mail->setFrom($email, $email);
	 $mail->addAddress($company_email, $company_email);
	 $mail->Subject = $subject;
	 $mail->isHTML(true);
	 $mail->Body = $message;
	 $mail->AltBody = $message;*/
	 
	 
	/*require_once('PHPMailer/PHPMailerAutoload.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true;	
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->Username = "webzdeveloper272@gmail.com";
	$mail->Password = "developerwebzexperts@2016";
	$mail->setFrom($email, $email);
	$mail->addAddress($email, $email);
	$mail->Subject = $subject;
	$mail->isHTML(true);
	$mail->Body = $message;// ."test";
	$mail->AltBody = "test ..... plain text ..... alt body .....";
	if($mail->Send()){
	 	echo 'success';
	}else{
		echo 'FAIL';		
	}*/
	

	$subject = "Subscribe to StarCorp LLC";
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: ".$email." \r\n";
	$message = "One user want to Subscribe to you site. <br> this is the email of user".$email;
	
	if(mail($company_email, $subject, $message, $headers)){
		echo 'success';
	}else{
		echo 'fail';
	}
}

?>