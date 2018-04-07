<?php
if (isset($_POST["submit"])) {

	$category = $_POST["category-id"];
	$subCategory = $_POST["sub-category-id"];
	$flavor = $_POST["flavor"];//FINE
	$name = $_POST["name"];//FINE
	$description = $_POST["description"];//FINE
	$subDescription = $_POST["sub-description"];//FINE
	$quantity = $_POST["quantity"];
	$price = $_POST["price"];//remove dollar sign
	$image = $_POST["image"];



	$postQuery = "INSERT INTO products (category_id, sub_category_id, product_name, product_price, product_stock,
										product_description, product_sub_description, product_image, product_flavor) 
							VALUES 
							('".mysqli_real_escape_string($link,$category)."', 
							'".mysqli_real_escape_string($link,$subCategory)."', 
							'".mysqli_real_escape_string($link,$name)."', 
							'".mysqli_real_escape_string($link,$price)."', 
							'".mysqli_real_escape_string($link,$quantity)."', 
							'".mysqli_real_escape_string($link,$description)."', 
							'".mysqli_real_escape_string($link,$subDescription)."', 
							'".mysqli_real_escape_string($link,$image)."',
	 						'".mysqli_real_escape_string($link,$flavor)."')";
	mysqli_query($link, $postQuery);


}
?>