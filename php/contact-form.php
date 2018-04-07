<?php
if (isset($_POST["submit"])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];






		//send email to $email
		$email_subject = "TEABOX Customer Contact";
		$email_message = "TEABOX Customer Contact\n\n";

	    function clean_string($string) {
	      $bad = array("content-type","bcc:","to:","cc:","href");
	      return str_replace($bad,"",$string);
	    };

	    $email_message .= "Name: ".clean_string($name)."\n";
	    $email_message .= "Email: ".clean_string($email)."\n";
	    $email_message .= "Phone: ".clean_string($phone)."\n\n";
	    $email_message .= "Message: ".clean_string($message)."\n";


		// create email headers
		$headers = 'From: customercontact@TEABOX.com'."\r\n".
		'Reply-To: customercontact@TEABOX.com'."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email, $email_subject, $email_message, $headers); 












		header("Location:contactthanks.php");
		exit();

}
?>