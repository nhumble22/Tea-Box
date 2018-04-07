<?php

$registerErrors = 0;

$registerFirstNameClass = "";
$registerLastNameClass = "";
$registerEmailClass = "";
$registerPasswordClass = "";

if (isset($_POST['submit'])){ 

	//register email
		$registerEmail = filter_var($_POST['register-email'], FILTER_SANITIZE_EMAIL);
		if ($registerEmail != "") {
			if (!filter_var($registerEmail, FILTER_VALIDATE_EMAIL)) {
				$registerErrors++;
				$registerEmailClass = "shatter";
			} else {
				//search database, if found in database, echo already registered
				$checkQuery = "SELECT * FROM users WHERE user_email = '".mysqli_real_escape_string($link,$registerEmail)."'";
				$checkResult = mysqli_query($link, $checkQuery);
				$rows = mysqli_fetch_assoc($checkResult);
				if ($rows['user_email'] === $registerEmail) {
				    $registerErrors++;
				    $registerEmailClass = "shatter";
				}				
			}
		} else if ($registerEmail === "") {
			$registerErrors++;
			$registerEmailClass = "shatter";
		};

		//register names
		$registerFirstName = filter_var($_POST['register-first-name'], FILTER_SANITIZE_STRING);
		if ($registerFirstName === "") {
			$registerErrors++;
			$registerFirstNameClass = "shatter";
		}	
		$registerLastName = filter_var($_POST['register-last-name'], FILTER_SANITIZE_STRING);
		if ($registerLastName === "") {
			$registerErrors++;
			$registerLastNameClass = "shatter";
		}

		//register password
		$registerPassword = $_POST['register-password'];
		if ($registerPassword === "") {
			$registerErrors++;
			$registerPasswordClass = "shatter";
		}

		//If Errors Check
		if ($registerErrors <= 0) {
			$registerEmail = trim($registerEmail);
			$registerFirstName = trim($registerFirstName);
			$registerLastName = trim($registerLastName);
			$registerPassword = password_hash($registerPassword, PASSWORD_BCRYPT);
			$registerType = "2";
	 		$addQuery = "INSERT INTO users (user_email, user_first_name, user_last_name, user_password, user_type) 
	 					VALUES ('".mysqli_real_escape_string($link,$registerEmail)."', 
	 						'".mysqli_real_escape_string($link,$registerFirstName)."',
	 						'".mysqli_real_escape_string($link,$registerLastName)."', 
	 						'".mysqli_real_escape_string($link,$registerPassword)."',
	 						'".mysqli_real_escape_string($link,$registerType)."'
	 						)";
	 		mysqli_query($link, $addQuery);

	 		//update session id
 			$sessionQuery = "UPDATE users SET user_session_id = '".session_id()."'  WHERE user_email = '".mysqli_real_escape_string($link,$registerEmail)."'";
 			mysqli_query($link, $sessionQuery);

 			//set session user
 			$checkQuery = "SELECT * FROM users  WHERE user_email = '".mysqli_real_escape_string($link,$registerEmail)."'";
 			$testUser = mysqli_query($link, $checkQuery);
 			if (mysqli_num_rows($testUser) == 1) {
	 		 	$rows = mysqli_fetch_assoc($testUser);
	 		 	$_SESSION['user'] = $rows;
	 		}

	 		header("Location:thanks.php");
			exit();
		}


	// $registerEmail = $_POST['register-email'];
	// $registerUsername = $_POST['register-name'];
	// $registerPassword = $_POST['register-password'];
	// $registerType = "2";
	// 	$addQuery = "INSERT INTO users (user_email, user_name, user_password, user_type) 
	// 				VALUES ('".mysqli_real_escape_string($link,$registerEmail)."', 
	// 					'".mysqli_real_escape_string($link,$registerUsername)."', 
	// 					'".mysqli_real_escape_string($link,$registerPassword)."',
	// 					'".mysqli_real_escape_string($link,$registerType)."'
	// 					)";
	// 	mysqli_query($link, $addQuery);







}

?>