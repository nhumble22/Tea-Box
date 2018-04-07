<?php
	
include_once('config.php');

$logout = "UPDATE users SET user_session_id = NULL WHERE user_session_id = '".session_id()."'" ;
mysqli_query($link, $logout);
unset($_SESSION['user']);

header("Location:../index.php");
exit();

?>