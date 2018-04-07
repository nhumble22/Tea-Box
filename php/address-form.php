<?php
if (isset($_POST["submit"])) {

		$firstName = $_POST['first-name'];
		$lastName = $_POST['last-name'];
		$address = $_POST['address'];
		$suburb = $_POST['suburb'];
		$city = $_POST['city'];
		$phone = $_POST['phone'];
		$userId = $_SESSION['user']['user_id'];

		$postQuery = "UPDATE users SET 
		user_first_name = '".mysqli_real_escape_string($link,$firstName)."',
		user_last_name = '".mysqli_real_escape_string($link,$lastName)."',
		user_address = '".mysqli_real_escape_string($link,$address)."',
		user_suburb = '".mysqli_real_escape_string($link,$suburb)."',
		user_city = '".mysqli_real_escape_string($link,$city)."',
		user_phone = '".mysqli_real_escape_string($link,$phone)."'
		WHERE user_id ='".mysqli_real_escape_string($link,$userId)."'";
		mysqli_query($link, $postQuery);

		header("Location:account.php");
		exit();

}
?>