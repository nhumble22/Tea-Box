<?php
include('/header.php');
if (isset($_GET["id"])) {

	$id = $_GET['id'];
	//delete
	$postQuery = "DELETE FROM products WHERE product_id='".mysqli_real_escape_string($link,$id)."'";
	mysqli_real_escape_string($link,$id)."'";
	mysqli_query($link, $postQuery);

	header("Location:../products-menu.php");
	exit();

}
?>