<?php

	$loginErrors = 0;

	$loginEmailClass = "";
	$loginPasswordClass = "";

	if (isset($_POST['submit'])){ 
		$loginEmail = filter_var($_POST['login-email'], FILTER_SANITIZE_EMAIL);
		if ($loginEmail != "") {
			if (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
				$loginErrors++;
				$loginEmailClass = "shatter";
			} else {
				//search database, if not found in database, echo not registered
				$checkQuery = "SELECT * FROM users WHERE user_email = '".mysqli_real_escape_string($link,$loginEmail)."'";
				$checkResult = mysqli_query($link, $checkQuery);

				if (mysqli_num_rows($checkResult) != 1) {
					$loginErrors++;
 		 		 	$loginEmailClass = "shatter";
 		 		}


				$rows = mysqli_fetch_assoc($checkResult);

				if ($rows['user_email'] === $loginEmail) {
					$loginPassword = $_POST['login-password'];
					if ($loginPassword != "") {
						//cheack n database
			 			$checkQuery = "SELECT * FROM users WHERE user_email = '".mysqli_real_escape_string($link,$loginEmail)."'";
			 			$checkResult = mysqli_query($link, $checkQuery);
			 			$rows = mysqli_fetch_assoc($checkResult);
			 			$dbpassword = $rows['user_password'];

						if (password_verify($loginPassword, $dbpassword)) {
			 	 			//update session id
			 	 			$sessionQuery = "UPDATE users SET user_session_id = '".session_id()."'  WHERE user_email = '".mysqli_real_escape_string($link,$loginEmail)."'";
			 	 			mysqli_query($link, $sessionQuery);

			 	 			//set session user
			 	 			$checkQuery = "SELECT * FROM users WHERE user_session_id = '".session_id()."'";
			 	 			$testUser = mysqli_query($link, $checkQuery);
			 	 			if (mysqli_num_rows($testUser) == 1) {
			 		 		 	$rows = mysqli_fetch_assoc($testUser);
			 		 		 	$_SESSION['user'] = $rows;
			 		 		}
			 		 		header("Location:index.php");
							exit();
			 		 	} else {
			 		 		$loginErrors++;
							$loginPasswordClass = "shatter";
			 		 	}
			 		} else {
			 			$loginErrors++;
						$loginPasswordClass = "shatter";
			 		}
			 	} 
			}
		} else {
			$loginErrors++;
			$loginEmailClass = "shatter";
 		}

 		// if ($loginErrors === 0) {
 		// 	header("Location:index.php");
			// exit();
 		// }

	}

?>