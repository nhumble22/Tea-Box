<?php
if (isset($_POST["submit"])) {
	
	$productId = $_POST["id"];
	$category = $_POST["category-id"];
	$subCategory = $_POST["sub-category-id"];
	$flavor = $_POST["flavor"];//FINE
	$name = $_POST["name"];//FINE
	$description = $_POST["description"];//FINE
	$subDescription = $_POST["sub-description"];//FINE
	$quantity = $_POST["quantity"];
	$price = $_POST["price"];//remove dollar sign
	$image = $_POST["image"];
	$postQuery = "UPDATE products SET category_id = '".mysqli_real_escape_string($link,$category)."',
										sub_category_id = '".mysqli_real_escape_string($link,$subCategory)."',
										product_name = '".mysqli_real_escape_string($link,$name)."',
										product_price = '".mysqli_real_escape_string($link,$price)."',
										product_stock = '".mysqli_real_escape_string($link,$quantity)."',
										product_description = '".mysqli_real_escape_string($link,$description)."',
										product_sub_description = '".mysqli_real_escape_string($link,$subDescription)."',
										product_flavor = '".mysqli_real_escape_string($link,$flavor)."'

									WHERE product_id = $productId";

	mysqli_query($link, $postQuery);

	if ($image != "") {

		$postQuery = "UPDATE products SET product_image = '".mysqli_real_escape_string($link,$image)."'
									WHERE product_id = $productId";
		mysqli_query($link, $postQuery);

	}						

}
?>